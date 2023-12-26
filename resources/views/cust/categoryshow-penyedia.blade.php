@extends('layouts.app')

@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h1 class="mb-4">Profil Penyedia Jasa</h1>
                </div>

                @forelse ($profilPenyediaJasas as $profilPenyediaJasa)
                    <div class="col-lg-8 col-12 mt-3 mx-auto">
                        <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                            <div class="d-flex">
                                @if($profilPenyediaJasa->photo)
                                    <img src="{{ asset('penyediaImages/' . $profilPenyediaJasa->photo) }}" class="img-fluid mb-3" width="300px" height="100%" alt="{{ $profilPenyediaJasa->nama_toko }}">
                                @else
                                    <div class="no-photo-placeholder">
                                        Tidak ada foto
                                    </div>
                                @endif

                                <div class="custom-block-topics-listing-info d-flex flex-column ml-3">
                                    <h5 class="mb-2">{{ $profilPenyediaJasa->nama_toko }}</h5>
                                    <p class="mb-0"><strong>Jasa:</strong> {{ $profilPenyediaJasa->jasa->nama_jasa }}</p>
                                    <p class="mb-0"><strong>Alamat:</strong> {{ $profilPenyediaJasa->address }}</p>
                                    <p class="mb-0">{{ $profilPenyediaJasa->description }}</p>
                                    <p class="btn custom-btn mt-3 mt-lg-4">{{ $profilPenyediaJasa->Harga ?? 'Tidak ada data' }}</p>

                                    <div class="d-flex mt-auto">
                                        <a href="{{ route('order', $profilPenyediaJasa->id_provider) }}" class="btn btn-success mr-2" style="margin-right: 4px">
                                            <iconify-icon icon="icon-park-outline:shopping-bag"></iconify-icon> Order
                                        </a>
                                        <a href="{{ route('chatify.room', ['userId' => $profilPenyediaJasa->id_user]) }}" class="btn btn-success mr-2" style="margin-right: 4px">
                                            <iconify-icon icon="ep:chat-dot-round"></iconify-icon> Chat
                                        </a>
                                        <a href="{{ route('resume', ['user' => $profilPenyediaJasa->id_user, 'providerId' => $profilPenyediaJasa->id_provider]) }}" class="btn btn-success" style="margin-right: 4px">
                                            <iconify-icon icon="mdi:resume"></iconify-icon> Resume
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-8 col-12 mt-3 mx-auto">
                        <p class="text-muted">Tidak ada profil penyedia jasa yang ditemukan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
