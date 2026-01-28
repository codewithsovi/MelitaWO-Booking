<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use App\Models\FAQ;
use App\Models\Content;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class KelolaKontenController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        $faqs = FAQ::all();
        $contents = Content::all();
        return view('Admin.contents.KelolaKonten', compact('faqs', 'contents', 'galleries'));
    }

    public function update_foto(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string|max:255',
        ],
        [
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus berupa jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 255 karakter.',
        ]
        );

        if ($request->hasFile('foto')) {
            // Delete old photo
            if ($gallery->foto && Storage::disk('public')->exists($gallery->foto)) {
                Storage::disk('public')->delete($gallery->foto);
            }

            // Upload new photo
            $foto = $request->file('foto');
            $fotoName = Str::uuid() . '.' . $foto->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('galleries', $foto, $fotoName);
            $gallery->foto = 'galleries/' . $fotoName;
        }

        $gallery->deskripsi = $validated['deskripsi'] ?? $gallery->deskripsi;
        $gallery->save();

        Alert::toast('Foto berhasil diperbarui.', 'success')->autoClose(3000);
        return redirect()->route('admin.kelola-konten.index');
    }

    // konten
     public function update_konten(Request $request, Content $content)
    {
        $request->validate([
            'tipe' => 'required|in:beranda,tentang,layanan,kontak',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $content->update([
            'tipe' => $request->tipe,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        Alert::toast('Content berhasil diperbarui.', 'success')->autoClose(3000);

        return redirect()->route('admin.kelola-konten.index');
    }

    // crud faq
        public function store_faq(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);
        FAQ::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        Alert::toast('FAQ berhasil ditambahkan.', 'success')->autoClose(3000);
        return redirect()->route('admin.kelola-konten.index');
    }
   
    public function update_faq(Request $request, FAQ $fAQ)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        $fAQ->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        Alert::toast('FAQ berhasil diperbarui.', 'success')->autoClose(3000);
        return redirect()->route('admin.kelola-konten.index');
    }

    public function destroy_faq(FAQ $fAQ)
    {
        $fAQ->delete();

        Alert::toast('FAQ berhasil dihapus.', 'success')->autoClose(3000);
        return redirect()->route('admin.kelola-konten.index');
    }
}