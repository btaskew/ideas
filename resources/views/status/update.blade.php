<div class="mt-6 border rounded border-gray-400 p-4 bg-gray-100">
    <h2 class="font-bold text-lg text-gray-700 tracking-wide">Update status</h2>

    <form method="POST" action="/ideas/{{ $idea->id }}/status" class="mt-5">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <select name="status" id="status" class="border rounded w-full">
                @foreach(\App\Status::all() as $status)
                    <option value="{{ $status->id }}" @if ($idea->status->is($status)) selected @endif>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>

            @error('body')
            <div class="mt-2">
                <span role="alert" class="error-message">
                    {{ $message }}
                </span>
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="comment" class="input-label">Comment</label>
            <textarea
                name="comment"
                id="comment"
                cols="30"
                rows="5"
                required
                maxlength="400"
                placeholder="I'm updating the status of this idea because..."
                class="basic-input @error('comment') border-red-700 @enderror"
            ></textarea>

            @error('comment')
            <div class="mt-2">
                <span role="alert" class="error-message">
                    {{ $message }}
                </span>
            </div>
            @enderror
        </div>

        <button type="submit" class="blue-btn text-sm">
            Update status
        </button>
    </form>

</div>
