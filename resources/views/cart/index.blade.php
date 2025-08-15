@extends('layouts.app')
@section('content')

<div class="container py-5">
    <h2 class="mb-4" style="font-family: 'Marge', serif; font-size: 2.2rem; color: #334d3b;">
        🛒 Your Cart
    </h2>

    @if($items->isEmpty())
        <div class="alert alert-warning text-center shadow-sm rounded" style="font-size: 1.1rem;">
            Your cart is empty. <a href="{{ route('courses.index') }}" class="fw-bold" style="color: #647E65;">Browse Courses</a>
        </div>
    @else
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                @foreach ($items as $item)
                    <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                        
                        <!-- Course Info -->
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset($item->course->image ?? 'images/tarot.jpg') }}" 
                                 alt="{{ $item->course->name }}" 
                                 class="rounded shadow-sm" 
                                 style="width: 80px; height: 80px; object-fit: cover;">
                            <div>
                                <h5 class="mb-1" style="color: #334d3b;">{{ $item->course->name }}</h5>
                                <p class="mb-0 text-muted">₹{{ number_format($item->course->price) }}</p>
                            </div>
                        </div>

                        <!-- Remove Button -->
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="m-0">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm px-3">
                                <i class="bi bi-trash"></i> Remove
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Checkout Section -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                ← Continue Shopping
            </a>
            <a href="{{ route('checkout.index') }}" 
               class="btn px-5 py-2" 
               style="background-color: #647E65; color: white; border-radius: 30px; font-size: 1.1rem;">
                Proceed to Checkout →
            </a>
        </div>
    @endif
</div>

@endsection
