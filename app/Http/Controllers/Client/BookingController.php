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
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // client
    public function create_client()
    {
        $packages = Package::all();

        
        return view('Client.Booking.form-client', compact('packages'));
    }

    public function store_client(Request $request)
    {
        $request->validate([
            'client.nama_client' => 'required|string|max:255',
            'client.email' => 'required|email|unique:clients,email',
            'client.phone' => 'required|string|max:20',
            'client.alamat' => 'required|string',
            'paket.package_id' => 'required|exists:packages,id',
        ]);

        session([
            'booking' => [
                'client' => [
                    'nama_client' => $request->client['nama_client'],
                    'email' => $request->client['email'],
                    'phone' => $request->client['phone'],
                    'alamat' => $request->client['alamat'],
                ],
                'paket' => [
                    'package_id' => $request->paket['package_id'],
                ],
            ]
        ]);


        // dd(session()->all());

        return redirect()->route('event.from');  
    }

    public function create_event()
    {
        return view('Client.Booking.form-event');
    }

    public function store_event(Request $request)
    {
        $request->validate([
            'event.tanggal_acara' => 'required|date',
            'event.waktu_acara' => 'required',
            'event.lokasi_acara' => 'required|string',
            'event.catatan_tambahan' => 'nullable|string',
        ]);

        session([
            'booking.event' => [
                'tanggal_acara' => $request->event['tanggal_acara'],
                'waktu_acara' => $request->event['waktu_acara'],
                'lokasi_acara' => $request->event['lokasi_acara'],
                'catatan_tambahan' => $request->event['catatan_tambahan'],
            ]
        ]);

        //  dd(session()->all());

        return redirect()->route('groom.from');
    }

    public function create_groom()
    {
        return view('Client.Booking.form-groom');
    }

    public function store_groom(Request $request)
    {
        $request->validate([
            'groom.pengantin' => 'required|string|in:pria,wanita',
            'groom.nama_lengkap' => 'required|string|max:255',
            'groom.nama_panggilan' => 'required|string|max:255',
            'groom.alamat' => 'required|string',
            'groom.nama_ayah' => 'required|string|max:255',
            'groom.nama_ibu' => 'required|string|max:255',
            'groom.anak_ke' => 'required|string|max:255',
            'groom.nama_kakak' => 'nullable|string|max:255',
            'groom.nama_adik' => 'nullable|string|max:255',
        ]);

        session([
            'booking.groom' => [
                'pengantin' => $request->groom['pengantin'],
                'nama_lengkap' => $request->groom['nama_lengkap'],
                'nama_panggilan' => $request->groom['nama_panggilan'],
                'alamat' => $request->groom['alamat'],
                'nama_ayah' => $request->groom['nama_ayah'],
                'nama_ibu' => $request->groom['nama_ibu'],
                'anak_ke' => $request->groom['anak_ke'],
                'nama_kakak' => $request->groom['nama_kakak'],
                'nama_adik' => $request->groom['nama_adik'],
            ]
        ]);

        // dd(session()->all());

        return redirect()->route('bride.from');
    }

    public function create_bride()
    {
        return view('Client.Booking.form-bride');
    }

    public function store_bride(Request $request)
    {
        $request->validate([
            'bride.pengantin' => 'required|string|in:pria,wanita',
            'bride.nama_lengkap' => 'required|string|max:255',
            'bride.nama_panggilan' => 'required|string|max:255',
            'bride.alamat' => 'required|string',
            'bride.nama_ayah' => 'required|string|max:255',
            'bride.nama_ibu' => 'required|string|max:255',
            'bride.anak_ke' => 'required|string|max:255',
            'bride.nama_kakak' => 'nullable|string|max:255',
            'bride.nama_adik' => 'nullable|string|max:255',
        ]);

        session([
            'booking.bride' => [
                'pengantin' => $request->bride['pengantin'],
                'nama_lengkap' => $request->bride['nama_lengkap'],
                'nama_panggilan' => $request->bride['nama_panggilan'],
                'alamat' => $request->bride['alamat'],
                'nama_ayah' => $request->bride['nama_ayah'],
                'nama_ibu' => $request->bride['nama_ibu'],
                'anak_ke' => $request->bride['anak_ke'],
                'nama_kakak' => $request->bride['nama_kakak'],
                'nama_adik' => $request->bride['nama_adik'],
            ]
        ]);

        // dd(session()->all());

         Return redirect()->route('concept.from');
    }

    public function create_concept(){
        return view('Client.Booking.form-concept');
    }

    public function store_concept(Request $request){
        $request->validate([
            'concept.nama_konsep' => 'required|string|max:255',
            'concept.deskripsi' => 'nullable|string',
            'concept.link_referensi' => 'nullable|url',
        ]);

        session([
            'booking.concept' => [
                'nama_konsep' => $request->concept['nama_konsep'],
                'deskripsi' => $request->concept['deskripsi'],
                'link_referensi' => $request->concept['link_referensi'],
            ]
        ]);

        // dd(session()->all());

        return redirect()->route('vendor.from');
    }

    public function create_vendor(){
        $vendors = Vendor::all();
        return view('Client.Booking.form-vendor', compact('vendors'));
    }

    public function store_vendor(Request $request){
        $vendors = collect($request->vendors ?? [])
            ->filter(fn ($v) => isset($v['checked']))
            ->values()
            ->toArray();

        if (empty($vendors)) {
            return back()->withErrors([
                'vendors' => 'Pilih minimal 1 vendor'
            ]);
        }

        validator(['vendors' => $vendors], [
            'vendors' => 'required|array',
            'vendors.*.vendor_id' => 'required|exists:vendors,id',
            'vendors.*.nama_vendor' => 'required|string',
            'vendors.*.kontak' => 'nullable|string',
        ])->validate();

        session([
            'booking.vendors' => $vendors
        ]);

        // dd(session()->all());

        return redirect()->route('review-data');
    }

}