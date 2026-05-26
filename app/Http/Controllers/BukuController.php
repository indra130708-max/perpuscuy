<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\StokBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // HALAMAN ADMIN
    public function index()
    {
        $bukus = Buku::with('stokBuku')->paginate(5);

        return view('buku.index', compact('bukus'));
    }

    // HALAMAN USER
    public function daftarBuku()
    {
        $bukus = Buku::with('stokBuku')->paginate(5);

        return view('user_buku.index', compact('bukus'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('buku.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'jenis_buku' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_stok' => 'required|integer',
            'cover' => 'nullable|image'
        ]);

        $cover = null;

        if ($request->hasFile('cover')) {

            $cover = $request->file('cover')
                ->store('cover_buku', 'public');
        }

        $buku = Buku::create([
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'jenis_buku' => $request->jenis_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'cover' => $cover,
            'deskripsi' => $request->deskripsi
        ]);

        StokBuku::create([
            'buku_id' => $buku->id,
            'jumlah_stok' => $request->jumlah_stok
        ]);

        return redirect('/buku')
            ->with('success', 'Data berhasil ditambah');
    }

    // DETAIL BUKU
    public function show(string $id)
    {
        $buku = Buku::with('stokBuku')->findOrFail($id);

        return view('buku.show', compact('buku'));
    }

    public function showUser(string $id)
{
    $buku = Buku::with('stokBuku')->findOrFail($id);

    return view('user_buku.show', compact('buku'));
}

    // FORM EDIT
    public function edit(string $id)
    {
        $buku = Buku::with('stokBuku')->findOrFail($id);

        return view('buku.edit', compact('buku'));
    }

    // UPDATE DATA
  public function update(Request $request, string $id)
    {
    $request->validate([
        'judul_buku' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'jenis_buku' => 'required',
        'tahun_terbit' => 'required',
        'cover' => 'nullable|image',
        'deskripsi' => 'required'
    ]);

        $buku = Buku::findOrFail($id);

        $cover = $buku->cover;

        if ($request->hasFile('cover')) {

            $cover = $request->file('cover')
                ->store('cover_buku', 'public');
        }

        $buku->update([
        'judul_buku' => $request->judul_buku,
        'pengarang' => $request->pengarang,
        'penerbit' => $request->penerbit,
        'jenis_buku' => $request->jenis_buku,
        'tahun_terbit' => $request->tahun_terbit,
        'cover' => $cover,
        'deskripsi' => $request->deskripsi
        ]);

        return redirect('/buku')
        ->with('success', 'Data buku berhasil diupdate');

        $buku->stokBuku->update([
            'jumlah_stok' => $request->jumlah_stok
        ]);

        return redirect('/buku')
            ->with('success', 'Data berhasil diupdate');
    }

    // HAPUS DATA
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect('/buku')
            ->with('success', 'Data berhasil dihapus');
    }

    public function editStok($id)
{
    $buku = Buku::with('stokBuku')->findOrFail($id);

    return view('stok.edit', compact('buku'));
}

public function updateStok(Request $request, $id)
{
    $request->validate([
        'jumlah_stok' => 'required|integer'
    ]);

    $buku = Buku::with('stokBuku')->findOrFail($id);

    $buku->stokBuku->update([
        'jumlah_stok' => $request->jumlah_stok
    ]);

    return redirect('/buku')
        ->with('success', 'Stok berhasil diupdate');
}
}
