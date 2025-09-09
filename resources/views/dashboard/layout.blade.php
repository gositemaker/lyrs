@extends('layouts.app') {{-- keep website main header --}}

@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- Sidebar (desktop) --}}
        <nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard.profile') ? 'active' : '' }}" href="{{ route('dashboard.profile') }}">
                            <i class="bi bi-person"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard.orders') ? 'active' : '' }}" href="{{ route('dashboard.orders') }}">
                            <i class="bi bi-bag-check"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard.bookings') ? 'active' : '' }}" href="{{ route('dashboard.bookings') }}">
                            <i class="bi bi-calendar-check"></i> Bookings
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        {{-- Main Content --}}
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="pt-3">
                @yield('dashboard-content')
            </div>
        </main>
    </div>
</div>
@endsection
