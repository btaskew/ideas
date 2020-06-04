<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-head></x-head>

<body>
    <div id="app">
        <section class="px-8 py-4 mb-3">
            <header class="container mx-auto">
                <a href="/ideas">
                    <img src="{{ asset('images/banner-logo.png') }}" alt="Bright ideas" width="20%" />
                </a>
            </header>
        </section>

        <section class="px-8">
            <main class="container mx-auto">
                <div class="lg:flex">
                    <div class="lg:w-1/5 lg:min-w-1/5">
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
