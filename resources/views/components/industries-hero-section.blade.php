{{--
Industries Page Hero Section
Displays the signature dark atmospheric hero banner with Polyplex crimson-to-blue glow gradient,
centered bold headline and descriptive industry narrative.

Customization:
<x-industries-hero-section headline="Solutions Designed for Diverse Industries"
    description="Polyplex DigiPrint brings together material expertise and printing industry knowledge to support a wide range of applications across commercial, industrial, retail and specialised printing environments." />
--}}
@props([
    'headline' => 'Solutions Designed for Diverse Industries',
    'description' => 'Polyplex DigiPrint brings together material expertise and printing industry knowledge to support a wide range of applications across commercial, industrial, retail and specialised printing environments.',
])

<section id="industries-hero"
    class="relative w-full py-[109px] sm:py-16 md:py-20 lg:py-[109px] overflow-hidden select-none" style="background: radial-gradient(ellipse 50% 120% at 0% 50%, rgba(163, 14, 30, 0.95) 0%, rgba(135, 10, 25, 0.7) 35%, rgba(4, 7, 16, 0) 70%),
               radial-gradient(ellipse 50% 120% at 100% 50%, rgba(14, 65, 116, 0.95) 0%, rgba(10, 48, 86, 0.7) 35%, rgba(4, 7, 16, 0) 70%),
               #040710;" aria-label="{{ $headline }}">

    {{-- Subtle Vignette / Edge Shading --}}
    <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/30 pointer-events-none"
        aria-hidden="true"></div>

    {{-- Ambient Glow Blurs for Enhanced Atmosphere --}}
    <div class="absolute -left-20 top-1/2 -translate-y-1/2 w-96 h-96 bg-red-700/30 rounded-full blur-3xl pointer-events-none"
        aria-hidden="true"></div>
    <div class="absolute -right-20 top-1/2 -translate-y-1/2 w-96 h-96 bg-[#0E4174]/40 rounded-full blur-3xl pointer-events-none"
        aria-hidden="true"></div>

    {{-- Content Container --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">

            {{-- Main Headline --}}
            <h1
                class="font-heading text-[32px] text-[#F3F3F3] font-[700] sm:text-3xl md:text-4xl lg:text-[32px] xl:text-[32px] tracking-tight leading-tight drop-shadow-[0_2px_12px_rgba(0,0,0,0.8)]">
                {{ $headline }}
            </h1>

            {{-- Subtitle / Narrative --}}
            @if (!empty($description))
                <p
                    class="mt-4 sm:mt-5 md:mt-6 font-sans text-[16px] font-[500] sm:text-base md:text-[17px] text-slate-200/90 leading-relaxed sm:leading-[1.65] max-w-[835px] mx-auto drop-shadow-[0_1px_4px_rgba(0,0,0,0.6)]">
                    {{ $description }}
                </p>
            @endif

        </div>
    </div>
</section>