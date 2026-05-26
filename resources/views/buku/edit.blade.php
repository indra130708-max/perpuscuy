@extends('layout')

@section('content')

<h3>Edit Buku</h3>

<form action="/buku/{{ $buku->id }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Judul Buku</label>

        <input type="text"
               name="judul_buku"
               value="{{ $buku->judul_buku }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Pengarang</label>

        <input type="text"
               name="pengarang"
               value="{{ $buku->pengarang }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Penerbit</label>

        <input type="text"
               name="penerbit"
               value="{{ $buku->penerbit }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Jenis Buku</label>

        <select name="jenis_buku"
                class="form-control">

            <option value="fiksi"
                {{ $buku->jenis_buku == 'fiksi' ? 'selected' : '' }}>
                Fiksi
            </option>

            <option value="non fiksi"
                {{ $buku->jenis_buku == 'non fiksi' ? 'selected' : '' }}>
                Non Fiksi
            </option>

        </select>
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>

        <input type="number"
               name="tahun_terbit"
               value="{{ $buku->tahun_terbit }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Jumlah Stok</label>

        <input type="number"
               name="jumlah_stok"
               value="{{ $buku->stokBuku->jumlah_stok }}"
               class="form-control">
    </div>

    <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi"
    class="form-control"
    rows="5">{{ $buku->deskripsi }}</textarea>
    </div>

    <div class="mb-3">
    <label>Cover Buku</label>
    <input type="file"
    name="cover"
    class="form-control">
    </div>

    <button class="btn btn-primary">
        Update
    </button>

</form>

@endsection