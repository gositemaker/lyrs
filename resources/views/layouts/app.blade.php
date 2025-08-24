<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'LYSR') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {}
        .navbar { background-color: #fffdf3; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
        .nav-link:hover { color: #2b4d3f !important; }
        .btn-rounded { border-radius: 30px; }
        .modal-backdrop.show { opacity: 0.85; }
.bg-green {
    background-color: #496b5f;
}
.bg-green-pic {
    background-image: url("/images/Lysr-bg.png");
    background-size: cover;       /* fills the area */
    background-position: center;  /* centers the image */
    background-repeat: no-repeat; /* no tiling */
}
.rounded-custom {
    border-top-left-radius: 100px;
    border-top-right-radius: 0;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    overflow: hidden;
}
.trainer-block {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    border-radius: 16px;
    background-size: cover; 
    background-position: center; 
    border-radius: 40px;
}
.btn-success{
    background-color: #8C5737;
    border-radius: 40px;
}
.btn-secondary{
    background-color: #647E65;
    border-radius: 40px;
}
.custom-couse-heading{
    font-family: 'Marge', serif;         /* Make sure the font is loaded */
    font-weight: 400;
    font-style: normal;                  /* 'Regular' = 'normal' */
    font-size: 52px;
    line-height: 58px;
    letter-spacing: 4%;                 /* Not valid — use in `em` or `px` */
    letter-spacing: 0.04em;             /* 4% of font-size */
    text-transform: capitalize;
}
.text-marge{
    font-family: "Marge", serif;
    font-weight: 400;
    font-style: normal;
    font-size: 72px;
    /* leading-trim is experimental, most browsers ignore it */
    line-height: 72px;
    letter-spacing: 3px;
    vertical-align: middle;
    text-transform: capitalize;
}
.trainer-image-wrapper {
    position: relative;
    display: inline-block;
    width: 260px;
    height: 260px;
    background: radial-gradient(
        circle at center,
        #647E6500 0%,
        #647E644D 30%,
        #fff 100% 
    );
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
}
.lead{
    font-family: 'Inter', sans-serif;
    font-weight: 200; /* Light */
    font-style: normal; /* 'Light' is handled via font-weight */
    font-size: 28px;
    line-height: 34px;
    letter-spacing: 0; /* px not needed */
    text-align: center;
    vertical-align: middle;
    margin:auto;
}

.trainer-image-wrapper img.trainer-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.video-container {
    position: relative;
    height: 100vh;
    width: 100%;
    overflow: hidden;
}

.video-container::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90.06deg, 
        #060606 -15.7%, 
        rgba(6, 6, 6, 0.4) 49.51%, 
        #060606 120.75%
    );
    pointer-events: none; /* ensures clicks pass through */
}

    </style>
</head>
<body>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('info'))
    <div class="alert alert-info">{{ session('info') }}</div>
@endif
@if(session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
@endif

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">A<span class="text-dark">.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-3">
                <li class="nav-item"><a class="nav-link fw-semibold" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Shakti Transmission</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Residency Programmes</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Workshops</a></li>
                <li class="nav-item"><a class="nav-link" href="/courses">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="/book-session">Book Session</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">
                                                🛒 
                                </a></li>
                
            </ul>

            <div class="d-flex align-items-center gap-2">
                @auth
                    <div class="dropdown">
                        <a href="#" class="btn btn-outline-dark dropdown-toggle btn-sm" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="{{ route('cart.index') }}" class="dropdown-item">
                                                🛒 View Cart
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <button class="btn btn-dark btn-rounded px-4" data-bs-toggle="modal" data-bs-target="#authModal">Sign Up</button>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Auth Modal -->
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

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
