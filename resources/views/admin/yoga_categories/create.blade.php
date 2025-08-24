@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Create Yoga Category</h2>
    <form method="POST" action="{{ route('admin.yoga_categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="">Select type</option>
                <option value="session">Session</option>
                <option value="course">Course</option>
            </select>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control-file">
        </div> 

        <button class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
