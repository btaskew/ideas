@extends('layouts.app')

@section('content')
    <div class="flex-1">
        <h2 class="font-semibold text-xl mb-2">{{ $idea->title }}</h2>
        <p class="mb-3">
            {{ $idea->description }}
        </p>
        <div class="flex justify-between text-xs">
            <span>Created {{ $idea->created_at->diffForHumans() }} by {{ $idea->creator->name }}</span>
            <span>1 comment</span>
        </div>
    </div>
@endsection