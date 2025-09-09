<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LYSR')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    {{-- Custom CSS --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".read-more-toggle").forEach(function(btn) {
                btn.addEventListener("click", function() {
                    let content = this.previousElementSibling;
                    if (content.classList.contains("d-none")) {
                        content.classList.remove("d-none");
                        this.textContent = "Read Less";
                    } else {
                        content.classList.add("d-none");
                        this.textContent = "Read More";
                    }
                });
            });
        });
    </script>
    <style>
        .home-inter{
            font-family:'Inter';
        }
    </style>

</head>

{{-- Toast Container --}}
{{-- Toast Container --}}
<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100">

        {{-- Success Toast --}}
        @if(session('success'))
            <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" 
                            data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif

        {{-- Info Toast --}}
        @if(session('info'))
            <div class="toast align-items-center text-bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('info') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" 
                            data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif

        {{-- Warning Toast --}}
        @if(session('warning'))
            <div class="toast align-items-center text-bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('warning') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" 
                            data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif

        {{-- ❌ Validation Errors Toast --}}
        @if ($errors->any())
            <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <strong>Validation Error:</strong>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" 
                            data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif

    </div>
</div>

<body>

{{-- Navbar --}}
<nav class="navbar navbar-light bg-light shadow-sm sticky-top">
    <div class="container d-flex justify-content-between align-items-center">
        
        {{-- Brand --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <span class="fs-3" style="font-family:'Marge',serif; font-size:52px;">A.</span>
        </a>

        {{-- Right Side --}}
        <div class="d-flex align-items-center">

            {{-- Mobile Only: Cart + Hamburger --}}
            <div class="d-flex align-items-center d-lg-none">
                {{-- Cart --}}
                <a class="nav-link position-relative me-2" href="{{ route('cart.index') }}">
                    <i class="bi bi-cart fs-4"></i>
                    @if(session('cart_count', $cartCount ?? 0) > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ session('cart_count', $cartCount ?? 0) }}
                        </span>
                    @endif
                </a>

                {{-- Hamburger --}}
                <button class="btn border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    <i class="bi bi-list fs-2"></i>
                </button>
            </div>

            {{-- Desktop Nav --}}
            <div class="d-none d-lg-flex align-items-center">
                <ul class="navbar-nav d-flex flex-row gap-3 home-inter">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/courses') }}">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/book-session') }}">Book Session</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                </ul>

                {{-- Cart (Desktop Only) --}}
                <a class="nav-link position-relative ms-3" href="{{ route('cart.index') }}">
                    <i class="bi bi-cart fs-4"></i>
                    @if(session('cart_count', $cartCount ?? 0) > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ session('cart_count', $cartCount ?? 0) }}
                        </span>
                    @endif
                </a>

                {{-- Auth --}}
                <div class="ms-3 home-inter">
                    @auth
                        <div class="dropdown">
                            <a href="#" class="btn btn-outline-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('dashboard.profile') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('dashboard.orders') }}">Orders</a></li>
                                <li><a class="dropdown-item" href="{{ route('dashboard.bookings') }}">Bookings</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <button class="btn btn-dark px-4" data-bs-toggle="modal" data-bs-target="#authModal">
                            Sign Up
                        </button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>



{{-- Offcanvas Menu for Mobile --}}
<div class="offcanvas offcanvas-end home-inter" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <ul class="navbar-nav flex-grow-1">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/courses') }}">Courses</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/book-session') }}">Book Session</a></li>
            <!--<li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>-->
            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
        </ul>

        {{-- Auth Section at Bottom --}}
        <div class="mt-auto border-top pt-3">
            @auth
                <p class="fw-semibold mb-1">Hello, {{ Auth::user()->name }}</p>
                <a href="{{ route('cart.index') }}" class="d-block mb-2">🛒 View Cart</a>
                <a href="{{ route('dashboard') }}" class="d-block mb-2">Dashboard</a>
                <a href="{{ route('dashboard.profile') }}" class="d-block mb-2">Profile</a>
                <a href="{{ route('dashboard.orders') }}" class="d-block mb-2">Orders</a>
                <a href="{{ route('dashboard.bookings') }}" class="d-block mb-2">Bookings</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark w-100">Logout</button>
                </form>
            @else
                <button class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#authModal">
                    Sign Up
                </button>
            @endauth
        </div>
    </div>
</div>


