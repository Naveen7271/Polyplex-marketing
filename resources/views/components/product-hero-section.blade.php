{{--
Product Page Hero Section
Displays the dramatic branded hero banner with "PRODUCTS" category overline,
decorative underline, and the bold headline "Our Products are Engineered for Exceptional Results".

Customization:
Pass custom background image, badge, or headline via props:
<x-product-hero-section background-image="images/product-hero-bg.jpg" badge="PRODUCTS"
    headline="Our Products are Engineered for Exceptional Results" />
--}}
@props([
    'backgroundImage' => 'images/product-hero-bg.jpg',
    'badge' => 'PRODUCTS',
    'headline' => 'Our Products are Engineered for Exceptional Results',
    'alt' => 'Polyplex DigiPrint - Our Products are Engineered for Exceptional Results',
])

<section id="product-hero-section"
    class="product-hero-container relative w-full min-h-[514px] sm:min-h-[514px] md:min-h-[400px] lg:min-h-[514px] xl:min-h-[514px] bg-slate-950 overflow-hidden select-none flex items-center"
    aria-label="{{ $badge }} - {{ $headline }}">

    {{-- Background Image with Atmospheric Lighting & Vignette --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset($backgroundImage) }}" alt="{{ $alt }}"
            class="w-full h-full object-cover object-center pointer-events-none" loading="eager" fetchpriority="high" />

        {{-- Subtle Vignette / Edge Shading to enhance contrast while keeping central red glow --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-transparent to-black/40 pointer-events-none"
            aria-hidden="true"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/20 pointer-events-none"
            aria-hidden="true"></div>
    </div>

    {{-- Content Container --}}
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 xl:px-16 py-14 sm:py-16 md:py-20 lg:py-24">
        <div class="max-w-3xl">

            {{-- Category Label / Overline with Decorative Underline --}}
            <div class="inline-flex flex-col items-start mb-4 sm:mb-5">
                <span
                    class="font-heading text-[16px] font-[500] text-[#F3F3F3] sm:text-sm  tracking-[0.2em] uppercase ">
                    {{ $badge }}
                </span>
                <span class="w-8 sm:w-10 h-[1.5px] bg-white/80 mt-1.5 sm:mt-2" aria-hidden="true"></span>
            </div>

            {{-- Main Headline --}}
            <h1
                class="font-heading font-[700] text-[40px] text-[#F3F3F3] sm:text-4xl md:text-[40px] lg:text-[40px] xl:text-[44px] text-white tracking-tight leading-[1.2] sm:leading-[1.18]">
                @if (str_contains($headline, 'for Exceptional Results'))
                    <span>{{ str_replace(' for Exceptional Results', '', $headline) }}</span>
                    <span class="block mt-1 sm:mt-0 lg:block">for Exceptional Results</span>
                @else
                    {{ $headline }}
                @endif
            </h1>

        </div>
    </div>

</section>