@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-4 text-center">Tambah Kategori Baru</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Fashion">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi:</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Tuliskan deskripsi yang cocok untuk kategori yang anda pilih">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto:</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
