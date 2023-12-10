@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Buat Profil Customer</h2>
        <form action="{{ route('profil-customer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo">Foto Profile:</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Alamat:</label>
                <input type="text" name="address" class="form-control">
            </div>
            <!-- Tambahkan lebih banyak input sesuai kebutuhan -->
            <button type="submit" class="btn btn-success" style="margin-top: 10px">Simpan Profil</button>
        </form>
    </div>
@endsection
