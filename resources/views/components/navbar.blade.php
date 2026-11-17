@php
    $productColumn1 = [
        ['title' => 'Non-Tear Media', 'url' => route('products.show', 'non-tear-media')],
        ['title' => 'Gloss Art Paper Media', 'url' => route('products.show', 'gloss-art-paper-media')],
        ['title' => 'Inkjet Photo Media', 'url' => route('products.show', 'inkjet-photo-media')],
        ['title' => 'Digital Labels', 'url' => route('products.show', 'digital-labels')],
    ];

    $productColumn2 = [
        ['title' => 'Multi-Purpose Labels', 'url' => route('products.show', 'multi-purpose-labels')],
        ['title' => 'Digital Wide-Format Media', 'url' => route('products.show', 'digital-wide-format-media')],
        ['title' => 'Reprographic Media', 'url' => route('products.show', 'reprographic-media')],
        ['title' => 'Polyester Offset Plate', 'url' => route('products.show', 'polyester-offset-plates')],
        ['title' => 'Laser & Inkjet Offset Print', 'url' => route('products.show', 'laser-and-inkjet-positive-films')],
    ];

    $isProductsActive = request()->routeIs('products*')
        || request()->is('products*')
        || request()->is('non-tear-media*')
        || request()->is('gloss-art-paper*')
        || request()->is('inkjet-photo*')
        || request()->is('digital-labels*')
        || request()->is('multi-purpose-label*')
        || request()->is('digital-wide-format*')
        || request()->is('reprographic*')
        || request()->is('polyester-offset*')
        || request()->is('laser*positive-films*');
@endphp

