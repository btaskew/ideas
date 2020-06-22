<div class="lg:w-1/6 lg:px-10 px-1" x-data="{hovering: false}">
    <div
        class="flex flex-col items-center border-2 rounded-lg {{ $userHasVoted ? 'border-green-400' : 'border-app-blue' }}"
        :class="{'transition duration-200 ease-in-out border-app-dark-blue' : hovering}"
    >
        <div class="p-3 text-lg">
            {{ $voteCount }}
        </div>

        @if($userHasVoted)
            <div class="text-white w-full text-center p-1 bg-green-400">
                Voted!
            </div>
        @else
            <div
                @mouseover="hovering = true"
                @mouseleave="hovering = false"
                class="text-white w-full text-center p-1 bg-app-blue cursor-pointer"
                :class="{'transition duration-200 ease-in-out bg-app-dark-blue' : hovering}"
                wire:click="vote"
            >
                Vote
            </div>
        @endif
    </div>

    @if ($showLoginForm)
        @livewire('vote-login-form', ['ideaId' => $idea->id])
    @endif
</div>
