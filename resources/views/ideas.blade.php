@extends('layouts.app')

@section('content')
    <div class="lg:flex">
        <div class="lg:w-1/5">
            @include('_sidebar-links')
        </div>
        <div class="flex-1">
            <div>
                <ul class="flex border-b">
                    <li class="mr-1 -mb-px">
                        <a
                            class="bg-white inline-block py-2 px-4 text-blue-700 font-semibold border-l border-t border-r rounded-t"
                            href="#"
                        >
                            Newest
                        </a>
                    </li>
                    <li class="mr-1">
                        <a
                            class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800"
                            href="#"
                        >
                            Popular
                        </a>
                    </li>
                </ul>
            </div>

            <div class="mt-6 mb-6">

                <div class="mb-3">
                    @foreach($ideas as $idea)
                        @include('_idea')
                    @endforeach
                </div>

                {{ $ideas->links() }}

            </div>
        </div>
    </div>
@endsection
