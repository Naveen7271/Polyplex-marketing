{{--
About Us Hero Section with Smooth Split-Image Hover Expand Effect

Background Images:
Replace 'images/about-hero-1.png' and 'images/about-hero-2.png' in public/images/
or pass custom paths via props:
<x-about-hero-section image-left="images/your-left.png" image-right="images/your-right.png" />
--}}
@props([
    'imageLeft' => 'images/about-hero-1.png',
    'imageRight' => 'images/about-hero-2.png',
    'altLeft' => 'Polyplex DigiPrint Manufacturing Facility',
    'altRight' => 'Polyplex DigiPrint Technology & Innovation Hub',
    'headline' => 'Two Legacies. One Purpose: Better Possibilities in Print.',
])

{{-- About Us Hero Section with Smooth Split-Image Hover Expand Effect --}}
<section id="about-hero-section"
    class="about-hero-container relative w-full h-[580px] sm:h-[520px] md:h-[499px] lg:h-[499px] bg-slate-950 overflow-hidden select-none flex flex-col md:flex-row"
    aria-label="About Polyplex DigiPrint">
    {{-- Top Panel on Mobile / Left Panel on Desktop (Manufacturing Legacy) --}}
    <div id="about-hero-panel-left"
        class="about-hero-panel about-hero-panel-left group relative h-1/2 md:h-full w-full md:w-1/2 flex-1 overflow-hidden md:cursor-pointer"
        tabindex="0" role="region" aria-label="Manufacturing and Production Legacy">
        {{-- Background Image 1 (User can update $imageLeft or replace public/images/about-hero-1.png) --}}
        <img src="{{ asset($imageLeft) }}" alt="{{ $altLeft }}"
            class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-1000 ease-[cubic-bezier(0.25,1,0.5,1)] md:group-hover:scale-105 will-change-transform"
            loading="eager" />

        {{-- Tint Overlay --}}
        <div class="absolute inset-0 bg-[#010B15B0]"></div>
    </div>

    {{-- Center Dividing Seam (Horizontal on mobile, vertical on desktop) --}}
    <div id="about-hero-divider"
        class="about-hero-divider absolute left-0 right-0 top-1/2 -translate-y-1/2 h-[1px] w-full bg-white/20 md:top-0 md:bottom-0 md:left-1/2 md:right-auto md:-translate-x-1/2 md:translate-y-0 md:w-[1.5px] md:h-full z-15 pointer-events-none transition-opacity duration-500 shadow-[0_0_8px_rgba(255,255,255,0.2)]"
        aria-hidden="true"></div>

    {{-- Bottom Panel on Mobile / Right Panel on Desktop (Corporate and Global Reach) --}}
    <div id="about-hero-panel-right"
        class="about-hero-panel about-hero-panel-right group relative h-1/2 md:h-full w-full md:w-1/2 flex-1 overflow-hidden md:cursor-pointer"
        tabindex="0" role="region" aria-label="Corporate and Global Reach">
        {{-- Background Image 2 (User can update $imageRight or replace public/images/about-hero-2.png) --}}
        <img src="{{ asset($imageRight) }}" alt="{{ $altRight }}"
            class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-1000 ease-[cubic-bezier(0.25,1,0.5,1)] md:group-hover:scale-105 will-change-transform"
            loading="eager" />

        {{-- Tint Overlay --}}
        <div class="absolute inset-0 bg-[#010B15B0]"></div>
    </div>

    {{-- Floating Text Content Overlay (pointer-events-none ensures hover passes through to background images) --}}
    <div class="absolute inset-0 z-20 flex items-center justify-center pointer-events-none">
        <div class="w-full max-w-full px-6 py-8 sm:px-8 md:px-[108px] md:py-[174px]">
            <div class="max-w-full text-center">
                <h1
                    class="font-heading max-w-[1255px] mx-auto sm:max-w-none md:max-w-[1255px] font-[600] text-[26px] min-[360px]:text-[28px] min-[400px]:text-[32px] sm:text-3xl md:text-[36px] lg:text-[40px] xl:text-[40px] text-[#F3F3F3] text-center tracking-tight leading-[1.28] sm:leading-[1.28] drop-shadow-[0_2px_12px_rgba(0,0,0,0.7)]">
                    {{ $headline }}
                </h1>
            </div>
        </div>
    </div>
</section>