<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('Admin.vendors.index', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_vendor' => 'required|string|max:255',
        ]);
        
        Vendor::create(
            [
                'jenis_vendor' => $request->jenis_vendor,
            ]
        );

        Alert::toast('Vendor berhasil ditambahkan.', 'success')->autoClose(3000);
        return redirect()->route('admin.vendors.index');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'jenis_vendor' => 'required|string|max:255',
        ]);

        $vendor->update([
            'jenis_vendor' => $request->jenis_vendor,
        ]);

        Alert::toast('Vendor berhasil diubah.', 'success')->autoClose(3000);

        return redirect()->route('admin.vendors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        Alert::toast('Vendor berhasil dihapus.', 'success')->autoClose(3000);

        return redirect()->route('admin.vendors.index');
    }
}
