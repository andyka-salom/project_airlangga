@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Profil Penyedia Jasa</h1>

        @forelse ($profilPenyediaJasas as $profilPenyediaJasa)
            <div class="card mb-4 provider-profile">
                <div class="card-body" style="height: fit-content;">
                    <h2 class="card-title">{{ $profilPenyediaJasa->nama_toko }}</h2>
                    @if($profilPenyediaJasa->photo)
                    <img src="{{ asset('penyediaImages/' . $profilPenyediaJasa->photo) }}" alt="Photo Provider" class="img-fluid mb-3">
                    @else
                        Tidak ada foto
                    @endif
                    <p class="card-text"><strong>Jasa:</strong> {{ $profilPenyediaJasa->jasa->nama_jasa }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $profilPenyediaJasa->address }}</p>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $profilPenyediaJasa->description }}</p>
                    <p class="card-text"><strong>Harga:</strong> {{ $profilPenyediaJasa->Harga ?? 'Tidak ada data' }}</p>
                    <a href="{{ route('order', $profilPenyediaJasa->id_provider) }}" class="btn btn-success">
                        <iconify-icon icon="icon-park-outline:shopping-bag"></iconify-icon> Order</a>
                    <a href="#" class="btn btn-success">
                        <iconify-icon icon="ep:chat-dot-round"></iconify-icon> Chat</a>
                    <a href="#" class="btn btn-success">
                        <iconify-icon icon="mdi:resume"></iconify-icon> Resume</a>
                </div>
            </div>
        @empty
            <p>Tidak ada profil penyedia jasa yang ditemukan.</p>
        @endforelse
    </div>
@endsection
