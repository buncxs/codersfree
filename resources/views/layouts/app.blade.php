<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Glider -->
    <link rel="stylesheet" href="{{ asset('assets/glider/glider.min.css') }}">
    <!-- Flexglider -->
    <link rel="stylesheet" href="{{ asset('assets/flexslider/flexslider.css') }}">
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <script>
        function dropdown() {
            return {
                open: false,
                show() {
                    if (this.open) {
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto';

                    } else {
                        this.open = true;
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden';
                    }
                },
                close() {
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto';
                }
            }
        }
    </script>
    <!-- Glider -->
    <script src="{{ asset('assets/glider/glider.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('assets/jquery/jquery.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('assets/flexslider/jquery.flexslider-min.js') }}"></script>
    @stack('scripts')
</body>

</html>
