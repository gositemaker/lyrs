@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Edit Timeslot</h2>

    <form action="{{ route('admin.yoga_sessions.update', $session->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Session Name</label>
            <input type="text" name="name" class="form-control" value="{{ $session->name }}" required>
        </div>

        <div class="mb-3">
            <label for="trainer_id" class="form-label">Trainer</label>
            <select name="trainer_id" class="form-select" required>
                <option value="">Select Trainer</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}" {{ $session->trainer_id == $trainer->id ? 'selected' : '' }}>
                        {{ $trainer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $session->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (minutes)</label>
            <input type="text" name="duration" class="form-control" value="{{ $session->duration }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Session Description</label>
            <textarea name="description" rows="3" class="form-control">{{ $session->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (₹)</label>
            <input type="number" name="price" class="form-control" value="{{ $session->price }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Timeslot</button>
        <a href="{{ route('admin.yoga_sessions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
