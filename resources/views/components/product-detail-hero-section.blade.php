{{--
Individual Product Hero Section
Displays the top banner with the centered product title, and an overlapping
circular badge with signature Polyplex Navy side arcs, descriptive narrative, and brochure download CTA.

Customization:
Pass custom titles, images, circle text, paragraphs, or brochure links via props:
<x-product-detail-hero-section product-title="Non-Tear Media" banner-image="images/products/banner-non-tear.jpg"
    badge-heading="Durability that goes Beyond Paper"
    badge-subtitle="Durable Print Media for Demanding Digital Applications" :paragraphs="[...]"
    brochure-url="/downloads/brochure.pdf" />
--}}
@props([
    'productTitle' => 'Non-Tear Media',
    'bannerImage' => 'images/products/banner-non-tear.jpg',
    'bannerAlt' => 'Polyplex DigiPrint Industrial Print Substrates',
    'badgeLogo' => null,
    'badgeLogoAlt' => null,
    'badgeHeading' => 'Durability that goes Beyond Paper',
    'badgeSubtitle' => 'Durable Print Media for Demanding Digital Applications',
    'badgeDescription' => null,
    'paragraphs' => [
        'Non-Tear Films are designed for applications where printed materials need to withstand regular handling while maintaining their appearances and useability.',
        'Their durability and non-tear characteristics make them suitable for photo products, personal memories and commercial print applications where the finished material needs to offer a combination of print quality and long-term usability.',
    ],
    'brochureText' => 'Download Brochure',
    'brochureUrl' => '#download-brochure',
])

