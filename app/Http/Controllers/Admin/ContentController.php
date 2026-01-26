<?php

namespace App\Http\Controllers\Admin;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::all();
        return view('Admin.contents.content.index', compact('contents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|in:beranda,tentang,layanan,kontak',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        Content::create([
            'tipe' => $request->tipe,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        Alert::toast('Content berhasil ditambahkan.', 'success')->autoClose(3000);

        return redirect()->route('admin.contents.index')->with('success', 'Content created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipe' => 'required|in:beranda,tentang,layanan,kontak',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $content = Content::findOrFail($id);
        $content->update([
            'tipe' => $request->tipe,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        Alert::toast('Content berhasil diperbarui.', 'success')->autoClose(3000);

        return redirect()->route('admin.contents.index')->with('success', 'Content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        Alert::toast('Content berhasil dihapus.', 'success')->autoClose(3000);

        return redirect()->route('admin.contents.index')->with('success', 'Content deleted successfully.');
    }
}
