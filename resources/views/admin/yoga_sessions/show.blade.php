@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-3">Yoga Session Details</h2>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h4 class="mb-2">{{ $session->name }}</h4>

            <p><strong>Description:</strong> {{ $session->description }}</p>
            <p><strong>Duration:</strong> {{ $session->duration }} min</p>
            <p><strong>Price:</strong> ₹{{ $session->price }}</p>

            <p><strong>Trainer:</strong> {{ $session->trainer->name ?? 'N/A' }}</p>
            <p><strong>Category:</strong> {{ $session->category->name ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $session->created_at->format('d M Y, h:i A') }}</p>
        </div>
    </div>

    <h5 class="mb-3">Available Time Slots</h5>
    @if($session->timeSlots && $session->timeSlots->count())
        <div class="list-group mb-4">
            @foreach($session->timeSlots as $slot)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Date:</strong> {{ \Carbon\Carbon::parse($slot->date)->format('d M Y') }}<br>
                        <strong>Time:</strong> {{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }}
                    </div>
                    <span class="badge {{ $slot->is_booked ? 'bg-danger' : 'bg-success' }}">
                        {{ $slot->is_booked ? 'Booked' : 'Available' }}
                    </span>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">No time slots added for this session yet.</p>
    @endif

    <a href="{{ route('admin.yoga_sessions.index') }}" class="btn btn-secondary">Back to Sessions</a>
</div>
@endsection