<section id="product-detail-hero" class="relative w-full select-none" aria-label="{{ $productTitle }} Overview">

    {{-- Top Dark Banner Area with Industrial Background & Centered Title --}}
    <div
        class="relative w-full h-64 sm:h-72 md:h-80 lg:h-[360px] xl:h-[390px] bg-slate-950 overflow-hidden flex items-center justify-center">

        {{-- Background Image (User can replace manually or via $bannerImage prop) --}}
        @if (!empty($bannerImage))
            <img src="{{ asset($bannerImage) }}" alt="{{ $bannerAlt }}"
                class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none" loading="eager"
                fetchpriority="high" />
        @endif

        {{-- Dark Vignette / Overlay for High Contrast --}}
        <div class="absolute inset-0 bg-black/45 pointer-events-none" aria-hidden="true"></div>

        {{-- Centered Product Title --}}
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 text-center">
            <h1
                class="font-heading font-[600] text-[55px] sm:text-4xl md:text-5xl lg:text-[55px] text-white tracking-tight leading-tight drop-shadow-[0_2px_12px_rgba(0,0,0,0.85)]">
                {{ $productTitle }}
            </h1>
        </div>
    </div>

    {{-- Bottom Content Area (#F3F3F3) with Overlapping Circular Badge & Narrative --}}
    <div class="relative bg-[#F3F3F3] pt-[62px] pb-16 sm:pb-20 lg:pb-[62px] border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">

                {{-- Left: Overlapping Circle Badge --}}
                <div
                    class="lg:col-span-5 flex justify-center lg:justify-start -mt-28 sm:-mt-36 md:-mt-40 lg:-mt-[180px] xl:-mt-[200px] relative z-20">
                    <div
                        class="relative w-[300px] h-[300px] sm:w-[350px] sm:h-[350px] md:w-[390px] md:h-[390px] xl:w-[420px] xl:h-[420px] shrink-0 bg-white rounded-full shadow-2xl flex flex-col items-center justify-center p-8 sm:p-10 md:p-12 text-center border border-slate-100">

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

                        {{-- Circle Narrative Content --}}
                        @if (!empty($badgeLogo))
                            <div class="relative z-10 flex flex-col items-center justify-center px-4 max-w-[280px]">
                                {{-- Brand Logo --}}
                                <img src="{{ asset($badgeLogo) }}" alt="{{ $badgeLogoAlt ?? $productTitle }}"
                                    class="max-h-11 sm:max-h-12 w-auto object-contain mb-2 sm:mb-2.5" />

                                @if (!empty($badgeSubtitle))
                                    <h3 class="font-heading font-semibold text-xs sm:text-[13px] md:text-[13.5px] text-[#0E4174] tracking-tight mb-2 sm:mb-2.5 text-center">
                                        {{ $badgeSubtitle }}
                                    </h3>
                                @endif

                                @if (!empty($badgeDescription))
                                    <p class="font-sans text-xs sm:text-[12px] md:text-[12.5px] leading-relaxed text-[#1E1E1E] font-medium text-center">
                                        {{ $badgeDescription }}
                                    </p>
                                @endif
                            </div>
                        @else
                            <div class="relative z-10 flex flex-col items-center justify-center px-2">
                                <h2
                                    class="font-heading font-[600] text-[24px] text-[#0E4174] sm:text-xl md:text-[22px] lg:text-[23px] leading-snug text-[#0E4174] tracking-tight max-w-[260px]">
                                    @if (is_array($badgeHeading))
                                        @foreach ($badgeHeading as $line)
                                            <span class="block">{{ $line }}</span>
                                        @endforeach
                                    @elseif (str_contains($badgeHeading, "\n"))
                                        @foreach (explode("\n", $badgeHeading) as $line)
                                            <span class="block">{{ trim($line) }}</span>
                                        @endforeach
                                    @elseif (str_contains($badgeHeading, '<br>'))
                                        {!! $badgeHeading !!}
                                    @elseif (str_contains($badgeHeading, 'Beyond Paper'))
                                        <span>{{ str_replace('Beyond Paper', '', $badgeHeading) }}</span>
                                        <span class="block">Beyond Paper</span>
                                    @elseif (str_contains($badgeHeading, 'Colour to Life'))
                                        <span>{{ str_replace('Colour to Life', '', $badgeHeading) }}</span>
                                        <span class="block">Colour to Life</span>
                                    @elseif (str_contains($badgeHeading, 'Closer to Reality'))
                                        <span>{{ str_replace('Closer to Reality', '', $badgeHeading) }}</span>
                                        <span class="block">Closer to Reality</span>
                                    @elseif (str_contains($badgeHeading, 'Meaningful Product'))
                                        <span>{{ str_replace('Meaningful Product Communication', '', $badgeHeading) }}</span>
                                        <span class="block">Meaningful Product</span>
                                        <span class="block">Communication</span>
                                    @else
                                        {{ $badgeHeading }}
                                    @endif
                                </h2>

                                @if (!empty($badgeSubtitle))
                                    <p
                                        class="font-sans text-[16px] font-[500] sm:text-[13px] md:text-[13.5px] leading-snug sm:leading-relaxed text-[#1E1E1E] font-medium tracking-normal max-w-[240px] mt-2 sm:mt-3">
                                        @if (is_array($badgeSubtitle))
                                            @foreach ($badgeSubtitle as $line)
                                                <span class="block">{{ $line }}</span>
                                            @endforeach
                                        @elseif (str_contains($badgeSubtitle, "\n"))
                                            @foreach (explode("\n", $badgeSubtitle) as $line)
                                                <span class="block">{{ trim($line) }}</span>
                                            @endforeach
                                        @elseif (str_contains($badgeSubtitle, '<br>'))
                                            {!! $badgeSubtitle !!}
                                        @elseif (str_contains($badgeSubtitle, 'Demanding Digital Applications'))
                                            <span>{{ str_replace('Demanding Digital Applications', '', $badgeSubtitle) }}</span>
                                            <span class="block">Demanding Digital Applications</span>
                                        @elseif (str_contains($badgeSubtitle, 'Commercial & Photo Reproduction'))
                                            <span>{{ str_replace('Commercial & Photo Reproduction', '', $badgeSubtitle) }}</span>
                                            <span class="block">Commercial & Photo Reproduction</span>
                                        @elseif (str_contains($badgeSubtitle, 'Detailed, Photorealistic Prints'))
                                            <span>{{ str_replace('Detailed, Photorealistic Prints', '', $badgeSubtitle) }}</span>
                                            <span class="block">Detailed, Photorealistic Prints</span>
                                        @elseif (str_contains($badgeSubtitle, 'Branding, Identification'))
                                            <span>Versatile Label Media for</span>
                                            <span class="block">Branding, Identification and</span>
                                            <span class="block">Information</span>
                                        @else
                                            {{ $badgeSubtitle }}
                                        @endif
                                    </p>
                                @endif

                                @if (!empty($badgeDescription))
                                    <p class="font-sans text-xs sm:text-[12px] md:text-[12.5px] leading-relaxed text-[#1E1E1E] font-medium text-center max-w-[240px] mt-2">
                                        {{ $badgeDescription }}
                                    </p>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>

                {{-- Right: Narrative Descriptions & Brochure Download CTA --}}
                <div class="lg:col-span-7 pt-4 lg:pt-0 space-y-5">

                    {{-- Descriptive Paragraphs --}}
                    <div
                        class="space-y-4 text-[#1E1E1E] font-sans font-[500] text-[16px] sm:text-[15px] leading-relaxed max-w-[765px]">
                        @foreach ($paragraphs as $p)
                            <p class="leading-[1.65]">
                                {{ $p }}
                            </p>
                        @endforeach
                    </div>

                    {{-- Download Brochure Button --}}
                    <div class="pt-2 sm:pt-3">
                        <a href="{{ $brochureUrl }}"
                            class="inline-flex items-center gap-2.5 px-5 py-2.5 sm:px-6 sm:py-3 bg-[#0A325E] hover:bg-[#072445] text-white text-sm font-semibold rounded-sm transition-all duration-200 shadow-sm hover:shadow-md group focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:ring-offset-2">
                            <span>{{ $brochureText }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-y-0.5"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>