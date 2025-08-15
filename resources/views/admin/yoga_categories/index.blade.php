@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Yoga Categories</h2>
    <a href="{{ route('admin.yoga_categories.create') }}" class="btn btn-success mb-3">Add Category</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ ucfirst($category->type) }}</td>
                <td>
                    @if($category->image)
                        <img src="{{ asset('storage/'.$category->image) }}" width="60">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.yoga_categories.edit', $category) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.yoga_categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
