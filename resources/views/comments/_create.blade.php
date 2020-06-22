<div class="mt-6">
    <h2 class="font-bold text-lg text-gray-700 tracking-wide">Any comments?</h2>

    <form method="POST" action="/ideas/{{ $idea->id }}/comments" class="mt-5">
        @csrf

        <div class="mb-4">
            <textarea
                name="body"
                id="body"
                cols="30"
                rows="5"
                required
                maxlength="400"
                class="basic-input @error('body') border-red-700 @enderror"
            ></textarea>

            @error('body')
            <div class="mt-2">
                <span role="alert" class="error-message">
                    {{ $message }}
                </span>
            </div>
            @enderror
        </div>

        <button type="submit" class="blue-btn mb-6 text-sm">
            Save comment
        </button>
    </form>

</div>
