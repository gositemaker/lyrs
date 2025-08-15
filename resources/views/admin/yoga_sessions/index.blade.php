@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Timeslot Management</h2>
            <p class="text-muted">Create and manage healing session availability</p>
        </div>
        <a href="{{ route('admin.yoga_sessions.create') }}" class="btn btn-warning text-white">
            <i class="bi bi-plus-circle"></i> Create Timeslot
        </a>
    </div>

    @foreach($sessions as $session)
    <div class="card shadow-sm mb-4">
        <div class="card-body d-md-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div class="me-3 text-center bg-warning bg-opacity-25 p-3 rounded">
                    <i class="bi bi-calendar-event fs-4 text-warning"></i><br>
                    <strong>{{ \Carbon\Carbon::parse($session->created_at)->format('d/m/Y') }}</strong>
                </div>
                <div>
                    <h5 class="mb-1">
                        <strong style="margin-right:5px">{{ $session->name }}</strong>
                        <i class="bi bi-clock me-1"></i>
                        ({{ $session->duration }} min)
                    </h5>
                    <div class="text-muted">
                        <i class="bi bi-person"></i> {{ $session->trainer->name }}
                    </div>
                    <div class="text-muted small mb-1">
                        {{ $session->description }}
                    </div>
                    <div class="text-muted small">
                        <i class="bi bi-collection"></i> Total Slots: {{ optional($session->timeSlots)->count() }}

                    </div>
                </div>
            </div>

            <div class="text-end">
                @if($session->is_booked)
                    <span class="badge bg-warning text-dark mb-2">Booked</span>
                @else
                    <span class="badge bg-success mb-2">Available</span>
                @endif

                <div class="btn-group mb-2" role="group">
                    <a href="{{ route('admin.yoga_sessions.show', $session->id) }}" class="btn btn-outline-primary">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('admin.yoga_sessions.edit', $session->id) }}" class="btn btn-outline-secondary">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.yoga_sessions.destroy', $session->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>

                <a href="{{ route('admin.time_slots.index', $session->id) }}" class="btn btn-sm btn-warning mt-1 text-white">
                    <i class="bi bi-clock-history"></i> Manage Slots
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
