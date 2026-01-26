<?php

namespace App\Http\Controllers\Admin;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQ::all();
        return view('Admin.contents.FAQ.index', compact('faqs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQ $fAQ)
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
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $fAQ)
    {
        $fAQ->delete();

        Alert::toast('FAQ berhasil dihapus.', 'success')->autoClose(3000);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
