
<!-- resources/views/profil/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Profil Pengguna</h3>

        <div id="profil-container">
            {{-- Foto Profil --}}
            <div id="foto-profil-container">
                <img id="foto-profil" src="{{ $user->photo ? asset('fotouser/'. $user->photo) : asset('avatar.png') }}" alt="Foto Profil">
                <label for="edit-foto-profil">Ubah Foto</label>
                <input type="file" id="edit-foto-profil" name="photo" accept="image/*">
            </div>

            {{-- Informasi Profil --}}
            <div id="informasi-profil">
                <form id="edit-profil-form" method="post" action="{{ route('profil.update') }}">
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

                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>

        @if($user->role === 'service_provider')
            <h2>Profil Penyedia Jasa</h2>
            @foreach($serviceProviders as $provider)
                <div class="card">
                    <img src="{{ asset('penyediaImages/' . $provider->photo) }}" alt="Provider Photo">
                    <h3>NAMA: {{ $provider->nama_toko }}</h3>
                    <p>Alamat: {{ $provider->address }}</p>
                    <p>Deskripsi: {{ $provider->description }}</p>
                    <p>Status: {{ $provider->status }}</p>
                    <p>Harga: {{ $provider->Harga }}</p>

                    <h4>Latest Reviews:</h4>
                    @foreach($provider->reviews->take(3) as $review)
                        <div class="review">
                            <img src="{{ asset('fotouser/' . $review->user->photo) }}" alt="{{ $review->user->name }}'s Photo">
                            <p>{{ $review->user->name }}</p>
                            <p>Rating: {{ $review->rating }}</p>
                            <p>Comment: {{ $review->comment }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const uploadFotoInput = document.getElementById('upload-foto');
            const fotoProfil = document.getElementById('foto-profil');
            const editFotoButton = document.getElementById('edit-foto');
            const editPasswordLink = document.getElementById('edit-password');
            const formEditProfil = document.getElementById('form-edit-profil');
            const editProfilForm = document.getElementById('edit-profil-form');

            function toggleEditForm(inputId, cancelButtonId) {
                const inputField = document.getElementById(inputId);
                const cancelButton = document.getElementById(cancelButtonId);

                inputField.readOnly = !inputField.readOnly;

                
            }

            // Event listener untuk tombol "Edit" foto profil
            editFotoButton.addEventListener('click', function () {
                uploadFotoInput.click();
            });

            // Event listener untuk tombol "Edit" setiap informasi profil
            const editButtons = document.querySelectorAll('.edit-button');
            editButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const inputId = 'edit-' + button.id.split('-')[1];
                    const cancelButtonId = 'cancel-' + button.id.split('-')[1];
                    toggleEditForm(inputId, cancelButtonId);
                });
            });

            // Event listener untuk mengganti foto profil saat input foto diubah
            uploadFotoInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function (e) {
                    fotoProfil.src = e.target.result;
                };

                reader.readAsDataURL(file);
            });

            // Event listener untuk menampilkan form edit profil saat link di klik
            editPasswordLink.addEventListener('click', function (event) {
                event.preventDefault();
                formEditProfil.style.display = 'block';
            });

            // Event listener untuk menyembunyikan form edit profil saat formulir di kirim
            editProfilForm.addEventListener('submit', function () {
                formEditProfil.style.display = 'none';
            });
        });
    </script>
@endsection
