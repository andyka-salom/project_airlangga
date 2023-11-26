@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Pendaftar Penyedia Jasa</h1>

        @forelse ($pendaftarPenyediaJasas as $pendaftarJasa)
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $pendaftarJasa->nama_toko }}</h2>
                    <p class="card-text">{{ $pendaftarJasa->description }}</p>
                    <p class="card-text">Status: {{ $pendaftarJasa->status }}</p>
                    <form action="{{ route('pendaftar.ubahstatus', ['id' => $pendaftarJasa->id_provider, 'status' => 'pending']) }}" style="display: inline" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-warning">Ubah ke Pending</button>
                    </form>
                    <form action="{{ route('pendaftar.ubahstatus', ['id' => $pendaftarJasa->id_provider, 'status' => 'approved']) }}" style="display: inline" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-success">Ubah ke Approved</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Tidak ada pendaftar penyedia jasa.</p>
        @endforelse
    </div>
@endsection
