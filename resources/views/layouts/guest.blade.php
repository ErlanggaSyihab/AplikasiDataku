<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Dataku') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>



    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex items-center justify-center bg-gray-100">
    
            <!-- Gambar Admin -->
            <div class="hidden sm:block mr-32"> <!-- Menambahkan margin kanan -->
                <img class="h-94 mb-9" src="{{ asset('img/Admin.png') }}" alt="" style="width: 400px;">
            </div>
    
            <!-- Kotak Login -->
            <div class=" w-full sm:max-w-md px-6 py-14 bg-white  shadow-lg shadow-blue-800/50  overflow-hidden sm:rounded-lg ">
                <div>
                    <a href="/">
                        <p style="display: flex; align-items: center; justify-content: center;">
                            <img class="w-72 h-94 mb-9" src="{{ asset('img/DATAKU.png') }}" alt="Logo Dataku">
                        </p>
                    </a>
                </div>
                {{ $slot }}
            </div>
    
        </div>
    </body>
    
    
    
</html>
