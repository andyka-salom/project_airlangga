@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center" >Kategori Jasa</h1>
        <div class="row">
            <div class="container-fluid services row g-5 services-inner">
                @foreach($categories as $category)
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay>
                        <div class="services-item bg-light">
                            <div class="p-4 text-center services-content">
                                <div class="services-content-icon">
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="img-fluid mb-4">
                                    <h4 class="mb-3">{{ $category->name }}</h4>
                                    <p class="mb-4">{{ $category->description }}</p>
                                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
 
@endsection
