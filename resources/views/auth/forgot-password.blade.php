@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">

                <!-- Title -->
                <h3 class="text-center mb-4 fw-bold text-primary">Forgot Password?</h3>
                <p class="text-muted text-center mb-4">
                    No problem. Enter your email address and we’ll send you a link to reset your password.
                </p>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success rounded-3">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Forgot Password Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email"
                            class="form-control rounded-3 @error('email') is-invalid @enderror"
                            :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="invalid-feedback d-block" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </form>

                <!-- Back to Login -->
                <p class="text-center mt-4 mb-0 text-muted">
                    Remembered your password?
                    <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-none">
                        {{ __('Log in') }}
                    </a>
                </p>

            </div>
        </div>
    </div>
</div>
@endsection
