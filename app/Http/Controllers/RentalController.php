<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Sewa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RentalController extends Controller
{
    // Menampilkan form sewa
    public function form($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('rental', compact('mobil'));
    }

    // Menyimpan data sewa baru
    public function store(Request $request)
    {
        $request->validate([
            'mobil_id' => 'required|exists:mobil,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_sim' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'no_hp' => 'required|string',
            'sosial_media' => 'required|string',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file foto KTP dan SIM
        $fotoKtpPath = $request->file('foto_ktp')->store('ktp', 'public');
        $fotoSimPath = $request->file('foto_sim')->store('sim', 'public');

        // Simpan bukti pembayaran 
        $buktiPembayaranPath = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        // Simpan data ke tabel sewa
        Sewa::create([
            'user_id' => Auth::id(),
            'mobil_id' => $request->mobil_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'foto_ktp' => $fotoKtpPath,
            'foto_sim' => $fotoSimPath,
            'no_hp' => $request->no_hp,
            'sosial_media' => $request->sosial_media,
            'bukti_pembayaran' => $buktiPembayaranPath,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pengajuan sewa berhasil!');
    }
}
