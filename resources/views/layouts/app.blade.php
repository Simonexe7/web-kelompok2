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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body> --}}

    <body class="bg-gray-100 dark:bg-gray-900">

    <div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col dark:shadow-lg dark:shadow-blue-500">
        <div class="flex justify-center items-center py-6">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-10 h-10">
            <div class="p-4 text-xl font-bold"> MiniMarket</div>
        </div>

        @include('layouts.navigation')

        <div class="p-4 border-t border-gray-700">
            <div class="text-sm mb-3">
                <div>{{ auth()->user()->name }}</div>
                <div class="text-gray-400 text-xs">Cabang A</div>
            </div>
        </div>

    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col">

        <!-- Topbar -->
        @isset($header)
        <header class="bg-white shadow px-6 py-6 flex justify-between items-center dark:bg-slate-800">
        {{ $header }}
        </header>
        @endisset

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
    </div>
    </body>
</html>
