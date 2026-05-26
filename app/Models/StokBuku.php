<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokBuku extends Model
{
    protected $fillable = [
        'buku_id',
        'jumlah_stok'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}