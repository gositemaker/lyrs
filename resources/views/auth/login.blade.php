@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">

                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="{{ asset('images/Logo.jpg') }}" alt="Logo" class="img-fluid" style="max-height: 60px;">
                </div>

                <!-- Title -->
                <h3 class="text-center mb-4 fw-bold text-primary">Welcome Back 👋</h3>

                <!-- Session Status -->
                <x-auth-session-status class="mb-3" :status="session('status')" />

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email"
                            class="form-control rounded-3 @error('email') is-invalid @enderror"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="invalid-feedback d-block" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" type="password" name="password"
                            class="form-control rounded-3 @error('password') is-invalid @enderror"
                            required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="invalid-feedback d-block" />
                    </div>

                    <!-- Remember & Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none small text-primary" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3">
                        {{ __('Log in') }}
                    </button>
                </form>

                <!-- Register Link -->
                @if (Route::has('register'))
                    <p class="text-center mt-4 mb-0 text-muted">
                        {{ __("Don't have an account?") }}
                        <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-none">
                            {{ __('Sign up') }}
                        </a>
                    </p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
