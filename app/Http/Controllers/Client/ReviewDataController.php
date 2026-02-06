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
            'client' => 'required|array',
            'event' => 'required|array',
            'vendors' => 'required|array',
        ]);
        
        session([
            'booking' => [
                'client' => $request->client,
                'event' => $request->event,
                'vendors' => $request->vendors,
            ]
        ]);

        return redirect()->route('booking.review');
    }

}