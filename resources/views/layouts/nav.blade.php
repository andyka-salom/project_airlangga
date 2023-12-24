<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi-back"></i>
            <span>TalentNetwork</span>
        </a>

       

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                @auth
                    @if (Auth::user()->role === 'customer')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('category.index.cus') ? 'active' : '' }}" href="{{ route('category.index.cus') }}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('order.history') ? 'active' : '' }}" href="{{ route('order.history') }}">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('chatify.room') ? 'active' : '' }}" href="{{ url('/chatify')}}">Chat</a>
                        </li>
                    @elseif (Auth::user()->role === 'service_provider')
                        <!-- Menu untuk penyedia jasa -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('category.index.cus') ? 'active' : '' }}" href="{{ route('category.index.cus') }}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('order.history') ? 'active' : '' }}" href="{{ route('order.history') }}">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('chatify.room') ? 'active' : '' }}" href="{{ url('/chatify')}}">Chat</a>
                        </li>


                        <!-- Tambahkan menu penyedia jasa lainnya sesuai kebutuhan -->
                    @elseif (Auth::user()->role === 'admin')
                    <!-- Menu untuk admin -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('Admincategory') ? 'active' : '' }}" href="{{ route('Admincategory') }}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('Adminjasa') ? 'active' : '' }}" href="{{ route('Adminjasa') }}">Jasa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.daftarpenyedia') ? 'active' : '' }}" href="{{ route('admin.daftarpenyedia') }}">Penyedia Jasa</a>
                    </li>
                    

                    @endif
                @else
                    <!-- Menu untuk pengunjung yang belum login -->
                    <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Category</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">How it works</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">FAQs</a>
                            </li>
                            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                                <li class="nav-item">
                                    <a class="nav-link @if(Request::is('login')) active @endif" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            </ul>
                @endauth
            </ul>
            
            @auth
                <ul class="navbar-nav ms-lg-2 me-lg-auto">
                    <li class="nav-item dropdown">
                        <a class="navbar-icon bi-person smoothscroll {{ request()->routeIs(['profile', 'show.provider.form']) ? 'active' : '' }}" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('profil.index') }}">{{ __('My Profile') }}</a></li>
                            @if (Auth::user()->role === 'service_provider')
                                <li><a class="dropdown-item" href="{{ route('show.provider.form') }}">Become a Service Provider</a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.index') }}">Pesanan Masuk</a></li>

                            @elseif (Auth::user()->role === 'admin')
                            <li><a class="dropdown-item" href="{{ route('admin.daftarpendaftar') }}">{{ __('Req Penyedia Jasa') }}</a></li>

                            @elseif (Auth::user()->role === 'customer')
                                <li><a class="dropdown-item" href="{{ route('show.provider.form') }}">Become a Service Provider</a></li>
                            @endif
                            
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
