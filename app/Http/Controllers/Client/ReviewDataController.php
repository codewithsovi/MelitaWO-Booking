<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
    public function edit(string $id)
    {
        return view('ReviewData.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

}
