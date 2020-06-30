@if ($comment instanceof \App\StatusUpdate)
    <div class="mb-3 py-2 px-3 border-b-2 bg-gray-100 rounded">
        <p class="font-semibold text-gray-700 mb-1">
            Status updated to: @include('partials/_idea_status', ['status' => $comment->status])
        </p>
        <p class="mb-2">
            {{  $comment->comment }}
        </p>
        <span class="text-gray-800 text-xs">
            By {{ $comment->creator->displayName }} - {{ $comment->created_at->diffForHumans() }}
        </span>
    </div>
@else
    <div class="mb-3 py-2 border-b-2">
        <p class="mb-2">
            {{ $comment->body  }}
        </p>
        <span class="text-gray-800 text-xs">
            By {{ $comment->creator->displayName }} - {{ $comment->created_at->diffForHumans() }}
        </span>
    </div>
@endif
