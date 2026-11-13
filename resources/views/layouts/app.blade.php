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
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-900 text-slate-300 mt-20 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
                
                {{-- Brand Info --}}
                <div class="lg:col-span-2 space-y-4">
                    <div class="bg-white p-3 rounded-lg inline-block">
                        <x-logo />
                    </div>
                    <p class="text-slate-400 text-sm max-w-sm leading-relaxed">
                        Polyplex DigiPrint specializes in cutting-edge synthetic papers, high-durability non-tear media, and digital print substrates engineered for superior performance across laser, inkjet, and offset technologies.
                    </p>
                    <div class="pt-2 text-xs text-slate-500">
                        &copy; {{ date('Y') }} Polyplex Corporation Ltd. All rights reserved.
                    </div>
                </div>

                {{-- Products Column 1 --}}
                <div>
                    <h3 class="font-heading font-semibold text-white text-sm uppercase tracking-wider mb-4">
                        Media &amp; Substrates
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#non-tear-media" class="hover:text-white transition-colors">Non-Tear Media</a></li>
                        <li><a href="#gloss-art-paper" class="hover:text-white transition-colors">Gloss Art Paper Media</a></li>
                        <li><a href="#inkjet-photo-media" class="hover:text-white transition-colors">Inkjet Photo Media</a></li>
                        <li><a href="#digital-labels" class="hover:text-white transition-colors">Digital Labels</a></li>
                        <li><a href="#products" class="text-blue-400 hover:text-blue-300 font-medium transition-colors">View All Products &rarr;</a></li>
                    </ul>
                </div>

                {{-- Products Column 2 --}}
                <div>
                    <h3 class="font-heading font-semibold text-white text-sm uppercase tracking-wider mb-4">
                        Print Solutions
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#multi-purpose-labels" class="hover:text-white transition-colors">Multi-Purpose Labels</a></li>
                        <li><a href="#digital-wide-format" class="hover:text-white transition-colors">Digital Wide-Format Media</a></li>
                        <li><a href="#reprographic-media" class="hover:text-white transition-colors">Reprographic Media</a></li>
                        <li><a href="#polyester-offset-plate" class="hover:text-white transition-colors">Polyester Offset Plate</a></li>
                        <li><a href="#laser-inkjet-print" class="hover:text-white transition-colors">Laser &amp; Inkjet Offset Print</a></li>
                    </ul>
                </div>

                {{-- Company & Contact --}}
                <div>
                    <h3 class="font-heading font-semibold text-white text-sm uppercase tracking-wider mb-4">
                        Quick Links
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#about" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#industries" class="hover:text-white transition-colors">Industries</a></li>
                        <li><a href="#blog" class="hover:text-white transition-colors">Blog &amp; News</a></li>
                        <li><a href="#careers" class="hover:text-white transition-colors">Careers</a></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

