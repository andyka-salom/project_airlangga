@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <h1 class="mb-4">Profil Penyedia Jasa</h1>

        @forelse ($profilPenyediaJasas as $profilPenyediaJasa)
            <div class="card mb-4 provider-profile">
                <div class="card-body" style="height: fit-content;">
                    <h2 class="card-title">{{ $profilPenyediaJasa->nama_toko }}</h2>
                    @if($profilPenyediaJasa->photo)
                    <img src="{{ asset('penyediaImages/' . $profilPenyediaJasa->photo) }}" alt="Photo Provider" class="img-fluid mb-3"  width="150">
                    @else
                        Tidak ada foto
                    @endif
                    <p class="card-text"><strong>Jasa:</strong> {{ $profilPenyediaJasa->jasa->nama_jasa }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $profilPenyediaJasa->address }}</p>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $profilPenyediaJasa->description }}</p>
                    <p class="card-text"><strong>Harga:</strong> {{ $profilPenyediaJasa->Harga ?? 'Tidak ada data' }}</p>
                    <a href="{{ route('order', $profilPenyediaJasa->id_provider) }}" class="btn btn-success">
                        <iconify-icon icon="icon-park-outline:shopping-bag"></iconify-icon> Order</a>
                    <a href="{{ route('chatify.room', optional($profilPenyediaJasa)->id_user) }}"  class="btn btn-success">
                        <iconify-icon icon="ep:chat-dot-round"></iconify-icon> Chat</a>
                    <a href="#" class="btn btn-success">
                        <iconify-icon icon="mdi:resume"></iconify-icon> Resume</a>
                </div>
            </div>
        @empty
            <p>Tidak ada profil penyedia jasa yang ditemukan.</p>
        @endforelse
    </div> --}}

    <section class="section-padding">
        <div class ="containerpenyedia">
        <div class="container">
            <div class="row">
    
                <div class="col-lg-12 col-12 text-center">
                    <h3 class="mb-4">Profil Penyedia Jasa</h3>
                </div>
    
                @forelse ($profilPenyediaJasas as $profilPenyediaJasa)
                <div class="col-lg-8 col-12 mt-3 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            @if($profilPenyediaJasa->photo)
                            <img src="{{ asset('penyediaImages/' . $profilPenyediaJasa->photo) }}" class="img-fluid mb-3" width="200px" height="200px" alt="">
                            @else
                            Tidak ada foto
                            @endif
                            <div class="custom-block-topics-listing-info d-flex">
                                <div>
                                    <h5 class="mb-2">{{ $profilPenyediaJasa->nama_toko }}</h5>
                                    <p class="mb-0"><strong>Jasa:</strong> {{ $profilPenyediaJasa->jasa->nama_jasa }}</p>
                                    <p class="mb-0"><strong>Alamat:</strong> {{ $profilPenyediaJasa->address }}</p>
    
                                    <p class="mb-0">{{ $profilPenyediaJasa->description }}</p>
    
                                    <p class="btn custom-btn mt-3 mt-lg-4">{{ $profilPenyediaJasa->Harga ?? 'Tidak ada data' }}</p>
                                    
                                     
                                <div>
                                    <a href="{{ route('order', $profilPenyediaJasa->id_provider) }}" class="btn btn-success">
                                    <iconify-icon icon="icon-park-outline:shopping-bag"></iconify-icon> Order
                                </a>
                                <a href="#" class="btn btn-success">
                                    <iconify-icon icon="ep:chat-dot-round"></iconify-icon> Chat
                                </a>
                                <a href="#" class="btn btn-success">
                                    <iconify-icon icon="mdi:resume"></iconify-icon> Resume
                                </a>
                                </div>
                                    
                                </div>
    
                                
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>Tidak ada profil penyedia jasa yang ditemukan.</p>
                    @endforelse
                </div>
    </section>    


@endsection

