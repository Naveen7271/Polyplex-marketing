<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Polyplex DigiPrint - Synthetic Paper & Specialty Print Media') }}</title>

    {{-- Fonts: Inter everywhere, Montserrat on headings --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700|montserrat:500,600,700,800,900" rel="stylesheet" />

    {{-- Compiled Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50/40 text-slate-900 font-sans antialiased selection:bg-blue-600 selection:text-white flex flex-col">
    
    {{-- Header / Navigation Bar --}}
    <x-navbar />

    {{-- Main Content --}}
    <main class="grow">
        {{ $slot }}
    </main>

    {{-- Footer matching official Polyplex DigiPrint layout --}}
    <x-footer />

</body>
</html>

