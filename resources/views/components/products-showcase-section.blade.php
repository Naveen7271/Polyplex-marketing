@php
    $products = [
        [
            'id' => 'non-tear-media',
            'title' => 'Non-Tear Media',
            'title_lines' => ['Non-Tear', 'Media'],
            'default_img' => 'images/product-non-tear.png',
            'alt' => 'Non-Tear Media luggage tag application',
            'category' => 'High Durability Synthetic Substrates',
            'link' => '#non-tear-media',
        ],
        [
            'id' => 'digital-labels',
            'title' => 'Digital Labels',
            'title_lines' => ['Digital Labels'],
            'default_img' => 'images/product-digital-labels.png',
            'alt' => 'Digital Labels gourmet jar packaging application',
            'category' => 'Self-Adhesive Digital Press Labels',
            'link' => '#digital-labels',
        ],
        [
            'id' => 'multi-purpose-labels',
            'title' => 'Multi-Purpose Labels',
            'title_lines' => ['Multi-Purpose', 'Labels'],
            'default_img' => 'images/product-multi-purpose.png',
            'alt' => 'Multi-Purpose Labels retail price tag application',
            'category' => 'Versatile Commercial & Retail Labeling',
            'link' => '#multi-purpose-labels',
        ],
        [
            'id' => 'inkjet-photo-media',
            'title' => 'Inkjet Photo Media',
            'title_lines' => ['Inkjet Photo', 'Media'],
            'default_img' => 'images/product-inkjet-photo.png',
            'alt' => 'Inkjet Photo Media fine art gallery canvas display',
            'category' => 'Gallery-Grade Archival Photo Substrates',
            'link' => '#inkjet-photo-media',
        ],
    ];

@endphp

{{-- Products Showcase Section --}}
<section id="products"
    class="relative w-full py-16 sm:py-20 lg:py-24 overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0 pointer-events-none">
        <img src="{{ asset('images/products-showcase-bg.png') }}" alt="Products background"
            class="w-full h-full object-cover">
    </div>

    {{-- Content Container --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Headline: Montserrat Bold Centered --}}
        <div class="text-center max-w-4xl mx-auto">
            <h2
                class="font-heading font-bold text-2xl sm:text-3xl lg:text-[38px] text-white tracking-tight leading-snug drop-shadow-sm">
                Our Products are Engineered for Exceptional Results
            </h2>
        </div>

        {{-- 4 Product Cards Grid --}}
        <div class="mt-10 sm:mt-12 lg:mt-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">
            @foreach ($products as $prod)
                @php
                    // Check if custom uploaded product image exists
                    $customImg = null;
                    foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                        $candidate = "images/product-{$prod['id']}.{$ext}";
                        if (file_exists(public_path($candidate))) {
                            $customImg = asset($candidate);
                            break;
                        }
                    }
                    $cardImg = $customImg ?? asset($prod['default_img']);
                @endphp

                <a href="{{ $prod['link'] }}"
                    class="group relative aspect-4/5 sm:aspect-square lg:aspect-4/5 rounded-xl overflow-hidden border border-white/20 hover:border-white/70 transition-all duration-300 shadow-xl block bg-slate-950 focus:outline-none focus:ring-2 focus:ring-white/60">
                    {{-- Product Image --}}
                    <img src="{{ $cardImg }}" alt="{{ $prod['alt'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                        loading="lazy">

                    {{-- Subtle Dark Vignette Overlay for Text Legibility --}}
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/10 to-black/35 pointer-events-none group-hover:from-black/45 transition-colors duration-300">
                    </div>

                    {{-- Product Title Overlay (Top-Left, Montserrat Bold) --}}
                    <div class="absolute top-0 left-0 p-4 sm:p-5 lg:p-6 z-10 text-left pointer-events-none">
                        <h3
                            class="font-heading font-bold text-lg sm:text-xl lg:text-[22px] text-white tracking-tight leading-tight drop-shadow-md">
                            @foreach ($prod['title_lines'] as $line)
                                <span class="block">{{ $line }}</span>
                            @endforeach
                        </h3>
                    </div>

                    {{-- Hover arrow pill --}}
                    <div
                        class="absolute bottom-3.5 right-3.5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/25 backdrop-blur-md rounded-full p-2 text-white shadow-md">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Centered Explore All Products Button --}}
        <div class="mt-10 sm:mt-12 lg:mt-14 flex justify-center">
            <a href="#all-products"
                class="inline-flex items-center justify-center bg-white text-slate-900 font-sans font-semibold text-sm sm:text-base px-8 sm:px-10 py-3 rounded-md shadow-md hover:bg-slate-100 hover:shadow-xl hover:scale-[1.02] active:scale-[0.99] transition-all duration-200">
                Explore All Products
            </a>
        </div>

    </div>
</section>