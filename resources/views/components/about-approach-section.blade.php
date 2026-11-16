@php
    $slides = [
        [
            'id' => 1,
            'title' => 'Understanding Applications',
            'description' => 'We understand the requirements of different print applications and use this knowledge to develop solutions suited to specific customer needs.',
            'image' => asset('images/about-sets-us-apart-1.jpg'),
            'alt' => 'Understanding Applications - Print application requirements',
        ],
        [
            'id' => 2,
            'title' => 'Advanced Polymer & Coating Technology',
            'description' => 'Our expertise in polymer synthesis and specialized surface coatings ensures superior toner adhesion, chemical resistance, and long-term durability.',
            'image' => asset('images/about-sets-us-apart-2.jpg'),
            'alt' => 'Advanced Polymer and Coating Technology',
        ],
        [
            'id' => 3,
            'title' => 'Digital Print Media Innovation',
            'description' => 'We engineer synthetic paper and specialty substrates tailored for laser, inkjet, and thermal transfer technologies across diverse print platforms.',
            'image' => asset('images/about-sets-us-apart-3.jpg'),
            'alt' => 'Digital Print Media Innovation',
        ],
        [
            'id' => 4,
            'title' => 'Precision Manufacturing & Quality Excellence',
            'description' => 'State-of-the-art extrusion and coating lines deliver consistent caliper, static control, and flawless sheet finishing under stringent quality standards.',
            'image' => asset('images/about-sets-us-apart-4.jpg'),
            'alt' => 'Precision Manufacturing and Quality Excellence',
        ],
        [
            'id' => 5,
            'title' => 'Customer-Centric Tailored Solutions',
            'description' => 'We collaborate directly with printers, converters, and brand owners to engineer bespoke formulations, custom sizes, and application-specific solutions.',
            'image' => asset('images/about-sets-us-apart-5.jpg'),
            'alt' => 'Customer-Centric Tailored Solutions',
        ],
        [
            'id' => 6,
            'title' => 'Widespread Distribution & Support',
            'description' => 'Serving 60+ countries and backed by 700+ distribution partners, our pan-India and global reach ensures dependable delivery and dedicated technical support.',
            'image' => asset('images/about-sets-us-apart-6.jpg'),
            'alt' => 'Widespread Distribution and Support',
        ],
    ];
@endphp

{{-- What Sets Us Apart Section --}}
<section id="about-approach-section" class="w-full bg-white py-[85px] px-[100px] sm:py-18 lg:py-[85px]">
    <div class="mx-auto max-w-[1240px] text-center">
        {{-- Eyebrow --}}
        <p
            class="mb-[43px] font-heading text-[16px] font-[500] text-[#1E1E1E] uppercase tracking-[0.2em]  sm:mb-6 sm:text-sm">
            WHAT SETS US APART
        </p>

        {{-- Main Headline from Reference --}}
        <h2
            class="mx-auto pb-[54px] max-w-[1015px] font-heading text-[32px] font-[700] leading-snug text-[#0E4174] sm:mb-16 sm:text-3xl sm:leading-snug lg:text-[32px]">
            Our integrated approach brings together capabilities across the value chain, enabling us to move from
            understanding requirements to delivering solutions and supporting customers through their journey.
        </h2>

        {{-- Carousel Card --}}
        <div id="approach-carousel"
            class="mx-auto max-w-[1240px] max-h-[340px] overflow-hidden bg-[#F3F3F3] shadow-xs focus:outline-hidden"
            aria-roledescription="carousel" aria-label="What sets us apart" tabindex="0">
            <div class="grid grid-cols-1 md:grid-cols-2">
                {{-- Left: Sliding Images Track (Right-to-Left movement) --}}
                <div class="relative max-h-[340px] w-full overflow-hidden  sm:min-h-[320px] md:min-h-[380px]">
                    <div id="approach-image-track"
                        class="flex h-full w-full transition-transform duration-500 ease-in-out"
                        style="transform: translateX(0%);">
                        @foreach ($slides as $idx => $slide)
                            <div class="relative max-h-[340px] w-full shrink-0">
                                <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] }}"
                                    class="block h-full w-full object-cover object-center"
                                    loading="{{ $idx === 0 ? 'eager' : 'lazy' }}" />
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Right: Content Box (Bottom-to-Top text animation) --}}
                <div class="flex flex-col max-h-[340px] justify-between  bg-[#F3F3F3] p-[50px] text-left ">
                    {{-- Text Wrapper with overflow hidden --}}
                    <div class="flex min-h-[190px] flex-col justify-center overflow-hidden sm:min-h-[190px]">
                        <div id="approach-text-wrapper" class="transition-all duration-300 ease-out">
                            <h3 id="approach-title"
                                class="mb-4 font-heading text-[32px] font-[600] leading-tight text-[#0E4174] sm:mb-6 sm:text-[28px]">
                                {{ $slides[0]['title'] }}
                            </h3>
                            <p id="approach-description"
                                class="font-sans text-[20px] font-[300] leading-relaxed text-[#000000] sm:text-base">
                                {{ $slides[0]['description'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Footer: Counter & Navigation Buttons --}}
                    <div class="mt-1 flex items-center justify-between">
                        <span id="approach-counter"
                            class="font-heading text-[15px] font-[400] tracking-wider text-[#0E4174] sm:text-sm"
                            aria-live="polite">
                            1/{{ count($slides) }}
                        </span>

                        <div class="flex items-center gap-3">
                            <button type="button" id="approach-prev-btn"
                                class="approach-prev-btn rounded-md p-2 text-[#003570] opacity-30 transition-all hover:bg-slate-200/60 hover:text-blue-800 focus:outline-hidden focus:ring-2 focus:ring-blue-500"
                                aria-label="Previous slide" disabled>
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button type="button" id="approach-next-btn"
                                class="approach-next-btn rounded-md p-2 text-[#003570] transition-all hover:bg-slate-200/60 hover:text-blue-800 focus:outline-hidden focus:ring-2 focus:ring-blue-500"
                                aria-label="Next slide">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Hidden slide data elements for SSR / SEO --}}
            <div class="sr-only">
                @foreach ($slides as $idx => $s)
                    <div class="approach-data-item" data-index="{{ $idx }}" data-title="{{ $s['title'] }}"
                        data-description="{{ $s['description'] }}">
                        <h4>{{ $s['title'] }}</h4>
                        <p>{{ $s['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>