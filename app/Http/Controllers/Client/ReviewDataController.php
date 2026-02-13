<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    public function final_submit()
{
    $booking = session('booking');

    DB::transaction(function () use ($booking) {

        // 1️⃣ Simpan client (parent utama)
        $client = $this->storeClient($booking);

        // 2️⃣ Simpan event (butuh client_id)
        $event = $this->storeAcara($booking, $client->id);

        // 3️⃣ Simpan tabel yang butuh event_id
        $this->storePengantin($booking, $event->id);
        $this->storeKonsep($booking, $event->id);
        $this->storeVendors($booking, $event->id);
    });

    session()->forget('booking');

            Alert::toast('Booking berhasil dilakukan.', 'success')->autoClose(3000);
    return redirect()->route('landing-page');
}
    private function storeClient($booking){
        return Client::create([
            'nama_client' => $booking['client']['nama_client'],
            'email' => $booking['client']['email'],
            'phone' => $booking['client']['phone'],
            'alamat' => $booking['client']['alamat'],
            'package_id' => $booking['paket']['package_id'],
            'status' => 'diproses',
        ]);
    }


    private function storeAcara($booking, $clientId)
{
    return Event::create([
        'tanggal_acara' => $booking['event']['tanggal_acara'],
        'waktu_acara' => $booking['event']['waktu_acara'],
        'lokasi_acara' => $booking['event']['lokasi_acara'],
        'catatan_tambahan' => $booking['event']['catatan_tambahan'] ?? null,
        'client_id' => $clientId,
    ]);
}

    private function storePengantin($booking, $acaraId)
        {
            foreach (['groom', 'bride'] as $role) {
                WeddingPerson::create([
                    'jenis_kelamin' => $role === 'groom' ? 'pria' : 'wanita',
                    'nama_lengkap' => $booking[$role]['nama_lengkap'],
                    'nama_panggilan' => $booking[$role]['nama_panggilan'],
                    'alamat' => $booking[$role]['alamat'],
                    'nama_ayah' => $booking[$role]['nama_ayah'],
                    'nama_ibu' => $booking[$role]['nama_ibu'],
                    'anak_ke' => $booking[$role]['anak_ke'],
                    'nama_kakak' => $booking[$role]['nama_kakak'],
                    'nama_adik' => $booking[$role]['nama_adik'],
                    'event_id' => $acaraId,
                ]);
            }
    }

    private function storeKonsep($booking, $acaraId)
    {
        Concept::create([
            'nama_konsep' => $booking['concept']['nama_konsep'],
            'link_referensi' => $booking['concept']['link_referensi'],
            'event_id' => $acaraId,
        ]);
    }

    private function storeVendors($booking, $acaraId)
    {
        foreach ($booking['vendors'] as $vendor) {
            DetailVendor::create([
                'vendor_id' => $vendor['vendor_id'],
                'nama_vendor' => $vendor['nama_vendor'],
                'kontak' => $vendor['kontak'],
                'event_id' => $acaraId,
            ]);
        }
    }
}