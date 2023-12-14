@extends('layouts.app')

@section('content')
<div class ="containerpenyedia">
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Daftar Pendaftar Penyedia Jasa</h3>

        @forelse ($pendaftarPenyediaJasas as $pendaftarJasa)
            <div class="card mb-4">
                <div class="card-body d-flex align-items-center">
                    <div>
                        @if($pendaftarJasa->photo)
                            <img src="{{ asset('penyediaImages/'. $pendaftarJasa->photo) }}" width="200">
                        @else
                            <div class="no-photo-placeholder mr-3">
                                Tidak ada foto
                            </div>
                        @endif
                    </div>
                    <div style="margin-left: 10px">
                        <h4 class="card-title">{{ $pendaftarJasa->nama_toko }}</h4>
                        <p class="card-text">{{ $pendaftarJasa->description }}</p>
                        <p class="card-text">Status: {{ $pendaftarJasa->status }}</p>
                        <form action="{{ route('pendaftar.ubahstatus', ['id' => $pendaftarJasa->id_provider, 'status' => 'pending']) }}" style="display: inline" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-warning mr-2">Ubah ke Pending</button>
                        </form>
                        <form action="{{ route('pendaftar.ubahstatus', ['id' => $pendaftarJasa->id_provider, 'status' => 'approved']) }}" style="display: inline" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-success">Ubah ke Approved</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada pendaftar penyedia jasa.</p>
        @endforelse
    </div>
</div>
@endsection
