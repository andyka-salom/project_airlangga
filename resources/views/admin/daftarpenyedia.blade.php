@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Penyedia Jasa Approved</h1>

        @forelse ($penyediaJasas as $penyediaJasa)
            <div class="card mb-4">
                <div class="card-body">
                    <td>
                        @if($penyediaJasa->photo)
                            <img src="{{ asset('penyediaImages/'. $penyediaJasa->photo) }}" width="50">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <h2 class="card-title">{{ $penyediaJasa->nama_toko }}</h2>
                    <p class="card-text">Jasa : {{ $penyediaJasa->jasa->nama_jasa }}</p>
                    <p class="card-text">{{ $penyediaJasa->description }}</p>
                    <p class="card-text">Status : {{ $penyediaJasa->status }}</p>
                    <form action="{{ route('penyediajasa.nonaktifkan', $penyediaJasa->id_provider) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Tidak ada penyedia jasa yang approved.</p>
        @endforelse
    </div>
@endsection
