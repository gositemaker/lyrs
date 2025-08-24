{{-- resources/views/sessions/success.blade.php --}}
@extends('layouts.app')

@section('title','Booking Confirmed')
@section('content')
<div class="container py-5">
  <div class="card border-0 shadow-sm mx-auto" style="max-width: 640px;">
    <div class="card-body">
      <h3 class="mb-3">Your session is booked 🎉</h3>
      <ul class="list-unstyled">
        <li><strong>Session:</strong> {{ $booking->session->name }}</li>
        <li><strong>Trainer:</strong> {{ $booking->trainer->name }}</li>
        <li><strong>Date:</strong> {{ $booking->date->format('M d, Y') }}</li>
        <li><strong>Time:</strong> {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}–{{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}</li>
        <li><strong>Amount:</strong> ₹{{ number_format($booking->amount,2) }}</li>
      </ul>
      <a href="{{ route('book.session') }}" class="btn btn-dark rounded-pill px-4 mt-2">Explore more sessions</a>
    </div>
  </div>
</div>
@endsection
