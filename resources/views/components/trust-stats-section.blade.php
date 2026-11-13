@php
    // Make in India Lion Image detection
    $lionImg = null;
    foreach (['png', 'svg', 'webp', 'jpg'] as $ext) {
        $candidate = "images/make-in-india-lion.{$ext}";
        if (file_exists(public_path($candidate))) {
            $lionImg = asset($candidate);
            break;
        }
    }

    // India Reach Map Icon detection
    $indiaMapImg = null;
    foreach (['png', 'svg', 'webp', 'jpg'] as $ext) {
        $candidate = "images/india-reach-icon.{$ext}";
        if (file_exists(public_path($candidate))) {
            $indiaMapImg = asset($candidate);
            break;
        }
    }
@endphp

{{-- Made in India & Trust Stats Section --}}
<section id="made-in-india"
    class="relative w-full py-14 sm:py-18 lg:py-20 bg-[#f7f8fa] border-b border-slate-200/80 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header: Make in India Lion Logo + Headline --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3.5 sm:gap-5 mb-10 sm:mb-12 text-center">
            @if ($lionImg)
                <img src="{{ $lionImg }}" alt="Make in India Lion"
                    class="h-10 sm:h-12 lg:h-14 w-auto object-contain drop-shadow-xs" loading="lazy">
            @else
                {{-- Fallback SVG Lion Wordmark --}}
                <div class="w-12 h-10 bg-slate-800 rounded flex items-center justify-center text-white text-xs font-bold">
                    INDIA
                </div>
            @endif

            <h2
                class="font-heading font-[700] text-2xl sm:text-3xl lg:text-[32px] text-[#0E4174] tracking-tight leading-tight">
                Made in India. For the World.
            </h2>
        </div>

        {{-- Floating White Trust Stats Card --}}
        <div
            class="bg-white rounded-2xl shadow-xl shadow-slate-200/70 border border-slate-100 px-6 sm:px-8 lg:px-10 py-7 sm:py-8 lg:py-9">
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 lg:gap-0 lg:divide-x lg:divide-slate-200">

                {{-- Stat 1: 55+ Years of Industrial Expertise --}}
                <div class="flex items-center justify-start lg:justify-center gap-3.5 sm:gap-4 lg:px-6">
                    <div class="relative shrink-0 flex items-center">
                        {{-- Decorative Green Gear Accent --}}
                        <svg class="w-6 h-6 text-[#7cb342] absolute -top-3.5 -left-2 pointer-events-none"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path
                                d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"
                                stroke-dasharray="2 2" />
                            <circle cx="12" cy="12" r="5" stroke-dasharray="3 1" />
                        </svg>
                        <span
                            class="font-heading font-extrabold text-3xl sm:text-4xl lg:text-[42px] text-[#e31b23] tracking-tight leading-none">
                            55+
                        </span>
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-[#0b2b4e] leading-snug">
                        Years of<br class="hidden sm:inline">Industrial Expertise
                    </div>
                </div>

                {{-- Stat 2: 60+ Countries Worldwide --}}
                <div class="flex items-center justify-start lg:justify-center gap-3.5 sm:gap-4 lg:px-6">
                    <div class="relative shrink-0 flex items-center">
                        {{-- Decorative Green Globe Accent --}}
                        <svg class="w-7 h-7 text-[#7cb342] absolute -top-3.5 -left-2 pointer-events-none"
                            viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="9" stroke="#7cb342" stroke-width="1.3"
                                stroke-dasharray="2.5 1.5" />
                            <ellipse cx="12" cy="12" rx="4.5" ry="9" stroke="#689f38" stroke-width="1.5" />
                            <line x1="3" y1="12" x2="21" y2="12" stroke="#7cb342" stroke-width="1.2" />
                        </svg>
                        <span
                            class="font-heading font-extrabold text-3xl sm:text-4xl lg:text-[42px] text-[#e31b23] tracking-tight leading-none">
                            60+
                        </span>
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-[#0b2b4e] leading-snug">
                        Countries<br class="hidden sm:inline">Worldwide
                    </div>
                </div>

                {{-- Stat 3: 700+ Distribution Partners --}}
                <div class="flex items-center justify-start lg:justify-center gap-3.5 sm:gap-4 lg:px-6">
                    <div class="relative shrink-0 flex items-center">
                        {{-- Decorative Green Location Pin & Trail Accent --}}
                        <svg class="w-6 h-7 absolute -top-4 -left-1.5 pointer-events-none" viewBox="0 0 24 28"
                            fill="none">
                            <path d="M17 4a4 4 0 0 0-4 4c0 3.2 4 7 4 7s4-3.8 4-7a4 4 0 0 0-4-4z" fill="none"
                                stroke="#689f38" stroke-width="1.7" />
                            <circle cx="17" cy="8" r="1.5" fill="#689f38" />
                            <path d="M3 23c3.5-4 7.5-6.5 11-10.5" stroke="#7cb342" stroke-width="1.4"
                                stroke-dasharray="2.5 2" />
                        </svg>
                        <span
                            class="font-heading font-extrabold text-3xl sm:text-4xl lg:text-[42px] text-[#e31b23] tracking-tight leading-none">
                            700+
                        </span>
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-[#0b2b4e] leading-snug">
                        Distribution<br class="hidden sm:inline">Partners
                    </div>
                </div>

                {{-- Stat 4: Pan - India Reach --}}
                <div class="flex items-center justify-start lg:justify-center gap-3.5 sm:gap-4 lg:px-6">
                    <div class="shrink-0 flex items-center">
                        @if ($indiaMapImg)
                            <img src="{{ $indiaMapImg }}" alt="Pan - India Reach" class="h-9 sm:h-11 w-auto object-contain"
                                loading="lazy">
                        @else
                            {{-- Fallback SVG Map Outline with Green Orbit --}}
                            <div class="relative w-9 h-11 flex items-center justify-center">
                                <svg class="w-8 h-10 text-[#e31b23]" viewBox="0 0 24 28" fill="currentColor">
                                    <path d="M12 2l2 4 4 2-2 5 3 4-4 7-3 4-3-4-4-7 3-4-2-5 4-2z" />
                                </svg>
                                <svg class="w-10 h-10 text-[#7cb342] absolute inset-0" viewBox="0 0 32 32" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <ellipse cx="16" cy="16" rx="14" ry="7" transform="rotate(-30 16 16)"
                                        stroke-dasharray="3 2" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-[#0b2b4e] leading-snug">
                        Pan - India<br class="hidden sm:inline">Reach
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>