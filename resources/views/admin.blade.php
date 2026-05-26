@extends('layout')

@section('content')

<h3 class="mb-4">
    Dashboard Admin
</h3>

<div class="row">

    <div class="col-md-4">

        <div class="card bg-primary text-white mb-3">

            <div class="card-body">

                <h5>Total Buku</h5>

                <h2>{{ $totalBuku }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card bg-success text-white mb-3">

            <div class="card-body">

                <h5>Total User</h5>

                <h2>{{ $totalUser }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card bg-warning text-dark mb-3">

            <div class="card-body">

                <h5>Total Stok Buku</h5>

                <h2>{{ $totalStok }}</h2>

            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-body">

        <h5>
            Selamat datang,
            {{ auth()->user()->name }}
        </h5>

        <p>
            Anda login sebagai Admin.
        </p>

        <a href="/buku"
           class="btn btn-dark">

            Kelola Buku

        </a>

    </div>

</div>

@endsection