<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<x-head></x-head>

<body class="h-full">
    <main class="flex justify-center items-center h-full bg-gray-100">
        <div class="flex shadow-xl rounded p-5 py-8 border w-3/5 bg-white">

            <div class="w-1/3 flex justify-center items-center">
                <img src="{{ asset('images/main-logo.png') }}" alt="Bright ideas" />
            </div>

            <div class="w-2/3 p-2 text-lg ml-2 mr-3">
                @yield('content')
            </div>

        </div>
    </main>

    @livewireScripts
</body>

</html>
