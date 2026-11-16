{{--
About Us Hero Section with Smooth Split-Image Hover Expand Effect

Background Images:
Replace 'images/about-hero-1.jpg' and 'images/about-hero-2.jpg' in public/images/
or pass custom paths via props:
<x-about-hero-section image-left="images/your-left.jpg" image-right="images/your-right.jpg" />
--}}
@props([
    'imageLeft' => 'images/about-hero-1.png',
    'imageRight' => 'images/about-hero-2.png',
    'altLeft' => 'Polyplex DigiPrint Manufacturing Facility',
    'altRight' => 'Polyplex DigiPrint Technology & Innovation Hub',
    'headline' => 'For over 55 years, we’ve built on a legacy of innovation, taking our own approach to creating print solutions that make a meaningful impact.',
])

{{-- About Us Hero Section with Smooth Split-Image Hover Expand Effect --}}
<section id="about-hero-section"
    class="about-hero-container relative w-full h-[499px] sm:h-[500px] md:h-[499px] lg:h-[499px] bg-slate-950 overflow-hidden select-none flex"
    aria-label="About Polyplex DigiPrint">
    {{-- Left Image Panel (Default: 50% width; On hover: expands to 100% full width smoothly covering right image) --}}
    <div id="about-hero-panel-left"
        class="about-hero-panel about-hero-panel-left group relative h-full flex-1 w-1/2 overflow-hidden cursor-pointer"
        tabindex="0" role="region" aria-label="Manufacturing and Production Legacy">
        {{-- Background Image 1 (User can update $imageLeft or replace public/images/about-hero-1.jpg) --}}
        <img src="{{ asset($imageLeft) }}" alt="{{ $altLeft }}"
            class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-1000 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-105 will-change-transform"
            loading="eager" />

        {{-- Tint Overlay --}}
        <div class="absolute inset-0 bg-[#010B15B0]"></div>
    </div>

    {{-- Center Vertical Dividing Seam (Fades out smoothly when either image expands) --}}
    <!-- <div id="about-hero-divider"
        class="about-hero-divider absolute top-0 bottom-0 left-1/2 -translate-x-1/2 w-[1.5px] bg-white/25 z-15 pointer-events-none transition-opacity duration-500 shadow-[0_0_8px_rgba(255,255,255,0.2)]"
        aria-hidden="true"></div> -->

    {{-- Right Image Panel (Default: 50% width; On hover: expands to 100% full width smoothly covering left image) --}}
    <div id="about-hero-panel-right"
        class="about-hero-panel about-hero-panel-right group relative h-full flex-1 w-1/2 overflow-hidden cursor-pointer"
        tabindex="0" role="region" aria-label="Corporate and Global Reach">
        {{-- Background Image 2 (User can update $imageRight or replace public/images/about-hero-2.jpg) --}}
        <img src="{{ asset($imageRight) }}" alt="{{ $altRight }}"
            class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-1000 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-105 will-change-transform"
            loading="eager" />

        {{-- Tint Overlay --}}
        <div class="absolute inset-0 bg-[#010B15B0]"></div>
    </div>

    {{-- Floating Text Content Overlay (pointer-events-none ensures hover passes through to background images) --}}
    <div class="absolute inset-0 z-20 flex items-center pointer-events-none">
        <div class="max-w-full px-[108px] py-[174px] sm:px-6 lg:px-[108px]">
            <div class="max-w-full">
                <h1
                    class="font-heading max-w-[1022px] font-[600] text-[40px] sm:text-3xl md:text-[36px] lg:text-[40px] xl:text-[40px] text-[#F3F3F3] tracking-tight leading-[1.28] sm:leading-[1.28] drop-shadow-[0_2px_12px_rgba(0,0,0,0.7)]">
                    {{ $headline }}
                </h1>
            </div>
        </div>
    </div>


</section>