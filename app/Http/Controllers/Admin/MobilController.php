<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    public function index()
    {
        
        $mobils = Mobil::with(['sewaAktif'])->get();

        return view('admin.mobil.index', compact('mobils'));
    }

    public function create()
    {
        return view('admin.mobil.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'kapasitas_bbm' => 'required|numeric',
            'transmisi' => 'required|string',
            'jumlah_penumpang' => 'required|integer',
            'harga' => 'required|numeric',
            'plat_nomor' => 'string|max:20',
            'tahun' => 'required|integer',
            'tipe' => 'required|string',
            'gambar' => 'required|image|max:2048',
        ]);

        $path = $request->file('gambar')->store('mobil', 'public');
        $validated['gambar'] = $path;

        Mobil::create($validated);

        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function edit(Mobil $mobil)
    {
        return view('admin.mobil.edit', compact('mobil'));
    }

    public function update(Request $request, Mobil $mobil)
    {
        $validated = $request->validate([
            'nama_mobil' => 'string|max:255',
            'kapasitas_bbm' => 'numeric',
            'transmisi' => 'string',
            'jumlah_penumpang' => 'integer',
            'harga' => 'numeric',
            'plat_nomor' => 'string|max:20',
            'tahun' => 'integer',
            'tipe' => 'string',
            'gambar' => 'image|max:2048',
        ]);

         if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('mobil', 'public'); // akan tersimpan di storage/app/public/mobil
        $mobil->gambar = $path; // ini yang masuk ke database
    }
        $mobil->update($validated);

        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil diperbarui.');
    }

    public function destroy($id)
{
    $mobil = Mobil::findOrFail($id);

   
    if ($mobil->gambar && Storage::disk('public')->exists($mobil->gambar)) {
        Storage::disk('public')->delete($mobil->gambar);
    }

    $mobil->delete();

    return redirect()->route('mobil.index')->with('success', 'Mobil berhasil dihapus.');
}

}
