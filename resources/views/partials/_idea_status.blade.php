@if ($idea->status->status === \App\Attributes\Statuses::NEW_STATUS)
    <span class="text-green-500 font-bold">{{ $idea->status->name }}</span>
@elseif ($idea->status->status === \App\Attributes\Statuses::REJECTED_STATUS)
    <span class="text-red-600 font-bold">{{ $idea->status->name }}</span>
@else
    <span class="text-orange-600 font-bold">{{ $idea->status->name }}</span>
@endif
