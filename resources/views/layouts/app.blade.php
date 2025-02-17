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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/flatpickr.js']) --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Stack -->
        @stack('custom-css')
        @stack('custom-js')
        
    </head>
    <body class="font-body antialiased">
        <div class="min-h-screen bg-body">
            <div>
                {{-- @include('layouts.navigation') --}}

                @if(auth('owners')->user())
                    @include('layouts.owner-navigation')
                @elseif(auth('users')->user())
                    @include('layouts.navigation')
                @endif
            </div>

            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @include('layouts.footer')

        <script src="{{ asset('js/test.js') }}"></script>
    </body>
</html>
