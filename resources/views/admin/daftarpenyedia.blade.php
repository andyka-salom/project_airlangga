@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Daftar Penyedia Jasa Approved</h3>

        @forelse ($penyediaJasas as $penyediaJasa)
            <div class="card mb-4 shadow rounded" style="background-color: #f8f9fa;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            @if($penyediaJasa->photo)
                                <img src="{{ asset('penyediaImages/'. $penyediaJasa->photo) }}" width="200" class="rounded-circle border" alt="Foto Penyedia Jasa">
                            @else
                                <div class="no-photo-placeholder rounded-circle border d-flex align-items-center justify-content-center" style="height: 200px; width: 200px; border: 2px dashed #ddd; background-color: #fff;">
                                    <span class="text-muted">Tidak ada foto</span>
                                </div>
                            @endif
                        </div>
                        <div style="margin-left: 20px">
                            <h4 class="card-title">{{ $penyediaJasa->nama_toko }}</h4>
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
            <div class="text-center">
                <p class="text-muted">Tidak ada penyedia jasa yang approved.</p>
            </div>
        @endforelse
    </div>
@endsection
