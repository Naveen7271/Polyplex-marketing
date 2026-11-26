{{-- Hero Section --}}
<section class="relative w-full select-none">

    {{-- Top Banner Area with Dark Background / Swatch Imagery --}}
    <div class="relative min-h-[499px] sm:min-h-[420px] lg:min-h-[499px] pt-[126px] sm:pt-20 pb-36 sm:pb-44 lg:pb-48 bg-cover bg-center overflow-hidden"
        style="background-image: linear-gradient(to right, rgba(11, 25, 44, 0.85) 0%, rgba(11, 25, 44, 0.5) 50%, rgba(11, 25, 44, 0.8) 100%), url('{{ asset('images/hero-bg.jpg') }}');">
        {{-- Banner Content Container --}}
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-[10px] z-10">
            <div class="max-w-3xl">
                <h1
                    class="font-heading font-[600] text-3xl sm:text-4xl md:text-5xl lg:text-[40px] text-white tracking-tight leading-[1.15]">
                    Built on two legacies.<br>
                    Designed for the future.
                </h1>
            </div>
        </div>

        {{-- Slide Pagination Indicator (— • • • •) --}}
        <div class="absolute bottom-6 sm:bottom-8 left-1/2 -translate-x-1/2 flex items-center gap-2 z-10"
            aria-label="Slider pagination">
            <span class="w-10 sm:w-12 h-1 bg-white rounded-full"></span>
            <span class="w-1.5 h-1.5 bg-white/70 rounded-full"></span>
            <span class="w-1.5 h-1.5 bg-white/70 rounded-full"></span>
            <span class="w-1.5 h-1.5 bg-white/70 rounded-full"></span>
            <span class="w-1.5 h-1.5 bg-white/70 rounded-full"></span>
        </div>
    </div>

    {{-- Bottom White Section with Overlapping Circle Badge & Narrative --}}
    <div class="relative bg-[#F3F3F3] pt-6 pb-[76px] lg:pb-[76px] border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">

                {{-- Left: Overlapping Circle Badge --}}
                <div
                    class="lg:col-span-5 flex justify-center lg:justify-start -mt-32 sm:-mt-40 lg:-mt-[212px] relative z-20">
                    <div
                        class="relative w-[363px] h-[363px] md:w-[424px] md:h-[424px] max-w-full shrink-0 bg-white rounded-full shadow-2xl flex items-center justify-center p-8 sm:p-10 md:p-12 text-center border border-slate-100">

                        {{-- Red Side Borders / Arcs --}}
                        <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 424 424"
                            fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            {{-- Left Red Border Arc --}}
                            <path d="M 127 39.84 A 192 192 0 0 0 127 384.16 L 127 363.83 A 174 174 0 0 1 127 60.17 Z"
                                fill="#d6001c" />

                            {{-- Right Red Border Arc --}}
                            <path d="M 297 39.84 A 192 192 0 0 1 297 384.16 L 297 363.83 A 174 174 0 0 0 297 60.17 Z"
                                fill="#d6001c" />
                        </svg>

                        {{-- Circle Narrative Content --}}
                        <p
                            class="relative z-10 font-sans text-[15px] sm:text-[14px] md:text-[17.5px] leading-relaxed sm:leading-[1.65] text-[#003570] font-[600] tracking-normal max-w-[285px]">
                            Materials expertise meets print application know-how.
                        </p>
                    </div>
                </div>

                {{-- Right: Narrative Text & CTA Button --}}
                <div class="lg:col-span-7 space-y-6 pt-2 lg:pt-0">
                    <p class="text-slate-800 text-sm sm:text-base lg:text-[16px] leading-relaxed font-[500]">
                        Polyplex DigiPrint is a strategic joint venture between Polyplex and TechNova, bringing together
                        complementary strengths in materials, coated substrates and printing applications. We focus on
                        media solutions that help print businesses create high-quality work across a wide range of
                        applications.
                    </p>

                    <div class="flex flex-wrap items-center gap-3.5 sm:gap-4">
                        <a href="{{ route('products') }}"
                            class="inline-flex items-center justify-center px-[20px] py-[10px] rounded-sm bg-[#003570] hover:bg-[#071d36] text-white font-[500] text-[16px] transition-colors shadow-xs focus:outline-hidden focus:ring-2 focus:ring-[#0b2b4e] focus:ring-offset-2">
                            Explore Products
                        </a>

                        <button type="button" id="hero-find-media-btn" data-open-search
                            class="inline-flex items-center gap-2.5 px-5 sm:px-6 py-[10px] rounded-full bg-white border border-[#D4D4D4] hover:border-[#003570] hover:bg-slate-50 text-[#003570] font-[500] text-[15px] sm:text-[16px] transition-colors shadow-2xs cursor-pointer focus:outline-hidden focus:ring-2 focus:ring-[#0b2b4e] focus:ring-offset-2"
                            aria-label="Find Media by Applications">
                            <svg class="w-5 h-5 shrink-0 text-[#003570]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <span>Find Media by Applications</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>