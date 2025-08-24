@extends('layouts.admin')

@section('title', 'Edit Yoga Session')

@section('content')
<div class="container py-4">
    <h3>Edit Yoga Session</h3>
    <form action="{{ route('admin.yoga_sessions.update', $session->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Session Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name',$session->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->name }}" {{ $session->category == $categorie->name ? 'selected':'' }}>
                    {{ $categorie->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description',$session->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Duration (minutes)</label>
            <input type="number" name="duration" class="form-control" value="{{ old('duration',$session->duration) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price (INR)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price',$session->price) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trainer</label>
            <select name="trainer_id" class="form-select" required>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}" {{ $session->trainer_id == $trainer->id ? 'selected':'' }}>
                        {{ $trainer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="Available" {{ $session->status == 'Available' ? 'selected':'' }}>Available</option>
                <option value="Booked" {{ $session->status == 'Booked' ? 'selected':'' }}>Booked</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label><br>
            @if($session->image)
                <img src="{{ asset('storage/'.$session->image) }}" width="80" class="mb-2"><br>
            @endif
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.yoga_sessions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
