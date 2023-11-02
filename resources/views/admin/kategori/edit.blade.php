<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>

        <link href="/admin/style.css" rel="stylesheet">
</head>
<body>
    <form action="{{ url ('Admincategory/'. $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')

    <div class="form-container">
        <a href="{{ url('Admincategory') }}" class="btn btn-dark">Kembali</a>
        <h1>Tambah Category</h1>
        <form>
            <div class="form-group">
                <label for="nama_categori">Nama Categori:</label>
                <input type="text" id="nama_categori" name="nama_categori" value=" {{ $data->name }}" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug Categori:</label>
                <input type="text" id="slug" name="slug" value=" {{ $data->slug }}" required>
            </div>
            <div class="form-group">
                <label for="desc">Deskripsi Categori:</label>
                <input type="text" id="desc" name="desc" value=" {{ $data->description }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" value=" {{ $data->photo }}">
            </div>
            <button type="submit" class="btn btn-dark">Simpan</button>
        </form>
    </div>
</body>
</html>



{{-- 
<div class="card-body">
    <div class = "form-group">
        <label for="nama_satuan">Nama satuan</label>
        <input type="text" name="nama_satuan" value="{{ Session::get('nama_satuan') }}" class="form-control md-3 
        @error('nama_satuan') is-invalid @enderror">
        @error('nama_satuan')
        <span class= "invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> --}}
