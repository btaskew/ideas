<div x-data="{hovering: false}" class="h-1">
    <div
        class="sm:w-16 flex flex-col items-center border-2 rounded-lg {{ $userHasVoted ? 'border-green-400' : 'border-app-blue' }}"
        :class="{'transition duration-200 ease-in-out border-app-dark-blue' : hovering}"
    >
        <div class="p-3 text-lg">
            {{ $voteCount }}
        </div>

        @if($userHasVoted)
            <div class="text-white w-full text-center p-1 bg-green-400">
                <span class="sm:hidden">✓</span>
                <span class="hidden sm:inline">Voted!</span>
            </div>
        @else
            <div
                @mouseover="hovering = true"
                @mouseleave="hovering = false"
                @click="hovering = false"
                class="text-white w-full text-center p-1 bg-app-blue cursor-pointer"
                :class="{'transition duration-200 ease-in-out bg-app-dark-blue' : hovering}"
                wire:click="vote"
            >
                <span class="sm:hidden">+1</span>
                <span class="hidden sm:inline">Vote</span>
            </div>
        @endif
    </div>

    @if ($showLoginForm)
        @livewire('vote-login-form', ['ideaId' => $idea->id])
    @endif
</div>
