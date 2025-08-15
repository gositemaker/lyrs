@php
    $editing = isset($course);
@endphp

<div class="col-md-6">
    <label>Course Name</label>
    <input type="text" name="name" value="{{ $editing ? $course->name : '' }}" class="form-control" required>
</div>
<div class="col-md-6">
    <label>Duration</label>
    <input type="text" name="duration" value="{{ $editing ? $course->duration : '' }}" class="form-control" required>
</div>
<div class="col-md-6">
    <label>Level</label>
    <select name="level" class="form-select">
        @foreach (['Beginner', 'Intermediate', 'Advanced'] as $level)
            <option value="{{ $level }}" {{ ($editing && $course->level == $level) ? 'selected' : '' }}>{{ $level }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6">
    <label>Type</label>
    <input type="text" name="type" value="{{ $editing ? $course->type : '' }}" class="form-control">
</div>
<div class="col-md-6">
    <label>Price (₹)</label>
    <input type="number" name="price" value="{{ $editing ? $course->price : '0' }}" class="form-control">
</div>
<div class="col-md-6">
    <label>Trainer</label>
    <input type="text" name="trainer" value="{{ $editing ? $course->trainer : '' }}" class="form-control">
</div>
<div class="col-md-6">
    <label>Certification</label>
    <select name="certification" class="form-select">
        <option value="0" {{ $editing && !$course->certification ? 'selected' : '' }}>No</option>
        <option value="1" {{ $editing && $course->certification ? 'selected' : '' }}>Yes</option>
    </select>
</div>
<div class="col-md-6">
    <label>Status</label>
    <select name="status" class="form-select">
        <option value="1" {{ $editing && $course->status ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $editing && !$course->status ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
<div class="col-12">
    <label>Description</label>
    <textarea name="description" rows="3" class="form-control">{{ $editing ? $course->description : '' }}</textarea>
</div>
