@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Kategori Baru</h1>
        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nama Kategori:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="photo">Foto:</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
