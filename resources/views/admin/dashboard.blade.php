@extends('layouts.admin')

@section('content')
<h2>Energy Work by Annesha - Admin Dashboard</h2>
<p class="text-muted">Manage your spiritual wellness platform with conscious intention</p>

<div class="row g-4 mt-3">
    @php
        $cards = [
            ['title' => 'Total Users', 'value' => '1,247', 'change' => '+12%', 'icon' => 'bi-people'],
            ['title' => 'Active Sessions', 'value' => '89', 'change' => '+5%', 'icon' => 'bi-calendar'],
            ['title' => 'Course Enrollments', 'value' => '456', 'change' => '+18%', 'icon' => 'bi-journal-bookmark'],
            ['title' => 'Testimonials', 'value' => '234', 'change' => '+8%', 'icon' => 'bi-star'],
            ['title' => 'Revenue This Month', 'value' => '₹2,34,500', 'change' => '+22%', 'icon' => 'bi-graph-up'],
            ['title' => 'Available Timeslots', 'value' => '156', 'change' => '+3%', 'icon' => 'bi-clock'],
        ];
    @endphp

    @foreach ($cards as $card)
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="card-title text-muted">{{ $card['title'] }}</h6>
                <h3>{{ $card['value'] }}</h3>
                <small class="text-success">{{ $card['change'] }} from last month</small>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row mt-5">
    <div class="col-md-6">
        <h5>Recent Activity</h5>
        <ul class="list-group">
            <li class="list-group-item bg-warning-subtle">📅 New session booked - Sarah M. (Chakra Healing)</li>
            <li class="list-group-item bg-success-subtle">📘 New course enrollment - Elemental Healing Basics</li>
            <li class="list-group-item bg-info-subtle">🌟 New testimonial received - “Life changing experience”</li>
        </ul>
    </div>
    <div class="col-md-6">
        <h5>Quick Actions</h5>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Create New Timeslot</a>
            <a href="#" class="list-group-item list-group-item-action">Add Mounam Insight</a>
            <a href="#" class="list-group-item list-group-item-action">Create Course</a>
        </div>
    </div>
</div>
@endsection
