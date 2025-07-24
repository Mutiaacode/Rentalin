<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'sewa';

    protected $fillable = [
        'user_id',
        'mobil_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'foto_ktp',
        'foto_sim',
        'no_hp',
        'sosial_media',
        'status',
        'bukti_pembayaran',
    ];

    // ✅ Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ✅ Relasi ke mobil
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
