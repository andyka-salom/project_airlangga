@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profil Pengguna</h1>
        <div class="outer-container">
        <div id="profil-container">
            {{-- Foto Profil --}}
            <div id="foto-profil-container">
                @if($user->photo)
                    <img id="foto-profil" src="{{ asset('fotouser/'. $user->photo) }}" alt="Foto Profil" class="clickable-photo">
                @else
                    <img id="foto-profil" src="{{ asset('avatar.png') }}" alt="Default Foto Profil" class="clickable-photo">
                @endif
                <br>
            </div>

            {{-- Informasi Profil --}}
            <div id="informasi-profil">
                <form id="edit-profil-form" method="post" action="{{ route('profil.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="center-label">
                    <label for="edit-foto-profil" class="btn btn-primary">Ganti Foto Profil</label>
                    </div>
                    <input type="file" name="photo" id="edit-foto-profil" class="form-control" style="display: none;">
                    <label for="edit-nama">Nama:</label>
                    <input type="text" id="edit-nama" name="name" value="{{ $user->name }}">

                    <label for="edit-email">Email:</label>
                    <input type="email" id="edit-email" name="email" value="{{ $user->email }}">

                    <label for="edit-alamat">Alamat:</label>
                    <input type="text" id="edit-alamat" name="address" value="{{ $user->address ?? '' }}">

                    <label for="edit-password">Password Baru:</label>
                    <input type="password" id="edit-password" name="password">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

        @if($user->role === 'service_provider')
            <h2>Profil Penyedia Jasa</h2>
            @foreach($serviceProviders as $provider)
                <div class="card">
                    <img src="{{ asset('penyediaImages/' . $provider->photo) }}" alt="Provider Photo">
                    <h3>NAMA  : {{ $provider->nama_toko }}</h3>
                    <p>Alamat: {{ $provider->address }}</p>
                    <p>Deskripsi: {{ $provider->description }}</p>
                    <p>Status: {{ $provider->status }}</p>
                    <p>Harga: {{ $provider->Harga }}</p>
                    <h4>Latest Reviews:</h4>         
                    <div class="reviews-container">
                        @foreach($provider->reviews->take(3) as $review)
                            <div class="review-card">
                                <img class="review-user-photo" src="{{ asset('fotouser/' . $review->user->photo) }}" alt="{{ $review->user->name }}'s Photo">
                                <p class="review-username">{{ $review->user->name }}</p>
                                <p class="review-rating">{{ $review->rating }}</p>
                                <p class="review-comment">{{ $review->comment }}</p>
                                <!-- Display other review details as needed -->
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    </div>

    <!-- Modal for displaying larger profile picture -->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoModalLabel">Foto Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modal-photo" src="#" alt="Foto Profil" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const uploadFotoButton = document.getElementById('foto-profil');
            const uploadFotoInput = document.getElementById('edit-foto-profil');
            const modalPhoto = document.getElementById('modal-photo');

            // Event listener untuk menampilkan foto profil dalam modal
            uploadFotoButton.addEventListener('click', function () {
                modalPhoto.src = uploadFotoButton.src;
                $('#photoModal').modal('show');
            });

            // Event listener untuk menampilkan preview foto saat memilih file
            uploadFotoInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function (e) {
                    uploadFotoButton.src = e.target.result;
                    modalPhoto.src = e.target.result; // Update modal photo as well
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection