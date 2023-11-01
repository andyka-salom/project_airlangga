
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profil Penyedia Jasa</h1>

        @foreach ($profilPenyediaJasas as $profilPenyediaJasa)
            <div class="provider-profile">
                <h2>{{ $profilPenyediaJasa->nama_provider }}</h2>
                <img src="{{ asset('path/to/provider/photos/' . $profilPenyediaJasa->photo) }}" alt="Provider Photo">
                <p>Alamat: {{ $profilPenyediaJasa->address }}</p>
                <p>Deskripsi: {{ $profilPenyediaJasa->description }}</p>
                <p>Harga: {{ $profilPenyediaJasa->Harga ?? 'Tidak ada data' }}</p>
            </div>
        @endforeach
    </div>
@endsection
