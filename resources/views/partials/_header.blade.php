<section x-data="{isOpen: false}" class="px-8 py-4 md:mb-4">

    {{-- Top header row --}}
    <header class="container mx-auto flex justify-between items-center">

        {{-- App logo --}}
        <a href="/ideas">
            <img src="{{ asset('images/banner-logo.png') }}" alt="Bright ideas" width="65%" />
        </a>

        {{-- Desktop auth links --}}
        <div class="hidden md:block">
            @auth()
                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-app-dark-blue font-semibold hover:text-blue-800"
                >
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @else()
                <a href="{{ route('login') }}" class="text-app-dark-blue font-semibold hover:text-blue-800 mr-4">
                    Login
                </a>
                <a href="{{ route('register') }}" class="text-app-dark-blue font-semibold hover:text-blue-800">
                    Register
                </a>
            @endauth
        </div>

        {{-- Mobile nav toggle --}}
        <div class="md:hidden">
            <button
                @click="isOpen = !isOpen"
                type="button"
                class="inline-block px-2 text-gray-300 self-end"
            >
                <svg class="h-6 w-6 " xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                    />
                </svg>
            </button>
        </div>

    </header>

    {{-- Mobile nav links --}}
    <div class="md:hidden">
        <div
            class="mt-4"
            x-show="isOpen"
            x-transition:enter="transition duration-300 transform origin-top-right"
            x-transition:enter-start="opacity-0 scale-y-0"
            x-transition:enter-end="opacity-100 scale-y-100"
            x-transition:leave="transition duration-300 transform origin-top-right"
            x-transition:leave-start="opacity-100 scale-y-100"
            x-transition:leave-end="opacity-0 scale-y-0"
        >

            @include('partials._nav-links')

            {{-- Mobile auth links --}}
            <ul class="mt-4 text-sm">
                @auth()
                    <li>
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="mb-3 block border-b-2 py-1 transition duration-400 ease-in-out hover:border-app-blue"
                        >
                            Logout
                        </a>

                        <form
                            id="logout-form"
                            action="{{ route('logout') }}"
                            method="POST"
                            style="display: none;"
                        >
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else()
                    <li>
                        <a
                            href="{{ route('login') }}"
                            class="mb-2 block border-b-2 py-1 transition duration-400 ease-in-out hover:border-app-blue"
                        >
                            Login
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('register') }}"
                            class="mb-3 block border-b-2 py-1 transition duration-400 ease-in-out hover:border-app-blue"
                        >
                            Register
                        </a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>

</section>
