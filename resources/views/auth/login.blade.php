<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/templatemo-topic-listing.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/lib/wow/wow.min.js"></script>
        <script src="/lib/easing/easing.min.js"></script>
        <script src="/lib/waypoints/waypoints.min.js"></script>
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
            
                    <!-- Menu untuk pengunjung yang belum login -->
                    <li class="nav-item">
                                <a class="nav-link click-scroll" href="{{ route('home') }}">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="{{ route('home') }}">Category</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="{{ route('home') }}">How it works</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="{{ route('home') }}">FAQs</a>
                            </li>
                    <li class="nav-item">
                    <a class="nav-link @if(Request::is('login')) active @endif" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>
<div class ="containerutama">
<div class ="utama">
<div class="containerlogin" id="containerlogin">
  <div class="form-containerlogin sign-up-containerlogin">
  <form method="POST" action="{{ route('register') }}">
@csrf
      <h1>Create Account</h1>
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama">
      @error('name')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
      @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm-password">
      <button type="submit" class="btn btn-primary">
  {{ __('Register') }}
  </button>
    </form>
  </div>

<div class ="containerutama">
  <div class="form-containerlogin sign-in-containerlogin">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <h1>Sign in</h1>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
      @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
      
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
      @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
      
      @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
      @endif
      <button type="submit" class="btn btn-primary">
          {{ __('Login') }}
      </button>
    </form>
  </div>
  <div class="overlay-containerlogin">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us please login with your personal info</p>
        <button class="btn btn-primary" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start journey with us</p>
        <button class="btn btn-primary" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

@include('layouts.footer')

<script src="{{ asset('js/register.js') }}"></script>