@extends('layouts.admin')

@section('title', 'Add Yoga Session')

@section('content')
<div class="container py-4">
    <h3>Add New Yoga Session</h3>
    <form action="{{ route('admin.yoga_sessions.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Session Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                @endforeach
            </select>
           
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Duration (minutes)</label>
            <input type="number" name="duration" class="form-control" value="{{ old('duration') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price (INR)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trainer</label>
            <select name="trainer_id" class="form-select" required>
                <option value="">-- Select Trainer --</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="Available">Available</option>
                <option value="Booked">Booked</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.yoga_sessions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
