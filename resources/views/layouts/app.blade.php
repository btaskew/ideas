<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-head></x-head>

<body>
    <div id="app">
        <section class="px-8 py-4 mb-3">
            <header class="container mx-auto flex justify-between items-center">
                <a href="/ideas">
                    <img src="{{ asset('images/banner-logo.png') }}" alt="Bright ideas" width="65%" />
                </a>

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
                    <a href="{{ route('login') }}" class="text-app-dark-blue font-semibold hover:text-blue-800">
                        Login
                    </a>
                @endauth
            </header>
        </section>

        <section class="px-8">
            <main class="container mx-auto">
                <div class="lg:flex">
                    <div class="lg:w-1/5 lg:min-w-1/5 mr-10">
                        @include('_sidebar-links')
                    </div>

                    @yield('content')
                </div>
            </main>
        </section>
    </div>

    @livewireScripts
</body>

</html>
