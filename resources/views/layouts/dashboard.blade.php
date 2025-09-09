<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 250px;
            background: #1f2937;
            color: #fff;
            padding-top: 20px;
        }
        .sidebar a {
            color: #d1d5db;
            display: block;
            padding: 12px 20px;
            margin: 5px 0;
            text-decoration: none;
            border-radius: 6px;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #374151;
            color: #fff;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="px-4 mb-4">
            <h4 class="text-white">My Dashboard</h4>
        </div>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
        <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">👤 Profile</a>
        <a href="{{ route('orders.index') }}" class="{{ request()->routeIs('orders.index') ? 'active' : '' }}">🛒 Orders</a>
        <a href="{{ route('bookings.index') }}" class="{{ request()->routeIs('bookings.index') ? 'active' : '' }}">📅 Bookings</a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            🚪 Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