<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="authModalLabel">Welcome</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="authTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Register</button>
                    </li>
                </ul>

                <div class="tab-content pt-3" id="authTabsContent">
                    <!-- Login Tab -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </form>
                    </div>

                    <!-- Register Tab -->
                    <div class="tab-pane fade" id="register" role="tabpanel">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label>Country Code</label>
                            <select name="country_code" class="form-select" required>
                                @php
                                    $countryCodes = [
                                        '+1' => 'USA/Canada',
                                        '+44' => 'UK',
                                        '+61' => 'Australia',
                                        '+91' => 'India',
                                        '+81' => 'Japan',
                                        '+49' => 'Germany',
                                        '+33' => 'France',
                                        '+86' => 'China',
                                        '+971' => 'UAE',
                                        '+92' => 'Pakistan',
                                        '+880' => 'Bangladesh',
                                        '+94' => 'Sri Lanka',
                                        '+977' => 'Nepal',
                                        '+7' => 'Russia',
                                        '+39' => 'Italy',
                                        '+34' => 'Spain',
                                        '+55' => 'Brazil',
                                        '+27' => 'South Africa',
                                        '+82' => 'South Korea',
                                    ];
                                @endphp

                                @foreach($countryCodes as $code => $country)
                                    <option value="{{ $code }}" {{ $code == '+91' ? 'selected' : '' }}>
                                        {{ $country }} ({{ $code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Create Account</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
<footer class="footer-section text-white pt-5 pb-3" style="background: url('{{ asset('images/Home/footer-bg.png') }}') center/cover no-repeat;">
    {{-- Background Image with Overlay --}}
   
    <div class="container">
        <div class="row align-items-start">
            
            {{-- Left Branding --}}
            <div class="col-md-5 mb-5">
                <h3 class=" mb-2" style="font-size: 32px;font-family:'Marge',serif; font-weight: 400;letter-spacing:3px;">
                    <span style="font-size: 52px;font-family:'Marge',serif; font-weight: 400;">A.</span> Energy Works By Annesha
                </h3>
                <p class="fw-light fst-italic">
                    Conscious Living Through Ancient Wisdom <br>
                    And Modern Healing.
                </p>

                {{-- Social Icons --}}
                <div class="mt-3">
                    <p class="mb-2 ">Connect With Us</p>
                    <a href="#" class="text-white me-3"><i class="bi bi-linkedin fs-4"></i></a>
                    <a href="https://www.instagram.com/energyworkbyannesha/?hl=en" class="text-white me-3"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100080475519882" class="text-white me-3"><i class="bi bi-facebook fs-4"></i></a>
                </div>
            </div>

            {{-- Explore Links --}}
            <div class="col-md-2 mb-4">
             
                <ul class="list-unstyled">
                    <li><a href="/book-session" class="text-white text-decoration-none d-block mb-2">Book Sessions</a></li>
                    <li><a href="/courses" class="text-white text-decoration-none d-block mb-2">Courses</a></li>
          
                    
                </ul>
            </div>

            {{-- Learn Links --}}
            <div class="col-md-2 mb-4">
                
                <ul class="list-unstyled">
                    <li><a href="/courses/Annesha%20Bera" class="text-white text-decoration-none d-block mb-2">Courses By Annesha</a></li>
                    <li><a href="/courses/Mahesh%20Sir" class="text-white text-decoration-none d-block mb-2">Courses By  Mahesh</a></li>
                    <li><a href="/about" class="text-white text-decoration-none d-block mb-2">About</a></li>
                </ul>
            </div>

            {{-- Connect Links --}}
            <div class="col-md-2 mb-4">
     
                <ul class="list-unstyled">
                    
                    <li><a href="/contact" class="text-white text-decoration-none d-block mb-2">Contact Us</a></li>
                    <li><a href="#" class="text-white text-decoration-none d-block mb-2">Blog</a></li>
                </ul>
            </div>
        </div>

        {{-- Bottom Copyright --}}
        <div class="text-center mt-4 pt-3 border-top border-secondary">
            <p class="small mb-1 ">
                © 2025 energy work by annesha. all rights reserved. • silence. alchemy. conscious living.
            </p>
        </div>
    </div>
</footer>


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'))
            toastElList.map(function (toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 5000 }) // auto close in 5s
                toast.show()
            })
        });
    </script>



</body>
</html>
