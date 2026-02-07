<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\WeddingPerson;
use App\Models\Client;
use App\Models\Package;
use App\Models\Concept;
use App\Models\Vendor;
use App\Models\DetailVendor;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ReviewDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = session('booking');

        return view('Client.ReviewData.index', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $booking = session('booking');
        $vendors = Vendor::all();
        $packages = Package::all();

        $selectedVendors = collect(session('booking.vendors', []))
            ->keyBy('vendor_id');

        $selectedPackageId = session('booking.paket.package_id');

        return view('Client.ReviewData.edit', compact('booking', 'vendors', 'packages', 'selectedVendors', 'selectedPackageId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'client' => 'nullable|array',
            'paket' => 'nullable|array',
            'event' => 'nullable|array',
            'groom' => 'nullable|array',
            'bride' => 'nullable|array',
            'concept' => 'nullable|array',
            'vendors' => 'nullable|array',
        ]);
        
        session([
            'booking' => [
                'client' => $request->client,
                'paket' => $request->paket,
                'event' => $request->event,
                'groom' => $request->groom,
                'bride' => $request->bride,
                'concept' => $request->concept,
                'vendors' => $request->vendors,
            ]
        ]);
        
        // dd(session()->all());

        return redirect()->route('review-data');
    }

    public function final_submit(){
        $booking = session('booking');

        DB::transaction(function () use ($booking) {

            $client = $this->storeClient($booking);
            $acara  = $this->storeAcara($booking, $client->id);

            $this->storePengantin($booking, $acara->id);
            $this->storeKonsep($booking, $acara->id);
            $this->storeVendors($booking, $acara->id);
        });

        session()->forget('booking');

        return redirect()->route('booking.success');
    }

    private function storeClient($booking){
        return Client::create([
            'nama' => $booking['client']['nama_client'],
            'email' => $booking['client']['email'],
            'no_wa' => $booking['client']['phone'],
            'alamat' => $booking['client']['alamat'],
            'paket_id' => $booking['paket']['package_id'],
            'status' => 'diproses',
        ]);
    }


    private function storeAcara($booking, $clientId){
        return Acara::create([
                'tanggal' => $booking['event']['tanggal_acara'],
                'lokasi' => $booking['event']['lokasi_acara'],
                'catatan_tambahan' => $booking['event']['catatan_tambahan'],
                'klien_id' => $clientId,
            ]);
        }

        private function storePengantin($booking, $acaraId)
        {
            foreach (['groom', 'bride'] as $role) {
                Pengantin::create([
                    'jenis_kelamin' => $role === 'groom' ? 'pria' : 'wanita',
                    'nama_lengkap' => $booking[$role]['nama_lengkap'],
                    'nama_panggilan' => $booking[$role]['nama_panggilan'],
                    'nama_ayah' => $booking[$role]['nama_ayah'],
                    'nama_ibu' => $booking[$role]['nama_ibu'],
                    'anak_ke' => $booking[$role]['anak_ke'],
                    'acara_id' => $acaraId,
                ]);
            }
        }

    private function storeKonsep($booking, $acaraId)
    {
        Concept::create([
            'konsep' => $booking['concept']['nama_konsep'],
            'link_referensi' => $booking['concept']['link_referensi'],
            'acara_id' => $acaraId,
        ]);
    }
    private function storeVendors($booking, $acaraId)
    {
        foreach ($booking['vendors'] as $vendor) {
            DetailVendor::create([
                'vendor_id' => $vendor['vendor_id'],
                'nama_vendor' => $vendor['nama_vendor'],
                'sosial_media' => $vendor['kontak'],
                'acara_id' => $acaraId,
            ]);
        }
    }


}