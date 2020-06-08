@extends('layouts.app')

@section('content')
    <div class="w-full">
        <h1 class="font-bold text-3xl text-gray-700 tracking-wide">What's the big idea?</h1>

        <form method="POST" action="/ideas" class="mt-5">
            @csrf

            <div class="mb-6">
                <label for="title" class="input-label">Title</label>

                <input
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    required
                    autocomplete="title"
                    autofocus
                    class="basic-input @error('title') border-red-700 @enderror"
                >

                @error('title')
                <div class="mt-2">
                <span role="alert" class="error-message">
                    {{ $message }}
                </span>
                </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="input-label">{{ __('Description') }}</label>

                <textarea
                    name="description"
                    id="description"
                    cols="30"
                    rows="10"
                    required
                    class="basic-input @error('description') border-red-700 @enderror"
                ></textarea>

                @error('description')
                <div class="mt-2">
                <span role="alert" class="error-message">
                    {{ $message }}
                </span>
                </div>
                @enderror
            </div>

            <button type="submit" class="blue-btn mb-6">
                Create idea
            </button>
        </form>
    </div>
@endsection
