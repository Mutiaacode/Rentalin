<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;


    protected $table = 'mobil';


    protected $fillable = [
        'nama_mobil',
        'tahun',
        'tipe',
        'kapasitas_bbm',
        'plat_nomor',
        'transmisi',
        'jumlah_penumpang',
        'harga',
        'gambar',

    ];
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
    // app/Models/Mobil.php
    public function sewaAktif()
    {
        return $this->hasMany(Sewa::class)->whereIn('status', ['diterima']);
    }
}
