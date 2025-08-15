<!-- Edit Modal -->
<div class="modal fade" id="editCourseModal{{ $course->id }}" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('admin/courses/'.$course->id) }}" class="modal-content">
      @csrf @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title">Edit Course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body row g-3">
        @include('admin.courses.form-fields', ['course' => $course])
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-dark">Update Course</button>
      </div>
    </form>
  </div>
</div>
