@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profil Customer</h1>
        <form action="{{ route('profil-customer.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="photo">Foto:</label>
                <input type="file" name="photo" class="form-control" value="{{ $profilCustomer->photo }}">
            </div>
            <div class="form-group">
                <label for="address">Alamat:</label>
                <input type="text" name="address" class="form-control" value="{{ $profilCustomer->address }}">
            </div>
            <button type="submit" class="btn btn-success" style="margin-top: 10px">Simpan Perubahan</button>
        </form>
    </div>
@endsection
