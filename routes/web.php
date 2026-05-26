<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Models\Buku;
use App\Models\User;
use App\Models\StokBuku;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', function () {

        $totalBuku = Buku::count();

        $totalUser = User::count();

        $totalStok = StokBuku::sum('jumlah_stok');

        return view('admin', compact(
            'totalBuku',
            'totalUser',
            'totalStok'
        ));
    });

    Route::resource('buku', BukuController::class);

});

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/user', function () {
        return view('user');
    });
    Route::get('/daftar-buku', [BukuController::class, 'daftarBuku']);

    Route::get('/user-buku/{id}', [BukuController::class, 'showUser'])
        ->name('user.buku.show');


    Route::get('/daftar-buku',
    [BukuController::class, 'daftarBuku']);

});

Route::get('/stok/{id}/edit', [BukuController::class, 'editStok']);
Route::put('/stok/{id}', [BukuController::class, 'updateStok']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
