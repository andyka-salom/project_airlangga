@extends('layouts.app')

@section('content')
<div class ="containerutamadikit">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h3>Edit Kategori</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi:</label>
                        <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto:</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Saat Ini:</label>
                        <img src="{{ asset('kategoriImages/'. $category->photo) }}" width="100" class="img-thumbnail">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
