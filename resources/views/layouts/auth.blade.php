<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

@include('partials/_head')

<body class="h-full">
    <main class="flex justify-center items-center h-full bg-gray-100">
        <div class="md:flex md:w-4/5 md:border md:rounded md:shadow-xl md:h-auto xl:w-3/5 w-full h-full p-5 py-8 bg-white">

            <div class="md:w-1/3 flex justify-center items-center">
                <a href="/ideas">
                    <img src="{{ asset('images/main-logo.png') }}" alt="Bright ideas" />
                </a>
            </div>

            <div class="md:w-2/3 p-2 text-lg ml-2 mr-3 mb-4">
                @yield('content')
            </div>

        </div>
    </main>

    @livewireScripts
</body>

</html>
