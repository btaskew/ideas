<div class="lg:w-1/6 lg:px-10 px-1">
    <div class="flex flex-col items-center border-2 rounded-lg {{ $userHasVoted ? 'border-green-400' : 'border-blue-400' }}">
        <div class="p-3 text-lg">
            {{ $voteCount }}
        </div>
        <div
            class="text-white w-full text-center p-1 {{ $userHasVoted ? 'bg-green-400' : 'bg-blue-400 cursor-pointer' }}"
            wire:click="vote"
        >
            {{ $userHasVoted ? 'Voted!' : 'Vote' }}
        </div>
    </div>

    @if ($showLoginForm)
        @livewire('vote-login-form')
    @endif
</div>
