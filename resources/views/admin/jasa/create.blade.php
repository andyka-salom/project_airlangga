@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tambah Jasa Baru</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('jasa.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nama_jasa">Nama Jasa:</label>
                        <input type="text" name="nama_jasa" id="nama_jasa" class="form-control" value="{{ old('nama_jasa') }}">
                        @error('nama_jasa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_jasa">Deskripsi:</label>
                        <textarea name="deskripsi_jasa" id="deskripsi_jasa" class="form-control">{{ old('deskripsi_jasa') }}</textarea>
                        @error('deskripsi_jasa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_categories">Nama Kategori:</label>
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

                    <div class="form-group">
                        <label for="image">Foto:</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
