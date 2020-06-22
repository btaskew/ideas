<div class="mb-2 py-3 border-b-2">
    <p class="mb-2">
        {{ $comment->body }}
    </p>
    <span class="text-gray-800 text-xs">
        @auth()
            By {{ $comment->creator->name === auth()->user()->name ? 'you' : $comment->creator->name }} - {{ $comment->created_at->diffForHumans() }}
        @else
            By {{ $comment->creator->name }} - {{ $comment->created_at->diffForHumans() }}
        @endauth
    </span>
</div>
