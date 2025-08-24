{{-- resources/views/admin/availability/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Trainer Availability')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Trainer Availability</h3>

    {{-- Flash Toast Messages --}}
    @if(session('success'))
        <div class="toast align-items-center text-bg-success border-0 show mb-3" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="toast align-items-center text-bg-danger border-0 show mb-3" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    {{-- Availability Form --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.availability.store') }}" method="POST" id="availabilityForm">
                @csrf
                <input type="hidden" name="id" id="availability_id"> {{-- For edit mode --}}

                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Trainer</label>
                        <select name="trainer_id" id="trainer_id" class="form-select" required>
                            <option value="">Select Trainer</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Start Time</label>
                        <input type="time" name="start_time" id="start_time" class="form-control" required>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">End Time</label>
                        <input type="time" name="end_time" id="end_time" class="form-control" required>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100" id="saveBtn">Add Availability</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Availability List --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">All Availabilities</h5>

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Trainer</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($availabilities as $key => $a)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $a->trainer->name }}</td>
                            <td>{{ $a->date }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning editBtn"
                                    data-id="{{ $a->id }}"
                                    data-trainer="{{ $a->trainer_id }}"
                                    data-date="{{ $a->date }}"
                                    data-start="{{ $a->start_time }}"
                                    data-end="{{ $a->end_time }}">
                                    Edit
                                </button>
                                <form action="{{ route('admin.availability.destroy', $a->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this availability?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No availabilities found.</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $availabilities->links() }}
        </div>
    </div>
</div>

{{-- Inline Script --}}
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Fill form on Edit
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('availability_id').value = this.dataset.id;
            document.getElementById('trainer_id').value = this.dataset.trainer;
            document.getElementById('date').value = this.dataset.date;
            document.getElementById('start_time').value = this.dataset.start;
            document.getElementById('end_time').value = this.dataset.end;
            document.getElementById('saveBtn').innerText = 'Update Availability';

            document.getElementById('availabilityForm').action = "{{ route('admin.availability.store') }}";
        });
    });
});
</script>
@endsection
