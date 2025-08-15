@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>Slots for Session: {{ $session->name }}</h3>
    <a href="{{ route('admin.time_slots.create', $session->id) }}" class="btn btn-primary mb-3">Add Slot</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Trainer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slots as $slot)
            <tr>
                <td>{{ $slot->date }}</td>
                <td>{{ $slot->start_time }} - {{ $slot->end_time }}</td>
                <td>{{ $slot->trainer->name }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.time_slots.destroy', [$session->id, $slot->id]) }}">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this slot?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
