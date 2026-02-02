<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\WeddingPerson;
use App\Models\Client;
use App\Models\Package;
use App\Models\Concept;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // client
    public function create_client()
    {
        $packages = Package::all();
        return view('Client.form-client', compact('packages'));
    }

    public function store_client(Request $request)
    {
        $request->validate([
            'nama_client' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:20',
            'alamat' => 'required|string',
            'package_id' => 'required|exists:packages,id',
        ]);

        session([
            'booking.client' => [
                'nama_client' => $request->nama_client,
                'email' => $request->email,
                'phone' => $request->phone,
                'alamat' => $request->alamat,
            ],
            [
                'paket'=>[
                    'package_id' => $request->package_id,
                ]
            ]
        ]); 

        // dd(session()->all());

        return redirect()->route('event.from');  
    }

    // ===========================================================
    // event
    // ===========================================================
    public function create_event()
    {
        return view('Client.form-event');
    }

    public function store_event(Request $request)
    {
        $request->validate([
            'tanggal_acara' => 'required|date',
            'waktu_acara' => 'required',
            'lokasi_acara' => 'required|string',
            'catatan_tambahan' => 'nullable|string',
        ]);

        session([
            'booking.event' => [
                'tanggal_acara' => $request->tanggal_acara,
                'waktu_acara' => $request->waktu_acara,
                'lokasi_acara' => $request->lokasi_acara,
                'catatan_tambahan' => $request->catatan_tambahan,
            ]
        ]);

        //  dd(session()->all());

        return redirect()->route('groom.from');
    }

    // ===========================================================
    // groom
    // ===========================================================
    public function create_groom()
    {
        return view('Client.form-groom');
    }

    public function store_groom(Request $request)
    {
        $request->validate([
            'pengantin' => 'required|string|in:pria,wanita',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'anak_ke' => 'required|string|max:255',
            'nama_kakak' => 'nullable|string|max:255',
            'nama_adik' => 'nullable|string|max:255',
        ]);

        session([
            'booking.groom' => [
                'pengantin' => $request->pengantin,
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'alamat' => $request->alamat,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'anak_ke' => $request->anak_ke,
                'nama_kakak' => $request->nama_kakak,
                'nama_adik' => $request->nama_adik,
            ]
        ]);

        // dd(session()->all());

        return redirect()->route('bride.from');
    }

    public function create_bride()
    {
        return view('Client.form-bride');
    }

    public function store_bride(Request $request)
    {
        $request->validate([
            'pengantin' => 'required|string|in:pria,wanita',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'anak_ke' => 'required|string|max:255',
            'nama_kakak' => 'nullable|string|max:255',
            'nama_adik' => 'nullable|string|max:255',
        ]);

        session([
            'booking.bride' => [
                'pengantin' => $request->pengantin,
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'alamat' => $request->alamat,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'anak_ke' => $request->anak_ke,
                'nama_kakak' => $request->nama_kakak,
                'nama_adik' => $request->nama_adik,
            ]
        ]);

        // dd(session()->all());

         Return redirect()->route('concept.from');
    }

    public function create_concept(){
        return view('Client.form-concept');
    }

    public function store_concept(Request $request){
        $request->validate([
            'nama_konsep' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link_referensi' => 'nullable|url',
        ]);

        session([
            'booking.concept' => [
                'nama_konsep' => $request->nama_konsep,
                'deskripsi' => $request->deskripsi,
                'link_referensi' => $request->link_referensi,
            ]
        ]);

        dd(session()->all());

        // return redirect()->route('landing-page');
    }
}
