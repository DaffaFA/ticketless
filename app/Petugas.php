<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use Notifiable;

    protected $table = 'petugas';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function username()
    {
        return 'username';
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
