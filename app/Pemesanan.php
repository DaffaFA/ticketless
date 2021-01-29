<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $guarded = [];

    public function penumpang()
    {
        return $this->belongsTo(Penumpang::class, 'id_penumpang');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}
