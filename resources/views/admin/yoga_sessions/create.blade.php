@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Create Timeslot</h2>

    <form action="{{ route('admin.yoga_sessions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Session Name</label>
            <input type="text" name="name" class="form-control" required placeholder="e.g. Chakra Healing">
        </div>

        <div class="mb-3">
            <label for="trainer_id" class="form-label">Trainer</label>
            <select name="trainer_id" class="form-select" required>
                <option value="">Select Trainer</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (minutes)</label>
            <input type="text" name="duration" class="form-control" required placeholder="e.g. 60">
        </div>

        <div class="mb-3">
            <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Session Description</label>
            <textarea name="description" rows="3" class="form-control" placeholder="e.g. Morning energy session"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (₹)</label>
            <input type="number" name="price" class="form-control" placeholder="e.g. 500">
        </div>

        <button type="submit" class="btn btn-success">Save Timeslot</button>
        <a href="{{ route('admin.yoga_sessions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