<header class="sticky top-0 z-40 w-full bg-white border-b border-slate-200/80 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 md:h-22">

            {{-- Left: Logo --}}
            <div class="shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="focus:outline-hidden focus:ring-2 focus:ring-blue-500 rounded-md py-1"
                    aria-label="Polyplex DigiPrint Home">
                    <x-logo />
                </a>
            </div>

            {{-- Center: Desktop Navigation Links --}}
            <nav class="hidden lg:flex items-center space-x-7 xl:space-x-9 text-[16px] font-[500] font-normal text-[#000000]"
                aria-label="Main Navigation">
                <a href="{{ url('/') }}"
                    class="py-2 border-b transition-colors {{ request()->is('/') ? 'text-[#0E4174] border-[#0E4174] font-medium' : 'text-[#000000] border-transparent' }}"
                    {!! request()->is('/') ? 'aria-current="page"' : '' !!}>
                    Home
                </a>

                <a href="{{ route('about') }}"
                    class="py-2 border-b transition-colors {{ request()->routeIs('about') || request()->is('about*') ? 'text-[#0E4174] border-[#0E4174] font-medium' : 'text-[#000000] border-transparent' }}"
                    {!! request()->routeIs('about') || request()->is('about*') ? 'aria-current="page"' : '' !!}>
                    About Us
                </a>

                {{-- Products Dropdown Menu --}}
                <div class="relative group flex items-center" id="products-menu-container">
                    <a href="{{ route('products') }}"
                        class="py-2 border-b transition-colors text-[16px] {{ $isProductsActive ? 'text-[#0E4174] border-[#0E4174] font-medium' : 'text-[#000000] border-transparent hover:text-blue-600' }}"
                        {!! $isProductsActive ? 'aria-current="page"' : '' !!}>
                        Products
                    </a>
                    <button type="button" id="products-menu-button"
                        class="py-2 pl-1 pr-1 text-slate-500 hover:text-blue-600 transition-colors focus:outline-hidden"
                        aria-expanded="false" aria-haspopup="true" aria-label="Toggle products dropdown menu">
                        <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    {{-- Products Dropdown Panel --}}
                    <div id="products-dropdown"
                        class="absolute left-1/2 -translate-x-1/2 top-full pt-3 w-[520px] transition-all duration-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible pointer-events-none group-hover:pointer-events-auto group-focus-within:pointer-events-auto z-50"
                        role="menu" aria-orientation="vertical" aria-labelledby="products-menu-button">
                        <div
                            class="bg-white rounded-xl shadow-xl border border-slate-200/90 p-6 grid grid-cols-2 gap-x-8 gap-y-3.5">
                            {{-- Column 1 --}}
                            <div class="space-y-3.5">
                                <a href="{{ route('products') }}"
                                    class="block text-[14px] font-semibold text-[#1652f0] hover:text-blue-800 transition-colors hover:translate-x-0.5 duration-150"
                                    role="menuitem">
                                    View All Products
                                </a>

                                @foreach ($productColumn1 as $item)
                                    <a href="{{ $item['url'] }}"
                                        class="block text-[14px] text-slate-800 hover:text-blue-600 transition-colors hover:translate-x-0.5 duration-150"
                                        role="menuitem">
                                        {{ $item['title'] }}
                                    </a>
                                @endforeach
                            </div>

                            {{-- Column 2 --}}
                            <div class="space-y-3.5">
                                @foreach ($productColumn2 as $item)
                                    <a href="{{ $item['url'] }}"
                                        class="block text-[14px] text-slate-800 hover:text-blue-600 transition-colors hover:translate-x-0.5 duration-150"
                                        role="menuitem">
                                        {{ $item['title'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#industries" class="hover:text-blue-600 transition-colors py-2">
                    Industries
                </a>

                <a href="#blog" class="hover:text-blue-600 transition-colors py-2">
                    Blog &amp; News
                </a>

                <a href="#careers" class="hover:text-blue-600 transition-colors py-2">
                    Careers
                </a>

                <a href="#contact" class="hover:text-blue-600 transition-colors py-2">
                    Contact
                </a>
            </nav>

            {{-- Right: Actions (Search & Login) --}}
            <div class="flex items-center space-x-3 sm:space-x-4">
                {{-- Search Button --}}
                <button type="button" id="open-search-btn"
                    class="p-2 text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-full transition-colors focus:outline-hidden focus:ring-2 focus:ring-blue-500"
                    aria-label="Search site" title="Search">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>

                {{-- Login / Portal Button (arrow entering bracket icon as shown in screenshot) --}}
                <a href="#login" id="login-link-btn"
                    class="p-2 text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-full transition-colors focus:outline-hidden focus:ring-2 focus:ring-blue-500"
                    aria-label="Login or Client Portal" title="Client Portal / Sign In">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                </a>

                {{-- Mobile Hamburger Toggle Button --}}
                <button type="button" id="mobile-menu-toggle"
                    class="lg:hidden p-2 text-slate-700 hover:text-blue-600 hover:bg-slate-50 rounded-lg transition-colors focus:outline-hidden focus:ring-2 focus:ring-blue-500"
                    aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle mobile menu">
                    <svg id="hamburger-icon" class="w-6 h-6 block" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Drawer --}}
    <div id="mobile-menu" class="lg:hidden hidden border-t border-slate-200 bg-white shadow-xl">
        <div class="px-4 pt-3 pb-6 space-y-1 text-base font-medium">
            <a href="{{ url('/') }}"
                class="block px-3 py-2 rounded-md {{ request()->is('/') ? 'text-[#0E4174] bg-blue-50/50 font-semibold' : 'text-slate-800 hover:bg-slate-50' }}">
                Home
            </a>
            <a href="{{ route('about') }}"
                class="block px-3 py-2 rounded-md {{ request()->routeIs('about') || request()->is('about*') ? 'text-[#0E4174] bg-blue-50/50 font-semibold' : 'text-slate-800 hover:bg-slate-50' }}">
                About Us
            </a>

            {{-- Mobile Products Accordion --}}
            <div>
                <div class="flex items-center justify-between px-3 py-2 rounded-md {{ $isProductsActive ? 'text-[#0E4174] bg-blue-50/50 font-semibold' : 'text-slate-800 hover:bg-slate-50' }}">
                    <a href="{{ route('products') }}" class="flex-1 hover:text-blue-600">
                        Products
                    </a>
                    <button type="button" id="mobile-products-toggle"
                        class="p-1 text-slate-500 hover:text-blue-600 focus:outline-hidden"
                        aria-label="Toggle products accordion">
                        <svg id="mobile-products-chevron" class="w-4 h-4 text-slate-500 transition-transform duration-200"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>

                <div id="mobile-products-menu" class="hidden pl-4 pr-2 py-2 space-y-2 bg-slate-50/70 rounded-lg mt-1">
                    <a href="{{ route('products') }}"
                        class="block py-1.5 px-3 text-sm font-semibold text-[#1652f0] hover:text-blue-800">
                        View All Products
                    </a>
                    <div class="border-t border-slate-200 my-1"></div>
                    <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider">Substrates &amp; Media
                    </p>
                    @foreach ($productColumn1 as $item)
                        <a href="{{ $item['url'] }}" class="block py-1 px-3 text-sm text-slate-700 hover:text-blue-600">
                            {{ $item['title'] }}
                        </a>
                    @endforeach
                    <p class="px-3 pt-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">Labels &amp;
                        Print Solutions</p>
                    @foreach ($productColumn2 as $item)
                        <a href="{{ $item['url'] }}" class="block py-1 px-3 text-sm text-slate-700 hover:text-blue-600">
                            {{ $item['title'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="#industries"
                class="block px-3 py-2 rounded-md text-slate-800 hover:bg-slate-50 hover:text-blue-600">
                Industries
            </a>
            <a href="#blog" class="block px-3 py-2 rounded-md text-slate-800 hover:bg-slate-50 hover:text-blue-600">
                Blog &amp; News
            </a>
            <a href="#careers" class="block px-3 py-2 rounded-md text-slate-800 hover:bg-slate-50 hover:text-blue-600">
                Careers
            </a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-slate-800 hover:bg-slate-50 hover:text-blue-600">
                Contact
            </a>
        </div>
    </div>
</header>

<x-search-modal />