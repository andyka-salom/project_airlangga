@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kategori</h1>
        <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Kategori:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="photo">Foto:</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>

            <div class="form-group">
                <img src="{{ asset('kategoriImages/'. $category->photo) }}" width="100">
            </div>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
