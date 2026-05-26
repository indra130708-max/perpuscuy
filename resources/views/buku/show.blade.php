@extends('layout')

@section('content')

<div class="card">

    <div class="card-body">

        <h3>{{ $buku->judul_buku }}</h3>

        <hr>

        <div class="d-flex gap-4 align-items-start">

            {{-- Cover --}}
            <div>
                @if($buku->cover)

                    <img src="{{ asset('storage/'.$buku->cover) }}"
                         width="200">

                @endif
            </div>

            {{-- Detail Buku --}}
            <div>

                <p><b>Pengarang:</b> {{ $buku->pengarang }}</p>

                <p><b>Penerbit:</b> {{ $buku->penerbit }}</p>

                <p><b>Jenis:</b> {{ $buku->jenis_buku }}</p>

                <p><b>Tahun:</b> {{ $buku->tahun_terbit }}</p>

                <p>
                    <b>Stok:</b>
                    {{ $buku->stokBuku->jumlah_stok }}
                </p>

                <hr>

                <h5>Deskripsi Buku</h5>

                <p>
                    {{ $buku->deskripsi }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection