@extends('dashboard.layout')

@section('dashboard-content')
    <h2>Profile Settings</h2>
    <form method="POST" action="{{ route('dashboard.profile.update') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="{{ $user->email }}">
        </div>
        <button class="btn btn-primary">Update Profile</button>
    </form>

    <form method="POST" action="{{ route('dashboard.profile.delete') }}" class="mt-3">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete Account</button>
    </form>
@endsection
