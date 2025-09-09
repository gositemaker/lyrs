@extends('dashboard.layout')

@section('dashboard-content')
<div class="container py-4">
    <h3 class="mb-4">My Orders</h3>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Courses</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            @if(count($order->course_names))
                                <ul class="mb-0">
                                    @foreach($order->course_names as $name)
                                        <li>{{ $name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">No Courses</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge 
                                @if($order->status == 'pending') bg-warning
                                @elseif($order->status == 'completed') bg-success
                                @else bg-secondary @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d M, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

