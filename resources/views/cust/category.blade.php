@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kategori Jasa</h1>

        <!-- Tampilkan daftar kategori -->
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                    <p> desc : {{ $category->description }} </p>
                   
                </li>
            @endforeach
        </ul>
    </div>
@endsection
