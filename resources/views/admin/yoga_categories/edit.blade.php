@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Yoga Category</h2>
    <form method="POST" action="{{ route('admin.yoga_categories.update', $yoga_category) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ $yoga_category->name }}" required>
        </div>

        <div class="form-group">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="session" {{ $yoga_category->type == 'session' ? 'selected' : '' }}>Session</option>
                <option value="course" {{ $yoga_category->type == 'course' ? 'selected' : '' }}>Course</option>
            </select>
        </div>

        <div class="form-group">
            <label>Image (optional)</label><br>
            @if($yoga_category->image)
                <img src="{{ asset('storage/'.$yoga_category->image) }}" width="80"><br>
            @endif
            <input type="file" name="image" class="form-control-file mt-2">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
