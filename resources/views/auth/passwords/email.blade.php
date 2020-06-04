@extends('layouts.auth')

@section('content')
    <div class="flex flex-col">
        <div class="font-bold mb-8 text-xl text-gray-800">{{ __('Reset password') }}</div>

        @if (session('status'))
            <div class="font-semibold mb-8 text-gray-700" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-6">
                <label for="email" class="input-label">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input
                        id="email"
                        type="email"
                        class="basic-input @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
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
            </div>

            <button type="submit" class="blue-btn mb-6">
                {{ __('Send password reset link') }}
            </button>
        </form>
    </div>
@endsection
