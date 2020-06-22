@extends('layouts.app')

@section('content')
    <div class="flex-1 mb-6">
        <div class="mb-8">
            <h2 class="font-semibold text-3xl mb-4">{{ $idea->title }}</h2>
            <div class="text-xs mb-5">
                @auth
                    <span>Created {{ $idea->created_at->diffForHumans() }} by {{ $idea->creator->name === auth()->user()->name ? 'you' : $idea->creator->name }}</span>
                @else
                    <span>Created {{ $idea->created_at->diffForHumans() }} by {{ $idea->creator->name }}</span>
                @endauth
            </div>
            <p>
                {{ $idea->description }}
            </p>
        </div>

        @auth()
            @include('comments/_create')
        @else()
            <div class="mt-5">
                <p><a href="/login" class="text-app-dark-blue">Login</a> to comment</p>
            </div>
        @endauth

        @foreach($comments as $comment)
            @include('comments/_show')
        @endforeach

        {{ $comments->links() }}
    </div>
@endsection
