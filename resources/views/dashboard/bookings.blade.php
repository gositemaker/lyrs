@extends('dashboard.layout')

@section('dashboard-content')
    <h2 class="mb-4">My Bookings</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Session Name</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{$booking->yogaSession->name ?? 'N/A'}} </td>
                    <td><span class="badge bg-success">{{ $booking->status }}</span></td>
                    <td>{{ $booking->date->format('d M Y') }} -- {{ $booking->start_time->format('H:i') }}</td>
                </tr>
            @empty
                <tr><td colspan="4">No bookings found</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
