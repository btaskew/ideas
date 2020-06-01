<div>
    <div
        class="absolute bg-gray-200 rounded-lg shadow-xl p-4 border-2 border-gray-200 z-10 -m-4"
        style="right: 4rem; width: 24rem"
    >
        <p class="block mb-1 text-gray-900 leading-tight mb-4">
            Login or register to vote
        </p>

        <form method="POST" action="/login-vote">
            @csrf

        <input
            type="email"
            wire:model="email"
            name="email"
            class="rounded border border-blue-200 mb-3 w-full p-1"
            placeholder="Email address"
        />

        @if(!$emailSubmitted)
            <button
                class="block rounded-l w-full p-2 text-xs font-bold bg-blue-400 text-white hover:bg-blue-700"
                wire:click.prevent="verifyEmail"
            >
                Next
            </button>
        @elseif(!$userExists)
            <p>
                Please <a href="/register" class="text-blue-400 hover:text-blue-600">register</a> with the site before voting.
            </p>
        @else
            <p>Password:</p>
            <input type="password" name="password" class="rounded border border-blue-200 mb-3 w-full p-1" />

            <input type="hidden" name="idea" value={{ $ideaId }} />

            <button
                class="block rounded-l w-full p-2 text-xs font-bold bg-blue-400 text-white hover:bg-blue-700"
                type="submit"
            >
                Login and vote
            </button>
        @endif
        </form>

    </div>

    <div class="fixed w-full h-full top-0 left-0" wire:click="$emit('closeLogin')">
    </div>
</div>
