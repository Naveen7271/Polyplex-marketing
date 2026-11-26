@php
    $defaultProductCategories = [
        [
            'id' => 'non-tear-media',
            'title' => 'Non-Tear Media',
            'url' => route('products.show', 'non-tear-media'),
            'brands' => [
                ['name' => 'NovaLife', 'url' => route('products.show', 'novalife')],
                ['name' => 'NovaJet', 'url' => route('products.show', 'novajet')],
                ['name' => 'Saraprint', 'url' => route('products.show', 'saraprint')],
            ],
        ],
        [
            'id' => 'gloss-art-paper-media',
            'title' => 'Gloss Art Paper Media',
            'url' => route('products.show', 'gloss-art-paper-media'),
            'brands' => [
                ['name' => 'NovaLife', 'url' => route('products.show', 'novalife')],
            ],
        ],
        [
            'id' => 'inkjet-photo-media',
            'title' => 'Inkjet Photo Media',
            'url' => route('products.show', 'inkjet-photo-media'),
            'brands' => [
                ['name' => 'NovaJet', 'url' => route('products.show', 'novajet')],
            ],
        ],
        [
            'id' => 'digital-labels',
            'title' => 'Digital Labels',
            'url' => route('products.show', 'digital-labels'),
            'brands' => [
                ['name' => 'NovaStick', 'url' => route('products.show', 'novastick')],
            ],
        ],
        [
            'id' => 'multi-purpose-labels',
            'title' => 'Multi-Purpose Labels',
            'url' => route('products.show', 'multi-purpose-labels'),
            'brands' => [
                ['name' => 'NovaJet', 'url' => route('products.show', 'novajet')],
            ],
        ],
        [
            'id' => 'digital-wide-format-media',
            'title' => 'Digital Wide-Format Media',
            'url' => route('products.show', 'digital-wide-format-media'),
            'brands' => [
                ['name' => 'NovaJet', 'url' => route('products.show', 'novajet')],
                ['name' => 'NovaSign', 'url' => route('products.show', 'novasign')],
            ],
        ],
        [
            'id' => 'reprographic-media',
            'title' => 'Reprographic Media',
            'url' => route('products.show', 'reprographic-media'),
            'brands' => [
                ['name' => 'NovaCad', 'url' => route('products.show', 'novacad')],
                ['name' => 'NovaJet', 'url' => route('products.show', 'novajet')],
                ['name' => 'Saraprint', 'url' => route('products.show', 'saraprint')],
            ],
        ],
        [
            'id' => 'polyester-offset-plates',
            'title' => 'Polyester Offset Plates',
            'url' => route('products.show', 'polyester-offset-plates'),
            'brands' => [
                ['name' => 'NovaDom', 'url' => route('products.show', 'novadom')],
                ['name' => 'Saraprint', 'url' => route('products.show', 'saraprint')],
                ['name' => 'PoliJet', 'url' => route('products.show', 'polijet')],
            ],
        ],
        [
            'id' => 'laser-and-inkjet-positive-films',
            'title' => 'Laser and Inkjet Positive Films',
            'url' => route('products.show', 'laser-and-inkjet-positive-films'),
            'brands' => [
                ['name' => 'PosiJet', 'url' => route('products.show', 'posijet')],
                ['name' => 'NovaSharp', 'url' => route('products.show', 'novasharp')],
            ],
        ],
    ];

    try {
        $dbNavProducts = \Illuminate\Support\Facades\Schema::hasTable('products')
            && \Illuminate\Support\Facades\Schema::hasTable('brands')
            ? \App\Models\Product::with('brands')->where('is_active', true)->orderBy('sort_order')->get()
            : collect();
    } catch (\Throwable) {
        $dbNavProducts = collect();
    }

    if ($dbNavProducts->isNotEmpty()) {
        $productCategories = $dbNavProducts->map(function ($product) {
            return [
                'id' => $product->slug,
                'title' => $product->name,
                'url' => route('products.show', $product->slug),
                'brands' => $product->brands->map(function ($brand) {
                    return [
                        'name' => $brand->name,
                        'url' => route('products.show', $brand->slug),
                    ];
                })->values()->all(),
            ];
        })->values()->all();
    } else {
        $productCategories = $defaultProductCategories;
    }

    $defaultActiveCategoryId = $productCategories[0]['id'] ?? 'non-tear-media';
    foreach ($productCategories as $category) {
        if (request()->is('*' . $category['id'] . '*')) {
            $defaultActiveCategoryId = $category['id'];
            break;
        }
    }

    $productColumn1 = array_slice($productCategories, 0, 4);
    $productColumn2 = array_slice($productCategories, 4);

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
                <a href="{{ url('/') }}" class="focus:outline-none rounded-md py-1"
                    aria-label="Polyplex DigiPrint Home">
                    <x-logo />
                </a>
            </div>

            {{-- Center: Desktop Navigation Links --}}
            <nav class="hidden lg:flex items-center h-full space-x-7 xl:space-x-9 text-[16px] font-[500] font-normal text-[#000000]"
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
                <div class="relative group flex items-center h-full" id="products-menu-container">
                    <a href="{{ route('products') }}"
                        class="py-2 border-b transition-colors text-[16px] {{ $isProductsActive ? 'text-[#0E4174] border-[#0E4174] font-medium' : 'text-[#000000] border-transparent hover:text-blue-600' }}"
                        {!! $isProductsActive ? 'aria-current="page"' : '' !!}>
                        Products
                    </a>
                    <button type="button" id="products-menu-button"
                        class="py-2 pl-1 pr-1 text-slate-600 hover:text-blue-600 transition-colors focus:outline-hidden cursor-pointer"
                        aria-expanded="false" aria-haspopup="true" aria-label="Toggle products dropdown menu">
                        <svg id="products-menu-chevron"
                            class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    {{-- Products Dropdown Panel (Split Master-Detail) --}}
                    <div id="products-dropdown"
                        data-default-category="{{ $defaultActiveCategoryId }}"
                        class="absolute left-0 top-full w-[640px] xl:w-[680px] transition-all duration-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible pointer-events-none group-hover:pointer-events-auto group-focus-within:pointer-events-auto z-50"
                        role="menu" aria-orientation="vertical" aria-labelledby="products-menu-button">
                        <div
                            class="bg-white border border-[#DCDCDC] shadow-[0_12px_32px_rgba(0,0,0,0.08)] grid grid-cols-[310px_1fr] xl:grid-cols-[330px_1fr]">
                            {{-- Left Column: Product Categories --}}
                            <div class="bg-white border-r border-[#E2E2E2] divide-y divide-[#E2E2E2]">
                                @foreach ($productCategories as $category)
                                    @php
                                        $isDefaultActive = $category['id'] === $defaultActiveCategoryId;
                                    @endphp
                                    <a href="{{ $category['url'] }}"
                                        data-category-trigger="{{ $category['id'] }}"
                                        class="products-dropdown-category flex items-center justify-between px-6 py-3.5 text-[15px] font-normal leading-snug text-[#000000] transition-colors focus:outline-hidden {{ $isDefaultActive ? 'bg-[#E5E5E5] is-active' : 'bg-white hover:bg-[#E5E5E5]' }}">
                                        <span>{{ $category['title'] }}</span>
                                        <svg class="w-4 h-4 shrink-0 text-[#000000]" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </a>
                                @endforeach
                            </div>

                            {{-- Right Column: Brands for Active Category --}}
                            <div class="bg-[#EFEFEF]">
                                @foreach ($productCategories as $category)
                                    @php
                                        $isDefaultActive = $category['id'] === $defaultActiveCategoryId;
                                    @endphp
                                    <div data-category-panel="{{ $category['id'] }}"
                                        class="products-dropdown-panel flex flex-col {{ $isDefaultActive ? '' : 'hidden' }}">
                                        @foreach ($category['brands'] as $brand)
                                            <a href="{{ $brand['url'] }}"
                                                class="px-6 py-3.5 text-[15px] font-normal leading-snug text-[#000000] hover:text-[#0E4174] hover:bg-[#E5E5E5]/70 transition-colors focus:outline-hidden focus:bg-[#E5E5E5]/70">
                                                {{ $brand['name'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('industries') }}"
                    class="py-2 border-b transition-colors {{ request()->routeIs('industries') || request()->is('industries*') ? 'text-[#0E4174] border-[#0E4174] font-medium' : 'text-[#000000] border-transparent hover:text-blue-600' }}"
                    {!! request()->routeIs('industries') || request()->is('industries*') ? 'aria-current="page"' : '' !!}>
                    Industries
                </a>

                <a href="{{ route('blog') }}"
                    class="py-2 border-b transition-colors {{ request()->routeIs('blog*') || request()->routeIs('news*') || request()->is('blog*') || request()->is('news*') ? 'text-[#0E4174] border-[#0E4174] font-medium' : 'text-[#000000] border-transparent hover:text-blue-600' }}"
                    {!! request()->routeIs('blog*') || request()->routeIs('news*') || request()->is('blog*') || request()->is('news*') ? 'aria-current="page"' : '' !!}>
                    Blog &amp; News
                </a>

                <a href="{{ route('careers') }}"
                    class="py-2 border-b transition-colors {{ request()->routeIs('careers*') || request()->is('careers*') ? 'text-[#0E4174] border-[#0E4174] font-medium' : 'text-[#000000] border-transparent hover:text-blue-600' }}"
                    {!! request()->routeIs('careers*') || request()->is('careers*') ? 'aria-current="page"' : '' !!}>
                    Careers
                </a>

                <a href="{{ route('contact') }}"
                    class="py-2 border-b transition-colors {{ request()->routeIs('contact') || request()->is('contact*') ? 'text-[#0E4174] border-[#0E4174] font-medium' : 'text-[#000000] border-transparent hover:text-blue-600' }}"
                    {!! request()->routeIs('contact') || request()->is('contact*') ? 'aria-current="page"' : '' !!}>
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
                <div
                    class="flex items-center justify-between px-3 py-2 rounded-md {{ $isProductsActive ? 'text-[#0E4174] bg-blue-50/50 font-semibold' : 'text-slate-800 hover:bg-slate-50' }}">
                    <a href="{{ route('products') }}" class="flex-1 hover:text-blue-600">
                        Products
                    </a>
                    <button type="button" id="mobile-products-toggle"
                        class="p-1 text-slate-500 hover:text-blue-600 focus:outline-hidden"
                        aria-label="Toggle products accordion">
                        <svg id="mobile-products-chevron"
                            class="w-4 h-4 text-slate-500 transition-transform duration-200"
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
                        @php
                            $isMobileExpanded = $item['id'] === $defaultActiveCategoryId;
                        @endphp
                        <div class="product-category-accordion py-1 px-3">
                            <div class="flex items-center justify-between">
                                <a href="{{ $item['url'] }}" class="text-sm text-slate-700 hover:text-blue-600">
                                    {{ $item['title'] }}
                                </a>
                                @if (!empty($item['brands']))
                                    <button type="button"
                                        class="product-category-toggle p-1 text-slate-500 hover:text-blue-600 focus:outline-hidden"
                                        aria-expanded="{{ $isMobileExpanded ? 'true' : 'false' }}">
                                        <svg class="w-3.5 h-3.5 transition-transform duration-200 {{ $isMobileExpanded ? 'rotate-180' : '' }} product-category-chevron"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                            @if (!empty($item['brands']))
                                <div
                                    class="product-category-brands {{ $isMobileExpanded ? '' : 'hidden' }} pt-1 text-xs text-slate-500 flex items-center flex-wrap">
                                    @foreach ($item['brands'] as $brandIndex => $brand)
                                        <a href="{{ $brand['url'] }}" class="hover:text-blue-600">
                                            {{ $brand['name'] }}
                                        </a>
                                        @if ($brandIndex < count($item['brands']) - 1)
                                            <span class="mx-1 text-slate-300">|</span>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                    <p class="px-3 pt-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">Labels &amp;
                        Print Solutions</p>
                    @foreach ($productColumn2 as $item)
                        @php
                            $isMobileExpanded = $item['id'] === $defaultActiveCategoryId;
                        @endphp
                        <div class="product-category-accordion py-1 px-3">
                            <div class="flex items-center justify-between">
                                <a href="{{ $item['url'] }}" class="text-sm text-slate-700 hover:text-blue-600">
                                    {{ $item['title'] }}
                                </a>
                                @if (!empty($item['brands']))
                                    <button type="button"
                                        class="product-category-toggle p-1 text-slate-500 hover:text-blue-600 focus:outline-hidden"
                                        aria-expanded="{{ $isMobileExpanded ? 'true' : 'false' }}">
                                        <svg class="w-3.5 h-3.5 transition-transform duration-200 {{ $isMobileExpanded ? 'rotate-180' : '' }} product-category-chevron"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                            @if (!empty($item['brands']))
                                <div
                                    class="product-category-brands {{ $isMobileExpanded ? '' : 'hidden' }} pt-1 text-xs text-slate-500 flex items-center flex-wrap">
                                    @foreach ($item['brands'] as $brandIndex => $brand)
                                        <a href="{{ $brand['url'] }}" class="hover:text-blue-600">
                                            {{ $brand['name'] }}
                                        </a>
                                        @if ($brandIndex < count($item['brands']) - 1)
                                            <span class="mx-1 text-slate-300">|</span>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('industries') }}"
                class="block px-3 py-2 rounded-md {{ request()->routeIs('industries') || request()->is('industries*') ? 'text-[#0E4174] font-medium bg-slate-50' : 'text-slate-800 hover:bg-slate-50 hover:text-blue-600' }}"
                {!! request()->routeIs('industries') || request()->is('industries*') ? 'aria-current="page"' : '' !!}>
                Industries
            </a>
            <a href="{{ route('blog') }}"
                class="block px-3 py-2 rounded-md {{ request()->routeIs('blog*') || request()->routeIs('news*') || request()->is('blog*') || request()->is('news*') ? 'text-[#0E4174] font-medium bg-slate-50' : 'text-slate-800 hover:bg-slate-50 hover:text-blue-600' }}"
                {!! request()->routeIs('blog*') || request()->routeIs('news*') || request()->is('blog*') || request()->is('news*') ? 'aria-current="page"' : '' !!}>
                Blog &amp; News
            </a>
            <a href="{{ route('careers') }}"
                class="block px-3 py-2 rounded-md {{ request()->routeIs('careers*') || request()->is('careers*') ? 'text-[#0E4174] font-medium bg-slate-50' : 'text-slate-800 hover:bg-slate-50 hover:text-blue-600' }}"
                {!! request()->routeIs('careers*') || request()->is('careers*') ? 'aria-current="page"' : '' !!}>
                Careers
            </a>
            <a href="{{ route('contact') }}"
                class="block px-3 py-2 rounded-md {{ request()->routeIs('contact') || request()->is('contact*') ? 'text-[#0E4174] font-medium bg-slate-50' : 'text-slate-800 hover:bg-slate-50 hover:text-blue-600' }}"
                {!! request()->routeIs('contact') || request()->is('contact*') ? 'aria-current="page"' : '' !!}>
                Contact
            </a>
        </div>
    </div>
</header>

<x-search-modal />