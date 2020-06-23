<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials/_head')

<body>
    <div id="app">
        @include('partials._header')

        <section class="px-8">
            <main class="container mx-auto">
                <div class="lg:flex">

                    {{-- Desktop nav links --}}
                    <div class="hidden mb-8 md:block lg:w-1/5 lg:mr-10 lg:mb-0">
                        @include('partials._nav-links')
                    </div>

                    @yield('content')

                </div>
            </main>
        </section>
    </div>

    @livewireScripts
</body>

</html>
