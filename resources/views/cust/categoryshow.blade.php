@extends('layouts.app') 

@section('content')
    {{-- <div class="container">
    
        <h2>Jasa dalam Kategori Ini</h2>

        @if ($jasas->count() > 0)
            <ul>
                @foreach ($jasas as $jasa)
                    <li>
                        <a href="{{ route('jasa.show', $jasa->id_jasa) }}">{{ $jasa->nama_jasa }}</a>
                        <p> deskripsi jasa : {{ $jasa->deskripsi_jasa }} </p>
                        <img src="{{ asset('jasaImages/'. $jasa->image) }}" width="100">
                    </li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada jasa dalam kategori ini.</p>
        @endif
    </div> --}}

    <div class="container">
        <div class="row">
    
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    
                       @if ($jasas->count() > 0)
                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                        <div class="row">
                            
                           @foreach ($jasas as $jasa)
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                  
                                    <a href="{{ route('jasa.show', $jasa->id_jasa) }}">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2"><a href="{{ route('jasa.show', $jasa->id_jasa) }}">{{ $jasa->nama_jasa }}</a></h5>
    
                                                <p class="mb-0">{{ $jasa->deskripsi_jasa }} </p>
                                            </div>
                                        </div>
    
                                        <img src="{{ asset('jasaImages/'. $jasa->image) }}" class="custom-block-image " alt="">
                                    </a>
                                  
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>

                       @else
                            <p>Tidak ada jasa dalam kategori ini.</p>
                        @endif
                           

                </div>
            </div>    
        </div>
    </div> 


@endsection
