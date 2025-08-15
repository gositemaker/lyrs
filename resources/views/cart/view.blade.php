@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Your Cart</h2>

    @if($cartItems->isEmpty())
        <p>No courses in your cart.</p>
    @else
        <ul class="list-group mb-4">
            @foreach($cartItems as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $item->course->name }}</strong><br>
                        <small>₹{{ number_format($item->course->price) }}</small>
                    </div>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <!-- <form action="{{ route('checkout') }}" method="GET">
            <button class="btn btn-success">Proceed to Checkout</button>
        </form> -->
        <a href="{{ route('checkout') }}" class="btn btn-success mt-3">Proceed to Checkout</a>

    @endif
</div>
@endsection
