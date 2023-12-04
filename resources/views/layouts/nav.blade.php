<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi-back"></i>
            <span>TalentNetwork</span>
        </a>

        @auth
            <div class="d-lg-none ms-auto me-4">
                <a href="#top" class="navbar-icon bi-person smoothscroll" data-bs-toggle="dropdown" aria-expanded="false"></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('profil-customer.show') }}">Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        @endauth

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
                            <a class="nav-link {{ request()->routeIs('category.index.cus') ? 'active' : '' }}" href="{{ route('category.index.cus') }}">category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('order.history') ? 'active' : '' }}" href="{{ route('order.history') }}">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('chatify.room') ? 'active' : '' }}" href="{{ route('chatify.room', ['userId' => 1]) }}">Chat</a>
                        </li>
                    @elseif (Auth::user()->role === 'service_provider')
                        <!-- Menu untuk penyedia jasa -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}" href="{{ route('category.index') }}">My Services</a>
                        </li>
                        <!-- Tambahkan menu penyedia jasa lainnya sesuai kebutuhan -->
                    @endif
                @else
                    <!-- Menu untuk pengunjung yang belum login -->
                    <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Browse Topics</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">How it works</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">FAQs</a>
                            </li>
                    <li class="nav-item">
                    <a class="nav-link @if(Request::is('login')) active @endif" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endauth
            </ul>

            @auth
            <li class="nav-item dropdown">
                <a  class="navbar-icon bi-person smoothscroll {{ request()->routeIs(['profile', 'show.provider.form']) ? 'active' : '' }}" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">{{ __('My Profile') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('show.provider.form') }}">{{ __('Become a Service Provider') }}</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                    </ul>
            </li>
            @endauth
        </div>
    </div>
</nav>
