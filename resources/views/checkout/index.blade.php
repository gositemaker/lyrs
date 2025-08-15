

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Checkout Header -->
            <div class="mb-4 text-center">
                <h2 class="fw-bold" style="color:#647E64;">Checkout</h2>
                <p class="text-muted">Review your order and complete the payment.</p>
            </div>

            <!-- Order Summary Card -->
            <div class="card shadow-sm rounded-4 border-0 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Order Summary</h5>

                    <ul class="list-group list-group-flush">
                        @foreach($items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-0">
                                <div>
                                    <strong>{{ $item->course->name }}</strong>
                                </div>
                                <span class="fw-semibold">₹{{ number_format($item->course->price, 2) }}</span>
                            </li>
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-top mt-3">
                            <strong>Total</strong>
                            <span class="fw-bold fs-5" style="color:#647E64;">₹{{ number_format($total, 2) }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Payment Options -->
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Payment Method</h5>
                    <p class="text-muted small mb-4">Secure payment powered by Razorpay.</p>

                    <form action="{{ route('razorpay.payment') }}" method="POST">
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ env('RAZORPAY_KEY') }}"
                                data-amount="{{ $total * 100 }}"
                                data-currency="INR"
                                data-buttontext="Pay Securely with Razorpay"
                                data-name="Energywork by Annesha"
                                data-description="Course Purchase"
                                data-image="{{ asset('images/logo.png') }}"
                                data-prefill.name="{{ Auth::user()->name }}"
                                data-prefill.email="{{ Auth::user()->email }}"
                                data-theme.color="#647E64">
                        </script>
                        <input type="hidden" name="hidden">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

