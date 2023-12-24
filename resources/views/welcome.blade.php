@extends('layouts.app')

<!-- @section('title', 'Beranda') -->

@section('content')

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Discover. Learn. Enjoy</h1>

                <h6 class="text-center">platform for creatives around the world</h6>

                <!-- <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1">
                            
                        </span>

                        <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">

                        <button type="submit" class="form-control">Search</button>
                    </div>
                </form> -->
            </div>

        </div>
    </div>
</section>

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
                            <h2 class="mb-4">Apa Itu Airlangga Talent Network</h2>
                            <p>Adalah sebuah platform yang menyediakan peluang pekerjaan untuk warga Universitas Airlangga yang memiliki bakat. Platform ini adalah sebuah sistem yang didesain untuk memberikan peluang pekerjaan kepada mahasiswa Universitas Airlangga yang memiliki beragam bakat dan keterampilan. Melalui platform ini, mahasiswa dapat mencari, melamar, dan mendapatkan pekerjaan sesuai dengan keahlian dan minat mereka. Tujuan utama dari platform ini adalah untuk membantu mahasiswa mengembangkan keterampilan praktis, memperoleh pengalaman kerja, dan mendapatkan penghasilan sambil masih mengejar pendidikan mereka. Dengan demikian, platform ini berfungsi sebagai jembatan yang menghubungkan antara mahasiswa dan peluang pekerjaan yang relevan di lingkungan Universitas Airlangga.</p>
                            {{-- <p class="mb-4">Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p> --}}
                            {{-- <a href="" class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Details</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        <!-- About End -->

        <!-- Services Start -->
        <div class="container-fluid services py-5 mb-5" id="section_2">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 1000px;">
                    <h5 class="text-primary">Kategori</h5>
                    <h1>Kamu bisa pilih kategori yang kamu cari</h1>
                </div>
                <div class="row g-5 services-inner">
                    @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4">
                        <div class="services-item bg-light">
                            <div class="p-4 text-center services-content">
                                <div class="services-content-icon">
                                    <img src="{{ asset('kategoriImages/'. $category->photo) }}" width="100">
                                        <div class="intro">
                                            <h3>{{ $category->name }}</h3>            
                                            <p>{{ $category->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                    <div class="col-lg-4 offset-lg-4 d-none d-lg-block"></div>

                </div>
                
            </div>
        </div>
        <!-- Services End -->

        <!-- Team Start -->
        {{-- <div class="container-fluid py-5 mb-5 team" >
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
        </div> --}}
        <!-- Team End -->
            
                    
        <section class="timeline-section section-padding" id="section_3">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="text-white mb-4">How does it work?</h1>
                        </div>

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="timeline-container">
                                <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                    <div class="list-progress">
                                        <div class="inner"></div>
                                    </div>

                                    <li>
                                        <h4 class="text-white mb-3">Temukan Keahlian dan Layanan</h4>

                                        <p class="text-white">
                                            Jelajahi beragam keahlian dan layanan yang ditawarkan oleh sesama mahasiswa. Gunakan fitur pencarian kami untuk menemukan topik favorit Anda, baik itu dukungan akademis, mentorship, keahlian teknis, atau layanan khusus lainnya.</p>

                                        <div class="icon-holder">
                                          <i class="bi-search"></i>
                                        </div>
                                    </li>
                                    
                                    <li>
                                        <h4 class="text-white mb-3">Terhubung dengan Rekan-Rekan Berbakat</h4>

                                        <p class="text-white">Terhubunglah dengan rekan-rekan berbakat yang sesuai dengan kebutuhan Anda. Telusuri profil, baca ulasan, dan temukan koneksi yang tepat untuk proyek atau tujuan belajar Anda. Platform ini memudahkan proses koneksi tanpa kendala.</p>

                                        <div class="icon-holder">
                                          <i class="bi-bookmark"></i>
                                        </div>
                                    </li>

                                    <li>
                                        <h4 class="text-white mb-3">Minta &amp; Tawarkan Bantuan </h4>

                                        <p class="text-white">Baik Anda mencari bantuan atau menawarkan keahlian Anda, Talent Network menyediakan proses yang mudah. Mintalah layanan khusus atau tawarkan keahlian Anda kepada sesama mahasiswa. Platform ini dirancang untuk memfasilitasi kolaborasi dan dukungan di antara komunitas mahasiswa.</p>

                                        <div class="icon-holder">
                                          <i class="bi-book"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <section class="faq-section section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <h2 class="mb-4">Frequently Asked Questions</h2>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-lg-5 col-12">
                            <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                        </div>

                        <div class="col-lg-6 col-12 m-auto">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Apa itu Talent Network?
                                        </button>
                                    </h2>

                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Talent Network adalah <strong>platform online yang memungkinkan mahasiswa berbagi dan memanfaatkan keahlian khusus mereka satu sama lain.</strong> 
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  keahlian apa yang dapat saya temukan?
                                    </button>
                                    </h2>

                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Anda dapat menemukan berbagai <strong>keahlian</strong>, mulai dari bantuan akademis, mentorship, hingga keahlian teknis dan kreatif lainnya.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Bagaimana cara memilih penyedia jasa atau keahlian ?
                                    </button>
                                    </h2>

                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Talent Network menyediakan sistem penilaian dan ulasan. Gunakan informasi ini untuk membantu Anda memilih penyedia jasa yang sesuai dengan kebutuhan Anda.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


@endsection