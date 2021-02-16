<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Penumpang extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_penumpang';

    protected $table = 'penumpang';

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
