@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-6">
            <label for="email" class="input-label">{{ __('Email') }}</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="email"
                autofocus
                class="basic-input @error('email') border-red-700 @enderror"
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
                name="password"
                required
                autocomplete="current-password"
                class="basic-input @error('password') border-red-700 @enderror"
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
            <input
                type="checkbox"
                name="remember"
                class="shadow"
                id="remember" {{ old('remember') ? 'checked' : '' }}
            >
            <label class="text-gray-700 ml-1" for="remember">
                {{ __('Remember me') }}
            </label>
        </div>

        <button type="submit" class="blue-btn mb-6">
            {{ __('Login') }}
        </button>

        <a href="{{ route('register') }}" class="block text-sm text-app-dark-blue">
            Not a member yet?
        </a>

        <a href="{{ route('password.request') }}" class="block text-sm text-app-dark-blue mt-2">
            Forgot your password?
        </a>
    </form>
@endsection
