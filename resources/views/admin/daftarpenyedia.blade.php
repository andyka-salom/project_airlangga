
@extends('layouts.app')

@section('content')
    <h1>Daftar Penyedia Jasa Approved</h1>

    @foreach ($penyediaJasas as $penyediaJasa)
        <div>
            <h2>{{ $penyediaJasa->nama_toko }}</h2>
            <p>{{ $penyediaJasa->description }}</p>
            <p>Status: {{ $penyediaJasa->status }}</p>
            <form action="{{ route('penyediajasa.nonaktifkan', $penyediaJasa->id_provider) }}" method="post">
                @csrf
                @method('put')
                <button type="submit">Nonaktifkan</button>
            </form>
        </div>
    @endforeach
@endsection
