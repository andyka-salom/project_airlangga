<div class="container-fluid bg-primary">
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg py-0">
            <a href="/" class="navbar-brand">
                <h2 class="text-dark fw-bold d-block">Airlangga<span class="text-secondary">Talent Network</span> </h2>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                <div class="navbar-nav ms-auto mx-xl-auto p-0">
                    <a href="/home" class="nav-item nav-link @if(Request::is('home')) active @endif ">Home</a>
                    <a href="/categories" class="nav-item nav-link @if(Request::is('categories')) active @endif">Kategori</a>
                    <a href="#" class="nav-item nav-link @if(Request::is('chat')) active @endif">Chat</a>
                    <a href="#" class="nav-item nav-link @if(Request::is('pemesanan')) active @endif">Pemesanan</a>
                    

                    @guest
                        <a class="nav-link @if(Request::is('login')) active @endif" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="nav-link @if(Request::is('register')) active @endif" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                                    
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Profile') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </div>
            </div>
        </nav>
    </div>
</div>
