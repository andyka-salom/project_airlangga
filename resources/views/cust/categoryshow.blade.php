@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Kategori: {{ $selectedCategory->name }}</h1>

        <h2>Jasa dalam Kategori Ini</h2>

        @if ($jasas->count() > 0)
            <ul>
                @foreach ($jasas as $jasa)
                    <li>
                        <a href="{{ route('jasa.show', $jasa->id_jasa) }}">{{ $jasa->nama_jasa }}</a>
                        <p> deskripsi jasa : {{ $jasa->deskripsi_jasa }} </p>
                     
                    </li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada jasa dalam kategori ini.</p>
        @endif
    </div>
@endsection
