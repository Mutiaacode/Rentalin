<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';

    protected $fillable = [
        'nama', 'email', 'password', 'peran'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
    public function sewa()
{
    return $this->hasMany(Sewa::class);
}

public function getSewaTerbaruAttribute()
{
    return $this->sewa()->latest()->first();
}


}
