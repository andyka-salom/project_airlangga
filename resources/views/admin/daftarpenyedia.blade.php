@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Daftar Penyedia Jasa Approved</h3>

        @forelse ($penyediaJasas as $penyediaJasa)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            @if($penyediaJasa->photo)
                                <img src="{{ asset('penyediaImages/'. $penyediaJasa->photo) }}" width="200" >
                            @else
                                <div class="no-photo-placeholder mr-3">
                                    Tidak ada foto
                                </div>
                            @endif
                        </div>
                        <div style="margin-left: 10px">
                            <h4 class="card-title">{{ $penyediaJasa->nama_toko }}</h5>
                            <p class="card-text">Jasa: {{ $penyediaJasa->jasa->nama_jasa }}</p>
                            <p class="card-text">{{ $penyediaJasa->description }}</p>
                            <p class="card-text">Status: {{ $penyediaJasa->status }}</p>
                            <form action="{{ route('penyediajasa.nonaktifkan', $penyediaJasa->id_provider) }}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada penyedia jasa yang approved.</p>
        @endforelse
    </div>
@endsection
