@extends('layouts.app')

@section('content')
<div class ="containerutamadikit">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h3>Tambah Jasa Baru</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('jasa.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_jasa" class="form-label">Nama Jasa:</label>
                        <input type="text" name="nama_jasa" id="nama_jasa" class="form-control" value="{{ old('nama_jasa') }}" placeholder="Contoh: Layanan Desain Grafis">
                        @error('nama_jasa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_jasa" class="form-label">Deskripsi:</label>
                        <textarea name="deskripsi_jasa" id="deskripsi_jasa" class="form-control" placeholder="Deskripsi singkat mengenai layanan">{{ old('deskripsi_jasa') }}</textarea>
                        @error('deskripsi_jasa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_categories" class="form-label">Nama Kategori:</label>
                        <select id="id_categories" name="id_categories" class="form-control" required>
                            <option style="color: lightgray" value="" disabled selected>Pilih Kategori</option>
                            @foreach ($cat as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('id_categories')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Foto:</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Pilih berkas gambar">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
