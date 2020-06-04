@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-6">
            <label for="name" class="input-label">{{ __('Name') }}</label>

            <input
                id="name"
                type="text"
                class="basic-input @error('name') border-red-700 @enderror"
                name="name"
                value="{{ old('name') }}"
                required
                autocomplete="name"
                autofocus
            >

            @error('name')
            <div class="mt-2">
                <span role="alert" class="error-message">
                    {{ $message }}
                </span>
            </div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="input-label">{{ __('Email') }}</label>

            <input
                id="email"
                type="email"
                class="basic-input @error('email') border-red-700 @enderror"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="email"
            >

            @error('email')
            <div class="mt-2">
                <span role="alert" class="error-message">
                    {{ $message }}
                </span>
            </div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="input-label">{{ __('Password') }}</label>

            <input
                id="password"
                type="password"
                class="basic-input @error('password') border-red-700 @enderror"
                name="password"
                required
                autocomplete="new-password"
            >

            @error('password')
            <div class="mt-2">
                <span role="alert" class="error-message">
                    {{ $message }}
                </span>
            </div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password-confirm" class="input-label">{{ __('Confirm password') }}</label>

            <input
                id="password-confirm"
                type="password"
                class="basic-input"
                name="password_confirmation"
                required
                autocomplete="new-password"
            >
        </div>

        <button type="submit" class="blue-btn mb-6">
            {{ __('Register') }}
        </button>

        <a href="{{ route('login') }}" class="block text-sm text-app-dark-blue">
            Already a member?
        </a>
    </form>
@endsection
