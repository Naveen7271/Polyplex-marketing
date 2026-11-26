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
            'default_img' => 'images/innovation-slide-2.jpg',
            'alt' => 'Print-process compatibility - technical workshop session',
        ],
        [
            'index' => 2,
            'counter' => '3 / 4',
            'title' => 'Application-Led Development',
            'description' => 'Our development approach connects technical expertise with specific application requirements to create physical application-ready solutions.',
            'default_img' => 'images/innovation-slide-3.jpg',
            'alt' => 'Application-driven innovation - wide format digital press',
        ],
        [
            'index' => 3,
            'counter' => '4 / 4',
            'title' => 'Research and Development',
            'description' => 'Our R&D capablities bring together material sciences, coating expertise, print-process knowledge and customer insight to support continuous innovation in product performance and application-specific solutions.',
            'default_img' => 'images/innovation-slide-4.jpg',
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
                    From Material Science to <br class="hidden sm:inline"> Print Performance
                </h2>
            </div>

            {{-- Right: Narrative Paragraph --}}
            <div
                class="max-w-[581px] md:text-left text-[#000000] font-[#000000] font-sans text-[16px] sm:text-sm lg:text-[16px] leading-relaxed">
                <p>
                    Our innovation approach starts with understanding the substrate, the printing process and the
                    intended use. Product recommendations are backed by approved technical information and real
                    application requirements.
                </p>
            </div>

        </div>

    </div>

    {{-- Carousel Track Container: Overflow hidden to reveal peeked neighboring slides --}}
    <div id="innovation-carousel-container" class="relative w-full overflow-hidden py-4">

        {{-- Floating Previous Button --}}
        <button id="innovation-prev-btn" type="button"
            class="absolute left-2 sm:left-4 lg:left-8 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-11 sm:h-11 bg-white hover:bg-slate-100 text-slate-800 rounded-full shadow-xl flex items-center justify-center transition-all duration-300 z-30 focus:outline-hidden disabled:opacity-0 disabled:pointer-events-none cursor-pointer"
            aria-label="Previous Slide" disabled>
            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-slate-800" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6" />
            </svg>
        </button>

        {{-- Floating Next Button --}}
        <button id="innovation-next-btn" type="button"
            class="absolute right-2 sm:right-4 lg:right-8 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-11 sm:h-11 bg-white hover:bg-slate-100 text-slate-800 rounded-full shadow-xl flex items-center justify-center transition-all duration-300 z-30 focus:outline-hidden disabled:opacity-0 disabled:pointer-events-none cursor-pointer"
            aria-label="Next Slide">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-slate-800" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6" />
            </svg>
        </button>

        <div id="innovation-carousel-track"
            class="flex items-center transition-transform duration-500 ease-out will-change-transform">
            @foreach ($slides as $idx => $slide)
                @php
                    $customSlideImg = null;
                    foreach (['png', 'webp', 'jpg', 'jpeg'] as $ext) {
                        $candidate = "images/innovation-slide-" . ($idx + 1) . ".{$ext}";
                        if (file_exists(public_path($candidate))) {
                            $customSlideImg = asset($candidate);
                            break;
                        }
                    }
                    $slideImg = $customSlideImg ?? asset($slide['default_img']);
                @endphp

                {{-- Individual Slide Wrapper --}}
                <div class="innovation-slide-wrapper w-[82%] sm:w-[72%] lg:w-[62%] max-w-4xl shrink-0 px-2 sm:px-3 lg:px-4 transition-all duration-500 ease-out"
                    data-slide-index="{{ $idx }}">
                    {{-- Slide Card Container --}}
                    <div
                        class="innovation-slide-card relative h-[440px] sm:h-[480px] lg:h-auto lg:aspect-16/10 rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl transition-all duration-500 ease-out bg-slate-900 select-none {{ $idx === 0 ? 'scale-100 opacity-100 z-20' : 'scale-[0.92] opacity-75 sm:opacity-85 z-10 cursor-pointer' }}">
                        {{-- Background Image --}}
                        <img src="{{ $slideImg }}" alt="{{ $slide['alt'] }}"
                            class="w-full h-full object-cover transition-transform duration-700 ease-out" loading="lazy">

                        {{-- Dark Gradient Overlay for Text Legibility --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-black/25 lg:bg-gradient-to-r lg:from-black/85 lg:via-black/45 lg:to-transparent pointer-events-none">
                        </div>

                        {{-- Slide Content Overlay --}}
                        <div
                            class="absolute inset-0 p-6 sm:p-10 lg:p-14 flex flex-col justify-center pointer-events-none z-10">

                            {{-- Centered Content Group: Counter + Title + Description --}}
                            <div class="space-y-4 sm:space-y-5 max-w-2xl">
                                {{-- Counter: e.g. 1 / 4 --}}
                                <div>
                                    <span
                                        class="text-xs sm:text-sm lg:text-[15px] font-medium tracking-[0.25em] text-white/95 uppercase font-sans">
                                        {{ $slide['counter'] }}
                                    </span>
                                </div>

                                {{-- Title + Description --}}
                                <div class="space-y-2.5 sm:space-y-3.5">
                                    {{-- Title: Montserrat SemiBold --}}
                                    <h3
                                        class="font-heading font-[600] text-xl sm:text-2xl lg:text-[32px] text-white tracking-tight leading-snug drop-shadow-md">
                                        {{ $slide['title'] }}
                                    </h3>

                                    {{-- Description: Inter Regular --}}
                                    <p
                                        class="font-sans text-sm sm:text-base lg:text-[18px] text-white/95 font-[400] leading-relaxed max-w-xl">
                                        {{ $slide['description'] }}
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>

    {{-- Carousel Controls: Dots --}}
    <div id="innovation-dots-container" class="flex items-center justify-center gap-2.5 mt-5 sm:mt-7 select-none">
        @foreach ($slides as $idx => $slide)
            <button type="button"
                class="innovation-dot transition-all duration-300 rounded-full {{ $idx === 0 ? 'w-2.5 h-2.5 bg-slate-900' : 'w-2 h-2 bg-slate-300 hover:bg-slate-400' }}"
                data-index="{{ $idx }}" aria-label="Go to slide {{ $idx + 1 }}"></button>
        @endforeach
    </div>

</section>