<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();
        // $eventsToday = Event::with('client')->whereDate('tanggal_acara', today())->get();
        return view('Admin.packages.index', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'jenis' => 'required|string|max:255',
                'harga' => 'required|numeric',
                'deskripsi' => 'required|string',
                'status' => 'required|in:aktif,non aktif',
            ]);

            Package::create(
                [
                    'jenis' => $request->jenis,
                    'harga' => $request->harga,
                    'deskripsi' => $request->deskripsi,
                    'status' => $request->status,
                ]
            );

        Alert::toast('Paket berhasil ditambahkan.', 'success')->autoClose(3000);

        return redirect()->route('admin.packages.index');
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'status' => 'required|in:aktif,non aktif',
        ]);

        $package->update([
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

         Alert::toast('Paket berhasil diperbarui.', 'success')->autoClose(3000);
        return redirect()->route('admin.packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
        
        Alert::toast('Paket berhasil dihapus.', 'success')->autoClose(3000);
        return redirect()->route('admin.packages.index');
    }
}
