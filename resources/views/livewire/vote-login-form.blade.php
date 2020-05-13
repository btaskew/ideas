<div>
    <div
        class="absolute bg-gray-100 rounded-lg shadow-xl p-4 border-2 border-gray-200 z-10 -m-4"
        style="right: 4rem; width: 24rem"
    >
        <p class="block mb-1 text-gray-900 leading-tight mb-4">
            Login or register to vote
        </p>
        <input type="text" class="rounded border border-blue-200 mb-3 w-full p-1" placeholder="Email address" />
        <button class="block rounded-l w-full p-2 text-xs font-bold bg-blue-400 text-white hover:bg-blue-700">
            Next
        </button>
    </div>

    <div class="fixed w-full h-full top-0 left-0" wire:click="$emit('closeLogin')">
    </div>
</div>
