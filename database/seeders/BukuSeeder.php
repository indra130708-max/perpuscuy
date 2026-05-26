<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\StokBuku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {

            $buku = Buku::create([
                'judul_buku' => 'Buku '.$i,
                'pengarang' => 'Pengarang '.$i,
                'penerbit' => 'Penerbit '.$i,
                'jenis_buku' => 'fiksi',
                'tahun_terbit' => 2024
            ]);

            StokBuku::create([
                'buku_id' => $buku->id,
                'jumlah_stok' => 10
            ]);
        }
    }
}