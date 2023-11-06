@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Jasa</h1>
        <a href="{{ route('jasa.create') }}" class="btn btn-primary">Tambah Jasa</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jasas as $jasa)
                    <tr>
                        <td>{{ $jasa->id_jasa }}</td>
                        <td>{{ $jasa->nama_jasa }}</td>
                        <td>{{ $jasa->category->name }}</td>
                        <td>{{ $jasa->deskripsi_jasa }}</td>
                        <td>
                            @if($jasa->image)
                                <img src="{{ asset('jasaImages/'. $jasa->image) }}" alt="{{ $jasa->nama_jasa }}" width="50">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('jasa.edit', $jasa->id_jasa) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('jasa.destroy', $jasa->id_jasa) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Jasa ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
