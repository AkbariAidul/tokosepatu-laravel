<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1556906781-9a412961c28c?q=80&w=1887&auto=format&fit=crop" 
                     alt="Background" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-50"></div>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-8 py-10 bg-white/80 backdrop-blur-sm shadow-2xl overflow-hidden sm:rounded-2xl">
                <div class="flex justify-center mb-6">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-700" />
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>