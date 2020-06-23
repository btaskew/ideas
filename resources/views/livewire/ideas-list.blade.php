<div class="flex-1">
    <div>
        <ul class="flex border-b">
            <li class="mr-1 -mb-px">
                <a
                    class="bg-white inline-block py-2 px-4 {{ $orderBy === 'created_at' ? 'text-app-dark-blue font-semibold border-l border-t border-r rounded-t' : 'text-blue-500 font-semibold hover:text-blue-800' }}"
                    href="#newest"
                    wire:click.prevent="showNewest"
                >
                    Newest
                </a>
            </li>
            <li class="mr-1 -mb-px">
                <a
                    class="bg-white inline-block py-2 px-4 {{ $orderBy === 'votes_count' ? 'text-app-dark-blue font-semibold border-l border-t border-r rounded-t' : 'text-blue-500 font-semibold hover:text-blue-800' }}"
                    href="#popular"
                    wire:click.prevent="showPopular"
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
