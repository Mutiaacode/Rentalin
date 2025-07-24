<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sewa;
use App\Models\Mobil;

class AdminController extends Controller
{
    public function index()
    {
        $sewa = Sewa::with('user', 'mobil')->latest()->get();
        return view('admin.index', compact('sewa'));
    }

    public function sewa($id)
    {
        $data = Sewa::with('user', 'mobil')->findOrFail($id);
        return view('admin.sewa', compact('data'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:pending,diterima,ditolak,selesai']);
        $sewa = Sewa::findOrFail($id);
        $sewa->status = $request->status;
        $sewa->save();

        return back()->with('success', 'Status sewa diperbarui.');
    }

    public function destroy($id)
    {
        $sewa = Sewa::findOrFail($id);
        $sewa->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data sewa dihapus.');
    }
}
