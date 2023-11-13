@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kategori</h1>
        @if(Session::has('message'))
            <div class= "alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
        <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah Kategori</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            @if($category->photo)
                                <img src="{{ asset('kategoriImages/'. $category->photo) }}" alt="{{ $category->name }}" width="50">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
