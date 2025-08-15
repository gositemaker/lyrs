<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Phone Number with Country Code -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone Number')" />

            <div class="flex gap-2">
                <!-- Country Code Dropdown -->
                <select name="country_code" id="country_code" required
                        class="block w-1/3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="+91" {{ old('country_code') == '+91' ? 'selected' : '' }}>+91 🇮🇳</option>
                    <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>+1 🇺🇸</option>
                    <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>+44 🇬🇧</option>
                    <!-- Add more if needed -->
                </select>

                <!-- Phone Input -->
                <x-text-input id="phone" class="block w-full" type="tel" name="phone" :value="old('phone')" required autocomplete="tel" />
            </div>

            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            <x-input-error :messages="$errors->get('country_code')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
