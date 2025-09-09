@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="col-md-7 col-lg-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-3">

                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="{{ asset('images/Logo.jpg') }}" alt="Logo" class="img-fluid" style="max-height: 60px;">
                </div>

                <!-- Title -->
                <h3 class="text-center mb-4 fw-bold text-primary">Create Your Account ✨</h3>

                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" type="text" name="name"
                            class="form-control rounded-3 @error('name') is-invalid @enderror"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="invalid-feedback d-block" />
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email"
                            class="form-control rounded-3 @error('email') is-invalid @enderror"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="invalid-feedback d-block" />
                    </div>

                    <!-- Phone with Country Code -->
                    <div class="mb-3">
                        <x-input-label for="phone" :value="__('Phone Number')" />
                        <div class="input-group">
                            <select name="country_code" id="country_code" class="form-select rounded-start @error('country_code') is-invalid @enderror" required>
                                <option value="+91" {{ old('country_code') == '+91' ? 'selected' : '' }}>+91 🇮🇳</option>
                                <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>+1 🇺🇸</option>
                                <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>+44 🇬🇧</option>
                            </select>
                            <x-text-input id="phone" type="tel" name="phone"
                                class="form-control rounded-end @error('phone') is-invalid @enderror"
                                :value="old('phone')" required autocomplete="tel" />
                        </div>
                        <x-input-error :messages="$errors->get('phone')" class="invalid-feedback d-block" />
                        <x-input-error :messages="$errors->get('country_code')" class="invalid-feedback d-block" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" type="password" name="password"
                            class="form-control rounded-3 @error('password') is-invalid @enderror"
                            required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="invalid-feedback d-block" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control rounded-3 @error('password_confirmation') is-invalid @enderror"
                            required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="invalid-feedback d-block" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3">
                        {{ __('Register') }}
                    </button>
                </form>

                <!-- Login Redirect -->
                <p class="text-center mt-4 mb-0 text-muted">
                    {{ __('Already registered?') }}
                    <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-none">
                        {{ __('Log in') }}
                    </a>
                </p>

            </div>
        </div>
    </div>
</div>

@endsection
