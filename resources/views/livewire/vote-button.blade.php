<div class="lg:w-1/6 lg:px-10 px-1">
    <div class="flex flex-col items-center border-2 rounded-lg {{ $userHasVoted ? 'border-green-400' : 'border-blue-400' }}">
        <div class="p-3 text-lg">
            {{ $voteCount }}
        </div>

        @if($userHasVoted)
            <div class="text-white w-full text-center p-1 bg-green-400">
                Voted!
            </div>
        @else
            <div
                class="text-white w-full text-center p-1 bg-blue-400 cursor-pointer"
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
