<nav class="navbar navbar-expand-lg bg-light px-4 py-2" style="background-color: #fdfbef;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-2" href="{{ url('/') }}">
            A<span class="text-dark">.</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-3">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'fw-bold' : '' }}" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/shakti-kirtans">Shakti Transmission & Kirtans</a></li>
                <li class="nav-item"><a class="nav-link" href="/residency">Residency Programmes</a></li>
                <li class="nav-item"><a class="nav-link" href="/workshops">Workshops</a></li>
                <li class="nav-item"><a class="nav-link" href="/courses">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="/book-session">Book Session</a></li>
                <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
            </ul>

            <div class="d-flex">
                @guest
                    <a href="{{ route('register') }}" class="btn btn-dark rounded-pill px-4">Sign Up</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-dark rounded-pill px-4">Dashboard</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
