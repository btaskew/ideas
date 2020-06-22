<div class="flex border-b p-3 py-4">
    <div class="flex-1">
        <h2 class="font-semibold text-xl mb-2">
            <a href="/ideas/{{ $idea->id }}" class="hover:text-app-dark-blue">{{ $idea->title }}</a>
        </h2>
        <p class="mb-3">
            {{ $idea->description }}
        </p>
        <div class="flex justify-between text-xs">
            <span>Created {{ $idea->created_at->diffForHumans() }} by {{ $idea->creator->displayName }}</span>
            <span>{{ $idea->comments->count() }} {{ \Illuminate\Support\Str::plural('comment', $idea->comments->count()) }}</span>
        </div>
    </div>

    <div class="lg:w-1/6 lg:px-10 px-1">
        @livewire('vote-button', ['idea' => $idea])
    </div>
</div>
