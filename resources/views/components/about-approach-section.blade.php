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
<section id="about-approach-section"
    class="w-full bg-white py-12 px-4 sm:py-16 sm:px-6 lg:py-[85px] lg:px-8 xl:px-[100px]">
    <div class="mx-auto max-w-[1240px] text-center">
        {{-- Eyebrow --}}
        <p
            class="mb-3 sm:mb-4 lg:mb-6 font-heading text-[13px] min-[360px]:text-[14px] sm:text-sm font-[500] text-[#1E1E1E] uppercase tracking-[0.2em]">
            What Makes Us Different
        </p>

        {{-- Main Headline from Reference --}}
        <h2
            class="mx-auto mb-8 sm:mb-12 lg:mb-14 max-w-xs min-[360px]:max-w-sm sm:max-w-2xl lg:max-w-[1015px] font-heading text-[19px] min-[360px]:text-[21px] sm:text-2xl md:text-[28px] lg:text-[32px] font-[700] leading-snug text-[#0E4174]">
            We connect expertise from material development and coating with the realities of print production. Our focus
            is on product relevance, consistent quality, industry collaboration and responsive support.
        </h2>

        {{-- Carousel Card --}}
        <div id="approach-carousel"
            class="mx-auto max-w-[1240px] max-h-none md:max-h-[340px] overflow-hidden bg-[#F3F3F3] shadow-xs focus:outline-hidden"
            aria-roledescription="carousel" aria-label="What sets us apart" tabindex="0">
            <div class="grid grid-cols-1 md:grid-cols-2">
                {{-- Left: Sliding Images Track (Right-to-Left movement) --}}
                <div
                    class="relative w-full h-[280px] min-[360px]:h-[300px] sm:h-[340px] md:h-full md:max-h-[340px] overflow-hidden">
                    <div id="approach-image-track"
                        class="flex h-full w-full transition-transform duration-500 ease-in-out"
                        style="transform: translateX(0%);">
                        @foreach ($slides as $idx => $slide)
                            <div class="relative h-full w-full shrink-0">
                                <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] }}"
                                    class="block h-full w-full object-cover object-center"
                                    loading="{{ $idx === 0 ? 'eager' : 'lazy' }}" />
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Right: Content Box (Bottom-to-Top text animation) --}}
                <div
                    class="flex flex-col justify-between bg-[#F3F3F3] p-6 sm:p-8 md:p-[50px] text-left md:max-h-[340px]">
                    {{-- Text Wrapper with overflow hidden --}}
                    <div
                        class="flex min-h-[170px] sm:min-h-[190px] flex-col justify-start md:justify-center overflow-hidden">
                        <div id="approach-text-wrapper" class="transition-all duration-300 ease-out">
                            <h3 id="approach-title"
                                class="mb-3 sm:mb-4 md:mb-6 font-heading text-[22px] min-[360px]:text-[24px] sm:text-[26px] md:text-[32px] font-[600] leading-tight text-[#0E4174]">
                                {{ $slides[0]['title'] }}
                            </h3>
                            <p id="approach-description"
                                class="font-sans text-[15px] sm:text-base md:text-[18px] lg:text-[20px] font-[400] sm:font-[300] leading-relaxed text-[#333333] sm:text-[#000000]">
                                {{ $slides[0]['description'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Footer: Counter & Navigation Buttons --}}
                    <div class="mt-6 md:mt-1 flex items-center justify-between">
                        <span id="approach-counter"
                            class="font-heading text-[14px] sm:text-[15px] font-[500] tracking-wider text-[#0E4174]"
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