<div class="mb-2 py-3 border-b-2">
    <p class="mb-2">
        {{ $comment->body }}
    </p>
    <span class="text-gray-800 text-xs">
        By {{ $comment->creator->displayName }} - {{ $comment->created_at->diffForHumans() }}
    </span>
</div>
