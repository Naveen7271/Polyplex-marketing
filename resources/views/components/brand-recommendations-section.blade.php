{{--
Brand Recommendations Section ("You Might Also Like")
Displays a 3-card grid of recommended companion brands on white cards,
set against Polyplex's signature atmospheric dark gradient background with branded red and blue glow orbs,
and an "Explore all brands" outline CTA button.

Customization:
<x-brand-recommendations-section 
    :title="$title" 
    :brands="$recommendedBrands" 
    :explore-url="$exploreUrl" 
    :explore-text="$exploreText" 
/>
--}}
@props([
    'title' => 'You Might Also Like',
    'brands' => null,
    'exploreUrl' => url('/products'),
    'exploreText' => 'Explore all brands',
])

@php
    $defaultBrands = [
        [
            'id' => 'novacad',
            'name' => 'NovaCad',
            'subtitle' => 'Reprographic Media',
            'logo' => 'images/brands/logos/novacad.png',
            'alt' => 'NovaCad - Reprographic Media',
            'url' => route('products.show', 'novacad'),
        ],
        [
            'id' => 'novadom',
            'name' => 'NovaDom',
            'subtitle' => 'Desktop Offset Plate',
            'logo' => 'images/brands/logos/novadom.png',
            'alt' => 'NovaDom - Desktop Offset Plate',
            'url' => route('products.show', 'novadom'),
        ],
        [
            'id' => 'novajet',
            'name' => 'NovaJet',
            'subtitle' => 'Digital Wide Format Media',
            'logo' => 'images/brands/logos/novajet-wide.png',
            'alt' => 'NovaJet - Digital Wide Format Media',
            'url' => route('products.show', 'novajet'),
        ],
    ];

    $items = $brands ?? $defaultBrands;
@endphp

<section id="brand-recommendations" class="relative w-full py-16 sm:py-20 lg:py-24 overflow-hidden select-none"
    style="background: radial-gradient(ellipse 70% 80% at 75% 25%, rgba(14, 65, 116, 0.6) 0%, rgba(4, 7, 16, 0) 65%),
               radial-gradient(ellipse 65% 75% at 85% 75%, rgba(185, 28, 28, 0.55) 0%, rgba(4, 7, 16, 0) 65%),
               #040710;"
    aria-labelledby="brand-recommendations-heading">

    {{-- Atmospheric Ambient Glow Orbs --}}
    <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"
        aria-hidden="true"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-red-600/25 rounded-full blur-3xl pointer-events-none"
        aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Heading: You Might Also Like --}}
        <div class="text-center mb-10 sm:mb-12 lg:mb-14">
            <h2 id="brand-recommendations-heading"
                class="font-heading font-semibold text-[26px] sm:text-3xl md:text-[32px] text-white tracking-tight drop-shadow-[0_2px_12px_rgba(0,0,0,0.8)]">
                {{ $title }}
            </h2>
        </div>

        {{-- Centered 3 Brand Cards Grid --}}
        <div class="max-w-4xl lg:max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7 lg:gap-8 justify-center">
            @foreach ($items as $brand)
                <a href="{{ $brand['url'] ?? '#' . $brand['id'] }}" id="recommendation-brand-card-{{ $brand['id'] }}"
                    class="group relative bg-white rounded-[6px] p-6 sm:p-7 min-h-[200px] flex flex-col items-center justify-center text-center shadow-md hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 focus:outline-hidden focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-slate-900 cursor-pointer">

                    {{-- Brand Logo Graphic --}}
                    <div class="flex items-center justify-center h-11 w-full px-2">
                        @if (!empty($brand['logo']))
                            <img src="{{ asset($brand['logo']) }}" alt="{{ $brand['alt'] ?? $brand['name'] }}"
                                class="max-h-10 sm:max-h-11 w-auto max-w-[175px] object-contain transition-transform duration-300 group-hover:scale-105"
                                loading="lazy" />
                        @else
                            <span class="font-heading font-bold text-xl sm:text-2xl text-red-600">
                                {{ $brand['name'] }}
                            </span>
                        @endif
                    </div>

                    {{-- Brand Subtitle --}}
                    <p class="mt-3 font-sans text-xs sm:text-[13px] text-slate-800 font-normal tracking-tight text-center leading-snug">
                        {{ $brand['subtitle'] }}
                    </p>
                </a>
            @endforeach
        </div>

        {{-- Centered Outline Button: Explore all brands --}}
        @if (!empty($exploreText) && !empty($exploreUrl))
            <div class="text-center mt-10 sm:mt-12 lg:mt-14">
                <a href="{{ $exploreUrl }}"
                    class="inline-flex items-center justify-center px-6 py-2.5 sm:px-7 sm:py-2.5 rounded-[4px] border border-white/60 hover:border-white text-white font-sans text-sm font-medium hover:bg-white hover:text-[#040710] transition-all duration-200 shadow-sm focus:outline-hidden focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-slate-950">
                    <span>{{ $exploreText }}</span>
                </a>
            </div>
        @endif

    </div>
</section>
