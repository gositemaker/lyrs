@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>Create Slot for Session: {{ $session->name }}</h3>
    <form method="POST" action="{{ route('admin.time_slots.store', $session->id) }}">
        @csrf
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Start Time</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>End Time</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Trainer</label>
            <select name="trainer_id" class="form-control" required>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Save Slot</button>
    </form>
</div>
@endsection
