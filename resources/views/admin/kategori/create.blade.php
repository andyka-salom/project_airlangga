@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-4" style="text-align: center">Tambah Kategori Baru</h3>
            </div>
            <div class="card-body">
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

                    
                        <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 10px">Simpan</button>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
