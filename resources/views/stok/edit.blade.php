@extends('layout')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="mb-4">Edit Stok Buku</h3>

            <form action="/stok/{{ $buku->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>

                    <input type="text"
                           class="form-control"
                           value="{{ $buku->judul_buku }}"
                           readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Stok</label>

                    <input type="number"
                           name="jumlah_stok"
                           class="form-control"
                           value="{{ $buku->stokBuku->jumlah_stok }}">
                </div>

                <button class="btn btn-primary">
                    Update Stok
                </button>

            </form>

        </div>
    </div>

</div>

@endsection