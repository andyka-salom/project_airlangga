
@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Profil Pengguna</h3>

        <div id="profil-container">
            {{-- Foto Profil --}}
            <div id="foto-profil-container">

            </div>

            {{-- Informasi Profil --}}
            <div id="informasi-profil">
                <form id="edit-profil-form" method="post" action="{{ route('profil.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <label for="edit-nama">Nama:</label>
                    <input type="text" id="edit-nama" name="name" value="{{ $user->name }}">

                    <label for="edit-email">Email:</label>
                    <input type="email" id="edit-email" name="email" value="{{ $user->email }}">

                    <label for="edit-alamat">Alamat:</label>
                    <input type="text" id="edit-alamat" name="address" value="{{ $user->address ?? '' }}">

                    <label for="edit-password">Password Baru:</label>
                    <input type="password" id="edit-password" name="password">

                </form>
            </div>
        </div>

        @if($user->role === 'service_provider')
            <h2>Profil Penyedia Jasa</h2>
            @foreach($serviceProviders as $provider)
                <div class="card">
                    <img src="{{ asset('penyediaImages/' . $provider->photo) }}" alt="Provider Photo">

                    <p>Alamat: {{ $provider->address }}</p>
                    <p>Deskripsi: {{ $provider->description }}</p>
                    <p>Status: {{ $provider->status }}</p>
                    <p>Harga: {{ $provider->Harga }}</p>


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
