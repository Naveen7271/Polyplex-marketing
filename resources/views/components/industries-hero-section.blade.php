{{--
Industries Page Hero Section
Displays the signature dark crimson-to-blue atmospheric hero banner with centered title,
overlapping circular badge with navy side arcs, and descriptive industry narrative.

Customization:
<x-industries-hero-section
    headline="Industries"
    badge-heading="Solutions for the\nWay Your Industry\nPrints."
    badge-subtitle="Explore media by the work you create."
    description="Different industries use print for different purposes..." />
--}}
@props([
    'headline' => 'Industries',
    'badgeHeading' => "Solutions for the\nWay Your Industry\nPrints.",
    'badgeSubtitle' => 'Explore media by the work you create.',
    'description' => 'Different industries use print for different purposes—from brand presentation and photography to labels, technical drawings and operational identification. Explore typical applications and connect with our team to determine which approved Polyplex DigiPrint product grades suit your workflow.',
])

<section id="industries-hero" class="relative w-full select-none" aria-label="{{ $headline }}">

    {{-- Top Atmospheric Banner Area with Centered Title --}}
    <div class="relative w-full h-64 sm:h-72 md:h-80 lg:h-[360px] xl:h-[380px] overflow-hidden flex items-center justify-center"
        style="background: radial-gradient(ellipse 55% 110% at 0% 65%, rgba(135, 8, 25, 0.95) 0%, rgba(135, 8, 25, 0.45) 38%, rgba(2, 6, 14, 0) 72%),
                   radial-gradient(ellipse 60% 115% at 100% 45%, rgba(8, 59, 112, 0.95) 0%, rgba(8, 59, 112, 0.5) 40%, rgba(2, 6, 14, 0) 75%),
                   #03060D;">

        {{-- Subtle Vignette / Edge Shading --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/30 pointer-events-none"
            aria-hidden="true"></div>

        {{-- Centered Page Title --}}
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 text-center">
            <h1
                class="font-heading font-[600] text-[36px] sm:text-4xl md:text-5xl lg:text-[48px] text-white tracking-tight leading-tight drop-shadow-[0_2px_12px_rgba(0,0,0,0.85)]">
                {{ $headline }}
            </h1>
        </div>
    </div>

    {{-- Bottom Content Area (#F3F3F3) with Overlapping Circular Badge & Narrative --}}
    <div class="relative bg-[#F3F3F3] pt-10 pb-14 sm:pb-16 lg:py-[60px] border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                {{-- Left: Overlapping Circular Badge --}}
                <div
                    class="lg:col-span-5 flex justify-center lg:justify-start -mt-28 sm:-mt-36 md:-mt-40 lg:-mt-[175px] xl:-mt-[185px] relative z-20">
                    <div
                        class="relative w-[300px] h-[300px] sm:w-[350px] sm:h-[350px] md:w-[380px] md:h-[380px] xl:w-[400px] xl:h-[400px] shrink-0 bg-white rounded-full shadow-2xl flex flex-col items-center justify-center p-8 sm:p-10 md:p-12 text-center border border-slate-100">

                        {{-- Deep Navy Blue Side Borders / Arcs --}}
                        <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 424 424"
                            fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            {{-- Left Blue Border Arc --}}
                            <path d="M 127 39.84 A 192 192 0 0 0 127 384.16 L 127 363.83 A 174 174 0 0 1 127 60.17 Z"
                                fill="#0E4174" />
                            {{-- Right Blue Border Arc --}}
                            <path d="M 297 39.84 A 192 192 0 0 1 297 384.16 L 297 363.83 A 174 174 0 0 0 297 60.17 Z"
                                fill="#0E4174" />
                        </svg>

                        {{-- Circle Text Content --}}
                        <div class="relative z-10 flex flex-col items-center justify-center px-2">
                            <h2
                                class="font-heading font-[600] text-[20px] sm:text-[22px] lg:text-[23px] leading-snug text-[#0E4174] tracking-tight max-w-[260px]">
                                @if (is_array($badgeHeading))
                                    @foreach ($badgeHeading as $line)
                                        <span class="block">{{ $line }}</span>
                                    @endforeach
                                @elseif (str_contains($badgeHeading, "\n"))
                                    @foreach (explode("\n", $badgeHeading) as $line)
                                        <span class="block">{{ trim($line) }}</span>
                                    @endforeach
                                @else
                                    {{ $badgeHeading }}
                                @endif
                            </h2>

                            @if (!empty($badgeSubtitle))
                                <p
                                    class="font-sans font-[500] text-[13px] sm:text-[13.5px] leading-relaxed text-[#1E1E1E] max-w-[250px] mt-3">
                                    {{ $badgeSubtitle }}
                                </p>
                            @endif
                        </div>

                    </div>
                </div>

                {{-- Right: Industry Narrative Description --}}
                <div class="lg:col-span-7 pt-2 lg:pt-0">
                    @if (!empty($description))
                        <p
                            class="font-sans font-[400] text-[15px] sm:text-[16px] text-[#1E1E1E] leading-[1.65] max-w-[700px]">
                            {{ $description }}
                        </p>
                    @endif
                </div>

            </div>
        </div>
    </div>

</section>
