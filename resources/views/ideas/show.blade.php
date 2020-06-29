@extends('layouts.app')

@section('content')
    <div class="flex-1 mb-6">
        <div class="pb-6 mb-4 border-b-2">
            <div class="flex mb-2">
                <div class="flex-1">
                    <h2 class="font-semibold text-3xl mb-4 mr-1">{{ $idea->title }}</h2>
                    <div class="mb-5">
                        <p>
                            @include('partials/_idea_status')
                        </p>
                        <span class="text-xs">
                            Created {{ $idea->created_at->diffForHumans() }} by {{ $idea->creator->displayName }}
                        </span>
                    </div>
                </div>

                @livewire('vote-button', ['idea' => $idea])
            </div>

            <p>
                {{ $idea->description }}
            </p>
        </div>

        @auth()
            @include('comments/_create')
        @endauth

        @foreach($comments as $comment)
            @include('comments/_show')
        @endforeach

        {{ $comments->links() }}

        @guest
            <div class="mt-5">
                <p><a href="/login" class="text-app-dark-blue text-sm">Login</a> to comment</p>
            </div>
        @endguest
    </div>
@endsection
