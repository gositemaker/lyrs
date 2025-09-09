
@extends('dashboard.layout')

@section('dashboard-content')
    <h2>Welcome, {{ Auth::user()->name }} 👋</h2>
    <p>This is your customer dashboard. Use the sidebar to manage your profile, orders, and bookings.</p>
@endsection

