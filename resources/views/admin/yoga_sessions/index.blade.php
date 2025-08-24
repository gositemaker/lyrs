@extends('layouts.admin')

@section('title', 'Yoga Sessions')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Yoga Sessions</h3>
        <a href="{{ route('admin.yoga_sessions.create') }}" class="btn btn-primary">+ Add New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Session Name</th>
                <th>Category</th>
                <th>Trainer</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Status</th>
                <th>Image</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sessions as $session)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $session->name }}</td>
                    <td>{{ $session->category }}</td>
                    <td>{{ $session->trainer->name ?? 'N/A' }}</td>
                    <td>{{ $session->duration }} mins</td>
                    <td>₹{{ $session->price }}</td>
                    <td><span class="badge bg-{{ $session->status == 'Available' ? 'success':'secondary' }}">{{ $session->status }}</span></td>
                    <td>
                        @if($session->image)
                            <img src="{{ asset('storage/'.$session->image) }}" width="60">
                        @else
                            <small>No Image</small>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.yoga_sessions.edit', $session->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.yoga_sessions.destroy', $session->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center">No sessions available</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
