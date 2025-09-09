@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">

                <!-- Title -->
                <h3 class="text-center mb-4 fw-bold text-primary">Reset Password</h3>
                <p class="text-muted text-center mb-4">
                    Enter your new password to regain access to your account.
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">{{ __('Email') }}</label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email', $request->email) }}"
                               class="form-control rounded-3 @error('email') is-invalid @enderror"
                               required
                               autofocus
                               autocomplete="username">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                        <input id="password"
                               type="password"
                               name="password"
                               class="form-control rounded-3 @error('password') is-invalid @enderror"
                               required
                               autocomplete="new-password">

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               class="form-control rounded-3 @error('password_confirmation') is-invalid @enderror"
                               required
                               autocomplete="new-password">

                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary rounded-3 py-2">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
