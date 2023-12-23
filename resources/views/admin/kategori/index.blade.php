@extends('layouts.app')

@section('content')
<div class ="containerutamadikit">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Kategori</h3>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="ml-auto">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah Kategori</a>
                </div>
            </div>
            
            <div class="card-body">
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
                                        <img src="{{ asset('kategoriImages/'. $category->photo) }}" alt="{{ $category->name }}" width="50" class="img-thumbnail">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
