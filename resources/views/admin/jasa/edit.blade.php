@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Jasa</h1>
        <form method="POST" action="{{ route('jasa.update', $jasas->id_jasa) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_jasa">Nama Jasa:</label>
                <input type="text" name="nama_jasa" id="nama_jasa" class="form-control" value="{{ $jasas->nama_jasa }}">
            </div>

            <div class="form-group">
                <label for="deskripsi_jasa">Deskripsi:</label>
                <textarea name="deskripsi_jasa" id="deskripsi_jasa" class="form-control">{{ $jasas->deskripsi_jasa }}</textarea>
            </div>
            

            <div class="form-group">
                <label for="id_categories">Nama Kategori:</label>
                <select id="id_categories" name="id_categories" class="form-control" required>
                    <option style="color-text= light" value="">Pilih Kategori</option>
                    @foreach ($cat as $item)
                        @if($item->id == 1) <!-- Ganti $selectedCategoryId dengan nilai ID kategori yang disimpan -->
                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Foto:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <img src="{{ asset('jasaImages/'. $jasas->image) }}" width="100">
            </div>

            <div style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection