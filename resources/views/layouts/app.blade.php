<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    @auth
        <div class="md:flex md:flex-col">
            <div class="md:h-screen md:flex md:flex-col">
                @livewire('navigation-menu')

                <div class="md:flex md:flex-grow md:overflow-hidden">
                    @livewire('sidebar')
                    <div scroll-region="" class="md:flex-1 px-4 py-8 md:py-7 md:overflow-y-auto">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="min-h-screen bg-gray-100">
            @livewire('guest.navigation-menu')

            <main>
                {{ $slot }}
            </main>
        @endauth

        @stack('modals')

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://unpkg.com/flatpickr@4.6.9/dist/plugins/rangePlugin.js"></script>

        @yield('file-upload')
        @yield('pikaday')

        @livewireScripts
</body>

</html>
