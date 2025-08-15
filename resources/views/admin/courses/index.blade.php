@extends('layouts.admin')

@section('content')
<h2>Course Management</h2>
<p class="text-muted">Create and manage courses, memberships and content</p>

<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#createCourseModal">
        + Create Course
    </button>
</div>

<div class="card">
    <div class="card-body">
        <h5>Existing Courses</h5>
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Level</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Trainer</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td><span class="badge bg-secondary">{{ $course->level }}</span></td>
                    <td>{{ $course->type }}</td>
                    <td>₹{{ number_format($course->price) }}</td>
                    <td>{{ $course->trainer }}</td>
                    <td>
                        <span class="badge bg-dark">
                            {{ $course->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editCourseModal{{ $course->id }}">
                            ✏️
                        </button>
                        <!-- Delete -->
                        <form action="{{ url('admin/courses/'.$course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this course?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm text-danger">🗑️</button>
                        </form>

                        @include('admin.courses.edit-modal', ['course' => $course])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.courses.create-modal')

@endsection
