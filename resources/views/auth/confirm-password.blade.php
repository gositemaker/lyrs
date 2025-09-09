@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">

                <!-- Title -->
                <h3 class="text-center mb-4 fw-bold text-primary">Confirm Password</h3>
                <p class="text-muted text-center mb-4">
                    This is a secure area of the application. Please confirm your password before continuing.
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               class="form-control rounded-3 @error('password') is-invalid @enderror" 
                               required 
                               autocomplete="current-password">

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary rounded-3 py-2">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
