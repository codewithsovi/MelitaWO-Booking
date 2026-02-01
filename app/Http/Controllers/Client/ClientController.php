<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Package;
use Illuminate\Http\Request;

class ClientController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::all();
        return view('Client.form-client', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        dd(session()->all());

        // return redirect()->route('booking.step2');  
    }
}
