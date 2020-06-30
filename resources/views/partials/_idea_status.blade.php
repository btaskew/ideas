@if ($status->status === \App\Attributes\Statuses::NEW_STATUS)
    <span class="text-green-500 font-semibold">{{ $status->name }}</span>
@elseif ($status->status === \App\Attributes\Statuses::RELEASED_STATUS)
    <span class="text-green-600 font-semibold">{{ $status->name }}</span>
@elseif ($status->status === \App\Attributes\Statuses::REJECTED_STATUS)
    <span class="text-red-600 font-semibold">{{ $status->name }}</span>
@else
    <span class="text-orange-600 font-semibold">{{ $status->name }}</span>
@endif
