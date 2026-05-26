@extends('layout')

@section('content')

<div class="card">
    <div class="card-body">

        <h3>Dashboard User</h3>

        <hr>

        <p>
            Selamat datang,
            <b>{{ auth()->user()->name }}</b>
        </p>

        <p>
            Anda login sebagai User.
        </p>

        <a href="/daftar-buku"
           class="btn btn-success">

            Lihat Buku

        </a>

    </div>
</div>

@endsection