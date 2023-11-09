@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <!-- Gambar Profil -->
                    <img src="{{ asset('path-to-your-image.jpg') }}" alt="Profil Image" class="img-fluid mb-3">

                    <!-- Nama Pengguna -->
                    <h4>{{ Auth::user()->name }}</h4>

                    <!-- Email Pengguna -->
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Isi profil lainnya di bagian sebelah kanan -->
            <!-- Misalnya: detail tambahan, riwayat, atau informasi lainnya -->
        </div>
    </div>
@endsection