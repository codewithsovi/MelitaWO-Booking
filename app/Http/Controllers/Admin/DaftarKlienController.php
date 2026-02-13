<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Package;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarKlienController extends Controller
{
    public function paket(){
        $packages = Package::whereHas('client')->get();
        // $eventsToday = Event::with('client')->whereDate('tanggal_acara', today())->get();
        return view('Admin.clients.paket', compact('packages'));
    }

    public function index($package_id){
        $clients = Client::where('package_id', $package_id)->get();
        $package = Package::find($package_id);
        $eventsToday = Event::with('client')->whereDate('tanggal_acara', today())->get();
        return view('Admin.clients.daftarKlien', compact('clients', 'package'));
    }
}