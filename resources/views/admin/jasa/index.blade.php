@extends('layouts.app')

@section('content')
<div class ="containerpenyedia">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Jasa</h3>
                <a href="{{ route('jasa.create') }}" class="btn btn-success ml-auto">Tambah Jasa</a>
            </div>
            <div class="card-body">
                @if(count($jasas) > 0)
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
                                            <img src="{{ asset('jasaImages/'. $jasa->image) }}" alt="{{ $jasa->nama_jasa }}"  style="height: 100%; width: 80%" class="img-thumbnail">
                                        @else
                                            Tidak ada foto
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                        <a href="{{ route('jasa.edit', $jasa->id_jasa) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('jasa.destroy', $jasa->id_jasa) }}" method="POST" style="margin-left: 5px;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Jasa ini?')">Hapus</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Tidak ada data jasa.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
