<?php

namespace App\Http\Controllers\Admin;
use App\Models\Package;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countPackage= Package::count();
        $client= Client::where('status', 'diproses')->get();
        $clientDiproses = Client::where('status', 'diproses')->count();
        $clientDeal = Client::where('status', 'deal')->count();
        $clientDibatalkan = Client::where('status', 'dibatalkan')->count();

        return view('Admin.dashboard', compact('countPackage', 'client', 'clientDiproses', 'clientDeal', 'clientDibatalkan'));
    }
}
