<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $mobil = Mobil::latest()->get(); // Mengambil data terbaru di urutan awal
    return view('dashboard', compact('mobil'));
}
}
