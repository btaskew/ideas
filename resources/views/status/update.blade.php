<div class="mt-6">
    <h2 class="font-bold text-lg text-gray-700 tracking-wide">Update status</h2>

    <form method="POST" action="/ideas/{{ $idea->id }}/status" class="mt-5">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <select name="status" id="status" class="border rounded">
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

        <button type="submit" class="blue-btn mb-6 text-sm">
            Update status
        </button>
    </form>

</div>
