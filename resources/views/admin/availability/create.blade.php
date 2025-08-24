@extends('layouts.admin')

@section('title', 'Add Availability')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Add Trainer Availability</h3>

    <form action="{{ route('availability.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="trainer_id" class="form-label">Trainer</label>
            <select name="trainer_id" id="trainer_id" class="form-select" required>
                <option value="">-- Select Trainer --</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" name="start_time" id="start_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" name="end_time" id="end_time" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('availability.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Availability</button>
        </div>
    </form>
</div>
@endsection
