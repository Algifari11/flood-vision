<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@hasSection('title') @yield('title') | {{ config('app.name', 'Flood-Vision') }} @else {{ config('app.name', 'Flood-Vision') }} | Sistem Mitigasi Banjir Cerdas @endif</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="font-family: 'Plus Jakarta Sans', sans-serif;">
        <div class="min-h-screen bg-slate-50 flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-grow pb-12">
                {{ $slot }}
            </main>

            <!-- Global Footer -->
            <footer class="relative z-10 border-t border-slate-200/60 bg-white/40 backdrop-blur-md py-8 text-center mt-auto">
                <p class="text-slate-500 text-sm font-medium">&copy; 2026 Flood-Vision System &mdash; Sistem Mitigasi Banjir Cerdas.</p>
            </footer>
        </div>
    </body>
</html>
