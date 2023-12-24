<!-- resources/views/resume.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <br> <br>
        {{-- <h2>Shop Profile {{ $profilPenyediaJasa->nama_toko }}</h2> --}}

        <!-- Display user information -->
        {{-- <div>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Address:</strong> {{ $user->address ?? 'N/A' }}</p>
        </div>
        <br> <br> --}}
        <!-- Display provider information -->
        <h2>{{ $profilPenyediaJasa->nama_toko }} </h2>
        <div>
            {{-- <p><strong>Shop Name:</strong> {{ $profilPenyediaJasa->nama_toko }}</p> --}}
            @if($profilPenyediaJasa->photo)
                <img src="{{ asset('penyediaImages/' . $profilPenyediaJasa->photo) }}" class="img-fluid mb-3" width="200px" height="200px" alt="Provider Photo">
            @else
                <p>No photo available</p>
            @endif
            <p><strong>Address:</strong> {{ $profilPenyediaJasa->address }}</p>
            <p><strong>Description:</strong> {{ $profilPenyediaJasa->description }}</p>
            <p><strong>Price:</strong> {{ $profilPenyediaJasa->Harga ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
        <br> <br>
        <!-- Display reviews -->
        <h2>Top 5 Reviews</h2>
        <div>
            @forelse ($reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">{{ $review->comment }}</p>
                        <p class="card-text"><strong>Rating:</strong> {{ $review->rating }}</p>
                        <p class="card-text"><strong>Submitted:</strong> {{ $review->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @empty
                <p>No reviews available.</p>
            @endforelse
        </div>
        <br> <br>
    </div>
@endsection
