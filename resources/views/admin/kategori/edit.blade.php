@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Edit Kategori</h3>
            </div>
            <div class="card-body">
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

                    <div class="form-group" style="margin-top: 7px">
                        <img src="{{ asset('kategoriImages/'. $category->photo) }}" width="100" class="img-thumbnail">
                    </div>

                    
                    <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 10px">Simpan Perubahan</button>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
