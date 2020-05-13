<div class="flex border-b p-3 py-4">
    <div class="flex-1">
        <h2 class="font-semibold text-xl mb-2">{{ $idea->title }}</h2>
        <p class="mb-3">
            {{ $idea->description }}
        </p>
        <div class="flex justify-between text-xs">
            <span>Created about {{ $idea->created_at->diffForHumans() }} by {{ $idea->creator->name }}</span>
            <span>1 comment</span>
        </div>
    </div>

    <div class="lg:w-1/6 lg:px-10 px-1">
        <div class="flex flex-col items-center border-2 border-blue-400 rounded-lg">
            <div class="p-3 text-lg">
                1
            </div>
            <div class="bg-blue-400 text-white w-full text-center p-1">
                Vote
            </div>
        </div>
    </div>
</div>
