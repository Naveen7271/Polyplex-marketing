{{--
Product Gallery Carousel Section ("A Closer Look at the Product")
Displays an interactive full-width peek carousel with rounded slide cards,
custom dot pagination, next/prev arrow controls, and touch swipe gestures.

Customization:
Replace slide images in public/images/products/gallery/ (slide-1.jpg, slide-2.jpg, ...)
or pass a custom array via the :slides prop:
<x-product-gallery-section overline="GALLERY" title="A Closer Look at the Product" :slides="$customSlides" />
--}}
@props([
    'overline' => 'GALLERY',
    'title' => 'A Closer Look at the Product',
    'slides' => null,
])

@php
    $defaultSlides = [
        [
            'image' => 'images/products/gallery/slide-1.jpg',
            'alt' => 'A closer look at Non-Tear Media print inspection and precision handling',
        ],
        [
            'image' => 'images/products/gallery/slide-2.jpg',
            'alt' => 'A closer look at specialty media lookbook and editorial presentation',
        ],
        [
            'image' => 'images/products/gallery/slide-3.jpg',
            'alt' => 'A closer look at high-durability luggage tags and tear-resistant applications',
        ],
        [
            'image' => 'images/products/gallery/slide-4.jpg',
            'alt' => 'A closer look at self-adhesive labels and gourmet food packaging',
        ],
    ];

    $items = $slides ?? $defaultSlides;
@endphp

<section id="product-gallery-section"
    class="relative w-full py-[60px] sm:py-[60px] lg:py-24 bg-white overflow-hidden select-none"
    aria-labelledby="product-gallery-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header: Overline + Centered Navy Heading --}}
        <div class="text-center mb-10 sm:mb-12 lg:mb-14">
            <span
                class="text-[16px] font-[500] sm:text-sm font-semibold tracking-[4.56px] uppercase tracking-relaxed text-[#1E1E1E] font-sans block mb-2 sm:mb-2.5">
                {{ $overline }}
            </span>
            <h2 id="product-gallery-heading"
                class="font-heading font-[700] text-[32px] sm:text-3xl md:text-[32px] lg:text-[32px] text-[#0E4174] tracking-tight">
                {{ $title }}
            </h2>
        </div>

    </div>

    {{-- Carousel Track Container with Peek Effect --}}
    <div id="product-gallery-carousel-container"
        class="relative w-full overflow-hidden py-4 cursor-grab active:cursor-grabbing">
        <div id="product-gallery-carousel-track"
            class="flex items-center transition-transform duration-500 ease-out will-change-transform">
            @foreach ($items as $idx => $slide)
                {{-- Individual Slide Card Wrapper --}}
                <div class="product-gallery-slide-wrapper w-[843px] rounded-[10px] h-[547px] sm:w-[68%] md:w-[60%] lg:w-[843px] h-[547px] rounded-[10px] max-w-4xl shrink-0 px-2 sm:px-3 lg:px-4 transition-all duration-500 ease-out"
                    data-slide-index="{{ $idx }}">

                    <div
                        class="product-gallery-slide-card relative aspect-16/10 rounded-[10px] sm:rounded-[10px] overflow-hidden shadow-xl transition-all duration-500 ease-out bg-slate-900 select-none {{ $idx === 0 ? 'scale-100 opacity-100 z-20 shadow-2xl' : 'scale-[0.92] opacity-80 hover:opacity-95 z-10 cursor-pointer' }}">
                        <img src="{{ asset($slide['image']) }}"
                            alt="{{ $slide['alt'] ?? ($title . ' image ' . ($idx + 1)) }}"
                            class="w-full h-full object-cover object-center pointer-events-none transition-transform duration-700 ease-out"
                            loading="{{ $idx === 0 ? 'eager' : 'lazy' }}" />
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    {{-- Carousel Controls: Dots + Next Chevron Button matching mockup --}}
    <div class="flex items-center justify-center gap-3 sm:gap-4 mt-6 sm:mt-8 select-none">

        {{-- Previous Arrow (Hidden initially on slide 0) --}}
        <button id="product-gallery-prev-btn" type="button"
            class="w-7 h-7 rounded-full flex items-center justify-center text-slate-700 hover:text-slate-950 transition-all focus:outline-hidden disabled:opacity-0 disabled:pointer-events-none"
            aria-label="Previous gallery slide" disabled>
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6" />
            </svg>
        </button>

        {{-- Dot Indicators (• • • •) --}}
        <div id="product-gallery-dots-container" class="flex items-center gap-2">
            @foreach ($items as $idx => $slide)
                <button type="button"
                    class="product-gallery-dot transition-all duration-300 rounded-full {{ $idx === 0 ? 'w-2 h-2 bg-slate-900' : 'w-2 h-2 bg-slate-300 hover:bg-slate-400' }}"
                    data-index="{{ $idx }}" aria-label="Go to slide {{ $idx + 1 }}">
                </button>
            @endforeach
        </div>

        {{-- Next Chevron Arrow (>) --}}
        <button id="product-gallery-next-btn" type="button"
            class="w-7 h-7 rounded-full flex items-center justify-center text-slate-700 hover:text-slate-950 transition-all focus:outline-hidden disabled:opacity-30 disabled:pointer-events-none"
            aria-label="Next gallery slide">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6" />
            </svg>
        </button>

    </div>

</section>