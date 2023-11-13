<!-- resources/views/pendaftar/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Pendaftar Penyedia Jasa</h1>

    @foreach ($pendaftarPenyediaJasas as $pendaftarJasa)
        <div>
            <h2>{{ $pendaftarJasa->nama_toko }}</h2>
            <p>{{ $pendaftarJasa->description }}</p>
            <p>Status: {{ $pendaftarJasa->status }}</p>
            <form action="{{ route('pendaftar.ubahstatus', ['id' => $pendaftarJasa->id_provider, 'status' => 'pending']) }}" method="post">
                @csrf
                @method('put')
                <button type="submit">Ubah ke Pending</button>
            </form>
            <form action="{{ route('pendaftar.ubahstatus', ['id' => $pendaftarJasa->id_provider, 'status' => 'approved']) }}" method="post">
                @csrf
                @method('put')
                <button type="submit">Ubah ke Approved</button>
            </form>
        </div>
    @endforeach
@endsection
