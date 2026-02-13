<?php

namespace App\Http\Controllers\Admin;
use App\Models\Package;
use App\Models\Client;
use App\Models\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countPackage= Package::count();
       
        // $events = Event::with('client')->whereHas('client', function ($q) {$q->where('status', 'diterima');})->get();
        $clientDiproses = Client::where('status', 'diproses')->count();
        $clientDeal = Client::where('status', 'diterima')->count();
        $clientDibatalkan = Client::where('status', 'dibatalkan')->count();
        $eventsToday = Event::with('client')->whereDate('tanggal_acara', today())->get();
        
        // dd($events);
        return view('Admin.dashboard', compact('countPackage','clientDiproses', 'clientDeal', 'clientDibatalkan', 'eventsToday'));
    }
}
