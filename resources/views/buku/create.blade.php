@extends('layout')

@section('content')

<h3>Tambah Buku</h3>

<form action="/buku" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label>Judul Buku</label>
        <input type="text"
               name="judul_buku"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Pengarang</label>
        <input type="text"
               name="pengarang"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text"
               name="penerbit"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Jenis Buku</label>

        <select name="jenis_buku"
                class="form-control">

            <option value="fiksi">Fiksi</option>
            <option value="non fiksi">Non Fiksi</option>

        </select>
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>

        <input type="number"
               name="tahun_terbit"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Jumlah Stok</label>

        <input type="number"
               name="jumlah_stok"
               class="form-control">
    </div>

    <div class="mb-3">

    <label>Deskripsi</label>

    <textarea name="deskripsi"
              class="form-control"
              rows="5"></textarea>

    </div>

    <div class="mb-3">
    <label>Cover Buku</label>

    <input type="file"
           name="cover"
           class="form-control">
    </div>

    <button class="btn btn-success">
        Simpan
    </button>

</form>

@endsection