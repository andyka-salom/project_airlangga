@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Jasa Baru</h1>
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
                <label for="kategori">Nama Kategori:</label>
                <select id="id_categories" name="id_categories" class="form-control" required>
                    <option style="color-text= light" value="">Pilih Kategori</option>
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

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            
        </form>
    </div>
@endsection
