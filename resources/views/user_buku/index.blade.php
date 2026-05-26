@extends('layout')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">📚 Daftar Buku</h3>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Jenis</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($bukus as $buku)

                        <tr>

                            <td>{{ $bukus->firstItem() + $loop->index }}</td>

                            <td>
                                <a href="{{ route('user.buku.show', $buku->id) }}"
                                   class="fw-bold text-decoration-none">
                                    {{ $buku->judul_buku }}
                                </a>
                            </td>

                            <td>{{ $buku->pengarang }}</td>

                            <td>{{ $buku->penerbit }}</td>

                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $buku->jenis_buku }}
                                </span>
                            </td>

                            <td>{{ $buku->tahun_terbit }}</td>

                            <td>
                                <span class="badge bg-success">
                                    {{ $buku->stokBuku->jumlah_stok ?? 0 }}
                                </span>
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada data buku
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

                <div class="mt-3">
                    {{ $bukus->links('pagination::bootstrap-5') }}
                </div>

            </div>

        </div>
    </div>

</div>

@endsection