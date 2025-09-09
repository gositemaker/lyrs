@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="col-md-7 col-lg-6">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">

                <!-- Title -->
                <h3 class="text-center mb-4 fw-bold text-primary">Verify Your Email</h3>
                <p class="text-muted text-center mb-4">
                    Thanks for signing up! Please verify your email address by clicking the link we just sent you.  
                    If you didn’t receive it, we can send another.
                </p>

                <!-- Success Message -->
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success rounded-3">
                        {{ __('A new verification link has been sent to the email address you registered with.') }}
                    </div>
                @endif

                <!-- Resend + Logout -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <!-- Resend -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary px-4 rounded-3">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
