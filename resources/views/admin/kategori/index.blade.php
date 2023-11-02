@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(Session::has('message'))
    <div class= "alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif

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
                                <a href="{{ url('Admincategory/'.$category->slug.'/edit') }}" class="btn btn-outline-success">edit</a>
                                <form onsubmit="return confirm('Yakin Hapus Category?')" class="d-inline" action="{{ url('Admincategory/'.$category->id) }}" 
                                    method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">delete</button>
                                </form>
                                {{-- <a href="{{ url('Admincategori/'.$category->id.'/edit') }}" class="btn btn-outline-danger">delete</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
