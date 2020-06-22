@extends('layouts.app')

@section('content')
    <div class="flex-1 mb-6">
        <div class="mb-8">
            <div class="flex mb-2">
                <div class="flex-1">
                    <h2 class="font-semibold text-3xl mb-4">{{ $idea->title }}</h2>
                    <div class="text-xs mb-5">
                        <span>Created {{ $idea->created_at->diffForHumans() }} by {{ $idea->creator->displayName }}</span>
                    </div>
                </div>

                <div class="lg:w-1/12">
                    @livewire('vote-button', ['idea' => $idea])
                </div>
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
                <p><a href="/login" class="text-app-dark-blue">Login</a> to comment</p>
            </div>
        @endguest
    </div>
@endsection
