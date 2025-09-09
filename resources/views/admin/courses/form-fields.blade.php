<div class="col-md-6">
    <label class="form-label">Course Name</label>
    <input type="text" name="name" class="form-control" 
           value="{{ old('name', $course->name ?? '') }}" required>
</div>

<div class="col-md-6">
    <label class="form-label">Trainer</label>
    <input type="text" name="trainer" class="form-control" 
           value="{{ old('trainer', $course->trainer ?? '') }}" required>
</div>

<div class="col-md-6">
    <label class="form-label">Level</label>
    <input type="text" name="level" class="form-control" 
           value="{{ old('level', $course->level ?? '') }}" required>
</div>

<div class="col-md-6">
    <label class="form-label">Type</label>
    <input type="text" name="type" class="form-control" 
           value="{{ old('type', $course->type ?? '') }}" required>
</div>

<div class="col-md-12">
    <label class="form-label">Description</label>
    <textarea name="description" rows="3" class="form-control">{{ old('description', $course->description ?? '') }}</textarea>
</div>

<div class="col-md-6">
    <label class="form-label">Duration</label>
    <input type="text" name="duration" class="form-control" 
           value="{{ old('duration', $course->duration ?? '') }}" required>
</div>

<div class="col-md-6">
    <label class="form-label">Price (₹)</label>
    <input type="number" name="price" class="form-control" 
           value="{{ old('price', $course->price ?? '') }}" required>
</div>

<div class="col-md-6">
    <label class="form-label">Certification</label>
    <input type="text" name="certification" class="form-control" 
           value="{{ old('certification', $course->certification ?? '') }}" required>
</div>

<div class="col-md-6">
    <label class="form-label">Status</label>
    <select name="status" class="form-select" required>
        <option value="1" {{ old('status', $course->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
        <option value="2" {{ old('status', $course->status ?? '') == '2' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>

<div class="col-md-12">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">

    @if(!empty($course->image))
        <div class="mt-2">
            <img src="{{ asset('storage/'.$course->image) }}" 
                 alt="Course Image" width="120" class="rounded border">
        </div>
    @endif
</div>
