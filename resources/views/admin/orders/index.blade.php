@extends('layouts.admin')

@section('content')
<h2>All Orders</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>User</th>
            <th>Payment ID</th>
            <th>Amount</th>
            <th>Courses</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->payment_id }}</td>
            <td>₹{{ number_format($order->amount, 2) }}</td>
            <td>{{ $order->courses }}</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
