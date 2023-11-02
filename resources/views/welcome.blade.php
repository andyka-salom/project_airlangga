@extends('layouts.app')

<!-- @section('title', 'Beranda') -->

@section('content')
        <!-- Carousel Start -->
        <div class="container-fluid px-0">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="/img/carousel-5.jpg" class="img-fluid" alt="First slide">
                        <div class="carousel-caption">
                            <div class="container carousel-content">
                                {{-- <h6 class="text-secondary h4 animated fadeInUp">Best IT Solutions</h6> --}}
                                <h1 class="text-white display-1 mb-4 animated fadeInLeft">Peluang yang Menyala untuk Orang-orang Berbakat</h1>
                                <p class="mb-4 text-white fs-5 animated fadeInDown">Selamat datang di platform kami, tempat di mana peluang pekerjaan berkualitas memancarkan cahaya terang untuk individu berbakat seperti Anda. Kami memahami bahwa setiap orang memiliki potensi unik, dan kami bertekad untuk membantu Anda menyalurkan bakat Anda ke dalam karier yang bersinar.</p>
                                <a href="" class="me-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Read More</button></a>
                                <a href="" class="ms-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact Us</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/carousel-6.jpg" class="img-fluid" alt="Second slide">
                        <div class="carousel-caption">
                            <div class="container carousel-content">
                                {{-- <h6 class="text-secondary h4 animated fadeInUp">Best IT Solutions</h6> --}}
                                <h1 class="text-white display-1 mb-4 animated fadeInRight">Menawarkan Pekerjaan yang Sesuai dengan Anda</h1>
                                <p class="mb-4 text-white fs-5 animated fadeInDown">kami berkomitmen untuk membantu Anda menemukan pekerjaan yang sesuai dengan bakat, minat, dan aspirasi Anda. Kami adalah tempat dimana bakat bertemu dengan peluang, membantu menciptakan keseimbangan yang sempurna antara individu yang berbakat dan perusahaan yang mencari karyawan berkualitas.</p>
                                <a href="" class="me-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Read More</button></a>
                                <a href="" class="ms-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact Us</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- About Start -->
            <div class="container-fluid py-5 my-5">
                <div class="container pt-5">
                    <div class="row g-5">
                        <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                            <div class="h-100 position-relative">
                                <img src="/img/about-2.jpg" class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
                                <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                                    <img src="/img/about-4.png" class="img-fluid w-100 rounded" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                            <h5 class="text-primary">About Us</h5>
                            <h1 class="mb-4">Apa Itu Airlangga Talent Network</h1>
                            <p>Adalah sebuah platform yang menyediakan peluang pekerjaan untuk warga Universitas Airlangga yang memiliki bakat. Platform ini adalah sebuah sistem yang didesain untuk memberikan peluang pekerjaan kepada mahasiswa Universitas Airlangga yang memiliki beragam bakat dan keterampilan. Melalui platform ini, mahasiswa dapat mencari, melamar, dan mendapatkan pekerjaan sesuai dengan keahlian dan minat mereka. Tujuan utama dari platform ini adalah untuk membantu mahasiswa mengembangkan keterampilan praktis, memperoleh pengalaman kerja, dan mendapatkan penghasilan sambil masih mengejar pendidikan mereka. Dengan demikian, platform ini berfungsi sebagai jembatan yang menghubungkan antara mahasiswa dan peluang pekerjaan yang relevan di lingkungan Universitas Airlangga.</p>
                            {{-- <p class="mb-4">Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p> --}}
                            <a href="" class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- About End -->

        <!-- Services Start -->
        <div class="container-fluid services py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 1000px;">
                    <h5 class="text-primary">Kategori</h5>
                    <h1>Kamu bisa pilih kategori yang kamu cari</h1>
                </div>
                <div class="row g-5 services-inner">
                    {{-- @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4">
                        <div class="services-item bg-light">
                            <div class="p-4 text-center services-content">
                                <div class="services-content-icon">
                                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                                        <div class="intro">
                                            <h3>{{ $category->name }}</h3>            
                                            <p>{{ $category->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}
                    {{-- <div class="col-lg-4 offset-lg-4 d-none d-lg-block"></div> --}}

                </div>
                
            </div>
        </div>
        <!-- Services End -->

        <!-- Team Start -->
        <div class="container-fluid py-5 mb-5 team">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Review Terbaik</h5>
                    <h1>orang orang yang ratingnya paling tinggi</h1>
                </div>
                <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
                    <div class="rounded team-item">
                        <div class="team-content">
                            <div class="team-img-icon">
                                <div class="team-img rounded-circle">
                                    <img src="/img/team-1.jpg" class="img-fluid w-100 rounded-circle" alt="">
                                </div>
                                <div class="team-name text-center py-3">
                                    <h4 class="">Full Name</h4>
                                    <p class="m-0">Designation</p>
                                </div>
                                <div class="team-icon d-flex justify-content-center pb-4">
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded team-item">
                        <div class="team-content">
                            <div class="team-img-icon">
                                <div class="team-img rounded-circle">
                                    <img src="/img/team-2.jpg" class="img-fluid w-100 rounded-circle" alt="">
                                </div>
                                <div class="team-name text-center py-3">
                                    <h4 class="">Full Name</h4>
                                    <p class="m-0">Designation</p>
                                </div>
                                <div class="team-icon d-flex justify-content-center pb-4">
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded team-item">
                        <div class="team-content">
                            <div class="team-img-icon">
                                <div class="team-img rounded-circle">
                                    <img src="/img/team-3.jpg" class="img-fluid w-100 rounded-circle" alt="">
                                </div>
                                <div class="team-name text-center py-3">
                                    <h4 class="">Full Name</h4>
                                    <p class="m-0">Designation</p>
                                </div>
                                <div class="team-icon d-flex justify-content-center pb-4">
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded team-item">
                        <div class="team-content">
                            <div class="team-img-icon">
                                <div class="team-img rounded-circle">
                                    <img src="/img/team-4.jpg" class="img-fluid w-100 rounded-circle" alt="">
                                </div>
                                <div class="team-name text-center py-3">
                                    <h4 class="">Full Name</h4>
                                    <p class="m-0">Designation</p>
                                </div>
                                <div class="team-icon d-flex justify-content-center pb-4">
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

        
        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

@endsection