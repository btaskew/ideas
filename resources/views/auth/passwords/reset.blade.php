@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-6">
            <label for="email" class="input-label">{{ __('Email') }}</label>

            <input
                id="email"
                type="email"
                class="basic-input @error('email') border-red-700 @enderror"
                name="email"
                value="{{ $email ?? old('email') }}"
                required
                autocomplete="email"
                autofocus
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
            {{ __('Reset password') }}
        </button>
    </form>
@endsection
