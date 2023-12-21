@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h3>Edit Jasa</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('jasa.update', $jasas->id_jasa) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_jasa" class="form-label">Nama Jasa:</label>
                        <input type="text" name="nama_jasa" id="nama_jasa" class="form-control" value="{{ $jasas->nama_jasa }}" placeholder="Contoh: Jasa Desain Grafis">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_jasa" class="form-label">Deskripsi:</label>
                        <textarea name="deskripsi_jasa" id="deskripsi_jasa" class="form-control" placeholder="Deskripsi singkat mengenai jasa">{{ $jasas->deskripsi_jasa }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="id_categories" class="form-label">Nama Kategori:</label>
                        <select id="id_categories" name="id_categories" class="form-control" required>
                            <option style="color: lightgray" value="" disabled>Pilih Kategori</option>
                            @foreach ($cat as $item)
                                @if($item->id == $jasas->category->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Foto:</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Pilih berkas gambar">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Saat Ini:</label>
                        <img src="{{ asset('jasaImages/'. $jasas->image) }}" width="100" class="img-thumbnail">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
