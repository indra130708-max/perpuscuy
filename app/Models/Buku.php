<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
    'judul_buku',
    'pengarang',
    'penerbit',
    'jenis_buku',
    'tahun_terbit',
    'cover',
    'deskripsi'
];

    public function stokBuku()
    {
        return $this->hasOne(StokBuku::class);
    }
}