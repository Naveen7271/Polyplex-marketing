@php
    $products = [
        [
            'id' => 'non-tear-media',
            'title' => 'Non-Tear Media',
            'title_lines' => ['Non-Tear', 'Media'],
            'description' => 'Durable Print Media for Demanding Digital Applications',
            'default_img' => 'images/product-non-tear.png',
            'alt' => 'Non-Tear Media luggage tag application',
            'category' => 'High Durability Synthetic Substrates',
            'link' => '#non-tear-media',
        ],
        [
            'id' => 'digital-labels',
            'title' => 'Digital Labels',
            'title_lines' => ['Digital Labels'],
            'description' => 'Self-Adhesive Solutions for High-Impact Packaging & Branding',
            'default_img' => 'images/product-digital-labels.png',
            'alt' => 'Digital Labels gourmet jar packaging application',
            'category' => 'Self-Adhesive Digital Press Labels',
            'link' => '#digital-labels',
        ],
        [
            'id' => 'multi-purpose-labels',
            'title' => 'Multi-Purpose Labels',
            'title_lines' => ['Multi-Purpose', 'Labels'],
            'description' => 'Versatile Commercial & Retail Labeling for Everyday Performance',
            'default_img' => 'images/product-multi-purpose.png',
            'alt' => 'Multi-Purpose Labels retail price tag application',
            'category' => 'Versatile Commercial & Retail Labeling',
            'link' => '#multi-purpose-labels',
        ],
        [
            'id' => 'inkjet-photo-media',
            'title' => 'Inkjet Photo Media',
            'title_lines' => ['Inkjet Photo', 'Media'],
            'description' => 'Gallery-Grade Archival Substrates for High-Fidelity Prints',
            'default_img' => 'images/product-inkjet-photo.png',
            'alt' => 'Inkjet Photo Media fine art gallery canvas display',
            'category' => 'Gallery-Grade Archival Photo Substrates',
            'link' => '#inkjet-photo-media',
        ],
    ];

@endphp

{{-- Products Showcase Section --}}
<section id="products" class="relative w-full py-[69px] sm:py-20 lg:py-[69px] overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0 pointer-events-none">
        <img src="{{ asset('images/products-showcase-bg.png') }}" alt="Products background"
            class="w-full h-full object-cover">
    </div>

    {{-- Content Container --}}
    <div class="relative z-10 max-w-[1352px] mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Headline: Montserrat Bold Centered --}}
        <div class="text-center max-w-4xl mx-auto">
            <h2
                class="font-heading font-[700] text-[32px] sm:text-3xl lg:text-[32px] text-white tracking-tight leading-snug drop-shadow-sm">
                Our Products are Engineered for Exceptional Results
            </h2>
        </div>

        {{-- 4 Product Cards Grid --}}
        <div
            class="mt-10 sm:mt-12 lg:mt-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-[20px] sm:gap-5 lg:gap-[20px] justify-items-center">
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
                    class="group relative w-full max-w-[323px] h-[392px] rounded-[5px] overflow-hidden border-[1px] border-[#FFFFFF] hover:border-white/70 transition-all duration-300 shadow-xl block bg-slate-950 focus:outline-none focus:ring-2 focus:ring-white/60">
                    {{-- Product Image --}}
                    <img src="{{ $cardImg }}" alt="{{ $prod['alt'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                        loading="lazy">

                    {{-- Subtle Dark Vignette Overlay for Text Legibility --}}
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/10 to-black/35 pointer-events-none group-hover:from-black/45 transition-colors duration-300">
                    </div>

                    {{-- Default Product Title Overlay (Top-Left, Montserrat Bold, White Text) --}}
                    <div class="absolute top-0 left-0 pt-[32px] px-[28px] z-10 text-left pointer-events-none group-hover:opacity-0 transition-opacity duration-300">
                        <h3
                            class="font-heading font-[700] text-[28px] sm:text-xl lg:text-[28px] text-white tracking-tight leading-tight drop-shadow-md">
                            @foreach ($prod['title_lines'] as $line)
                                <span class="block">{{ $line }}</span>
                            @endforeach
                        </h3>
                    </div>

                    {{-- Hover State Overlay: White background with Deep Navy Title & Black Description --}}
                    <div
                        class="absolute inset-0 z-20 bg-white pt-[32px] px-[28px] text-left opacity-0 group-hover:opacity-100 group-focus:opacity-100 transition-opacity duration-300 pointer-events-none flex flex-col justify-start">
                        <h3 class="font-heading font-[700] text-[28px] sm:text-xl lg:text-[28px] text-[#0E4174] tracking-tight leading-tight">
                            @foreach ($prod['title_lines'] as $line)
                                <span class="block">{{ $line }}</span>
                            @endforeach
                        </h3>

                        @if (!empty($prod['description'] ?? $prod['category'] ?? null))
                            <p class="mt-[22px] font-sans font-[700] text-[16px] text-black leading-snug max-w-[245px]">
                                {{ $prod['description'] ?? $prod['category'] }}
                            </p>
                        @endif
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