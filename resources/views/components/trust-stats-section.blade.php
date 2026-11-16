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
@endphp

{{-- Made in India & Trust Stats Section --}}
<section id="made-in-india"
    class="relative w-full pt-[65px] pb-[51px] sm:py-18 lg:py-[65px] bg-[#F3F3F3]  overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header: Make in India Lion Logo + Headline --}}
        <div
            class="flex flex-col sm:flex-row items-center justify-center gap-3.5 sm:gap-5 mb-[60px] sm:mb-12 text-center">
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
            class="bg-white rounded-[10px] shadow-xl shadow-slate-200/70 border border-slate-100 px-6 sm:px-8 lg:px-10 py-7 sm:py-8 lg:pt-[18px] pb-[60px]">
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 lg:gap-0 lg:divide-x lg:divide-slate-200">

                {{-- Stat 1: 55+ Years of Industrial Expertise --}}
                <div class="flex items-center justify-start lg:justify-center gap-3.5 sm:gap-4 lg:px-6">
                    <div class="shrink-0 flex items-center">
                        <img src="{{ asset('images/55.png') }}" alt="55+"
                            class="h-10 sm:h-12 lg:h-14 w-auto object-contain" loading="lazy">
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-[#0b2b4e] leading-snug">
                        Years of<br class="hidden sm:inline">Industrial Expertise
                    </div>
                </div>

                {{-- Stat 2: 60+ Countries Worldwide --}}
                <div class="flex items-center justify-start lg:justify-center gap-3.5 sm:gap-4 lg:px-6">
                    <div class="shrink-0 flex items-center">
                        <img src="{{ asset('images/60.png') }}" alt="60+"
                            class="h-10 sm:h-12 lg:h-14 w-auto object-contain" loading="lazy">
                    </div>
                    <div class="text-[18px] sm:text-sm font-[600] text-[#0E4174] leading-snug">
                        Countries<br class="hidden sm:inline">Worldwide
                    </div>
                </div>

                {{-- Stat 3: 700+ Distribution Partners --}}
                <div class="flex items-center justify-start lg:justify-center gap-3.5 sm:gap-4 lg:px-6">
                    <div class="shrink-0 flex items-center">
                        <img src="{{ asset('images/700.png') }}" alt="700+"
                            class="h-12 sm:h-16 lg:h-[72px] w-auto object-contain" loading="lazy">
                    </div>
                    <div class="text-[18px] sm:text-sm font-[600] text-[#0E4174] leading-snug">
                        Distribution<br class="hidden sm:inline">Partners
                    </div>
                </div>

                {{-- Stat 4: Pan - India Reach --}}
                <div class="flex items-center justify-start lg:justify-center gap-3.5 sm:gap-4 lg:px-6">
                    <div class="shrink-0 flex items-center">
                        <img src="{{ asset('images/panindia.png') }}" alt="Pan - India Reach"
                            class="h-10 sm:h-12 lg:h-14 w-auto object-contain" loading="lazy">
                    </div>
                    <div class="text-[18px] sm:text-sm font-[600] text-[#0E4174] leading-snug">
                        Pan - India<br class="hidden sm:inline">Reach
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>