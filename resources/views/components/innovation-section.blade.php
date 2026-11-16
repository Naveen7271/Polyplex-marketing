@php
    $slides = [
        [
            'index' => 0,
            'counter' => '1 / 4',
            'title' => 'Material Science Expertise',
            'description' => 'Our approach draws on expertise in material and substrate engineering, coating and surface science, and material development.',
            'default_img' => 'images/innovation-slide-1.png',
            'alt' => 'Material science expertise - optical carriage nozzle assembly',
        ],
        [
            'index' => 1,
            'counter' => '2 / 4',
            'title' => 'Print-Process Compatibility',
            'description' => 'We consider print-process requirements to develop media that works effectively with different printing technologies.',
            'default_img' => 'images/innovation-slide-2.png',
            'alt' => 'Print-process compatibility - technical workshop session',
        ],
        [
            'index' => 2,
            'counter' => '3 / 4',
            'title' => 'Application-Driven Innovation',
            'description' => 'Formulating specialty surface coatings and high-performance synthetic media engineered for modern high-speed digital presses.',
            'default_img' => 'images/innovation-slide-3.png',
            'alt' => 'Application-driven innovation - wide format digital press',
        ],
        [
            'index' => 3,
            'counter' => '4 / 4',
            'title' => 'Performance Validation & Durability',
            'description' => 'Comprehensive laboratory analysis and real-world durability testing ensuring uncompromising print reliability across diverse applications.',
            'default_img' => 'images/innovation-slide-4.png',
            'alt' => 'Performance validation - hydrophobic contact angle testing',
        ],
    ];
@endphp

{{-- Innovation Carousel Section --}}
<section id="innovation"
    class="relative w-full py-16 sm:py-20 lg:py-24 bg-white overflow-hidden border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header: Left Title + Right Narrative Paragraph --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 sm:mb-16">

            {{-- Left: Category & Headline --}}
            <div class="max-w-xl">
                <span
                    class="text-[16px] font-[500] uppercase tracking-[0.2em] text-[#000000] font-sans block mb-2 sm:mb-3">
                    INNOVATION
                </span>
                <h2
                    class="font-heading font-[700] text-[32px] sm:text-3xl lg:text-[32px] text-[#0E4174] tracking-tight leading-snug">
                    Turning Materials Science into<br class="hidden sm:inline"> Application Performance
                </h2>
            </div>

            {{-- Right: Narrative Paragraph --}}
            <div
                class="max-w-md md:text-left text-[#000000] font-[#000000] font-sans text-[16px] sm:text-sm lg:text-[16px] leading-relaxed">
                <p>
                    From material selection to final application, innovation at Polyplex DigiPrint is focused on
                    developing solutions with measurable performance.
                </p>
            </div>

        </div>

    </div>

    {{-- Carousel Track Container: Overflow hidden to reveal peeked neighboring slides --}}
    <div id="innovation-carousel-container" class="relative w-full overflow-hidden py-4">

        <div id="innovation-carousel-track"
            class="flex items-center transition-transform duration-500 ease-out will-change-transform">
            @foreach ($slides as $idx => $slide)
                @php
                    $customSlideImg = null;
                    foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                        $candidate = "images/innovation-slide-" . ($idx + 1) . ".{$ext}";
                        if (file_exists(public_path($candidate))) {
                            $customSlideImg = asset($candidate);
                            break;
                        }
                    }
                    $slideImg = $customSlideImg ?? asset($slide['default_img']);
                @endphp

                {{-- Individual Slide Wrapper --}}
                <div class="innovation-slide-wrapper w-[86%] sm:w-[72%] lg:w-[62%] max-w-4xl shrink-0 px-2 sm:px-3 lg:px-4 transition-all duration-500 ease-out"
                    data-slide-index="{{ $idx }}">
                    {{-- Slide Card Container --}}
                    <div
                        class="innovation-slide-card relative aspect-16/10 rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl transition-all duration-500 ease-out bg-slate-900 select-none {{ $idx === 0 ? 'scale-100 opacity-100 z-20' : 'scale-[0.88] opacity-75 sm:opacity-85 z-10 cursor-pointer' }}">
                        {{-- Background Image --}}
                        <img src="{{ $slideImg }}" alt="{{ $slide['alt'] }}"
                            class="w-full h-full object-cover transition-transform duration-700 ease-out" loading="lazy">

                        {{-- Dark Gradient Overlay for Text Legibility --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/45 to-transparent pointer-events-none">
                        </div>

                        {{-- Slide Content Overlay --}}
                        <div
                            class="absolute inset-0 pt-[165px] pr-[105px] sm:p-[105px] lg:pt-[165px] pr-[105px] flex flex-col pointer-events-none z-10">

                            {{-- Counter: e.g. 1 / 4 --}}
                            <div class="flex items-center gap-2 mb-2 sm:mb-3">
                                <span
                                    class="text-xs sm:text-sm font-medium tracking-[0.25em] text-white/90 uppercase font-sans">
                                    {{ $slide['counter'] }}
                                </span>
                            </div>

                            {{-- Title: Montserrat Bold --}}
                            <h3
                                class="font-heading font-[600] text-[32px] sm:text-2xl lg:text-[32px] text-white tracking-tight leading-snug drop-shadow-md max-w-xl">
                                {{ $slide['title'] }}
                            </h3>

                            {{-- Description: Inter Regular --}}
                            <p
                                class="font-sans text-[20px] sm:text-sm lg:text-[20px] text-white font-[500] mt-[16px] sm:mt-3 max-w-lg leading-relaxed">
                                {{ $slide['description'] }}
                            </p>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>

    {{-- Carousel Controls: Arrow Buttons & Dots --}}
    <div class="flex items-center justify-center gap-4 mt-6 sm:mt-8 select-none">

        {{-- Previous Slide Arrow --}}
        <button id="innovation-prev-btn" type="button"
            class="w-8 h-8 rounded-full flex items-center justify-center text-slate-700 hover:text-slate-950 transition-all focus:outline-none disabled:opacity-0 disabled:pointer-events-none"
            aria-label="Previous Slide" disabled>
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6" />
            </svg>
        </button>

        {{-- Dot Indicators --}}
        <div id="innovation-dots-container" class="flex items-center gap-2.5">
            @foreach ($slides as $idx => $slide)
                <button type="button"
                    class="innovation-dot transition-all duration-300 rounded-full {{ $idx === 0 ? 'w-2.5 h-2.5 bg-slate-900' : 'w-2 h-2 bg-slate-300 hover:bg-slate-400' }}"
                    data-index="{{ $idx }}" aria-label="Go to slide {{ $idx + 1 }}"></button>
            @endforeach
        </div>

        {{-- Next Slide Arrow --}}
        <button id="innovation-next-btn" type="button"
            class="w-8 h-8 rounded-full flex items-center justify-center text-slate-700 hover:text-slate-950 transition-all focus:outline-none disabled:opacity-0 disabled:pointer-events-none"
            aria-label="Next Slide">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6" />
            </svg>
        </button>

    </div>

</section>