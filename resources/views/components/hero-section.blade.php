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
                        class="relative w-[320px] h-[320px] sm:w-[380px] sm:h-[380px] md:w-[424px] md:h-[424px] shrink-0 bg-white rounded-full shadow-2xl flex items-center justify-center p-8 sm:p-10 md:p-12 text-center border border-slate-100">

                        {{-- Red Side Borders / Arcs --}}
                        <svg class="absolute inset-0 w-full h-full pointer-events-none"
                            viewBox="0 0 424 424" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            {{-- Left Red Border Arc --}}
                            <path d="M 127 39.84 A 192 192 0 0 0 127 384.16 L 127 363.83 A 174 174 0 0 1 127 60.17 Z"
                                fill="#d6001c" />

                            {{-- Right Red Border Arc --}}
                            <path d="M 297 39.84 A 192 192 0 0 1 297 384.16 L 297 363.83 A 174 174 0 0 0 297 60.17 Z"
                                fill="#d6001c" />
                        </svg>

                        {{-- Circle Narrative Content --}}
                        <p
                            class="relative z-10 font-sans text-[15px] sm:text-[16px] md:text-[17.5px] leading-relaxed sm:leading-[1.65] text-[#003570] font-[600] tracking-normal max-w-[285px]">
                            Polyplex DigiPrint, a strategic joint
                            venture between Polyplex and TechNova, combines manufacturing
                            excellence and print industry expertise to develop the next generation of digital print
                            media.
                        </p>
                    </div>
                </div>

                {{-- Right: Narrative Text & CTA Button --}}
                <div class="lg:col-span-7 space-y-6 pt-2 lg:pt-0">
                    <p class="text-slate-800 text-sm sm:text-base lg:text-[16px] leading-relaxed font-[500]">
                        Powered by advanced coating technologies, materials science and decades of industry experience,
                        our application-driven approach enables us to develop digital print media that deliver
                        measurable value. From exceptional print quality to consistent performance and reliability, our
                        portfolio is engineered to meet the demands of diverse applications.
                    </p>

                    <div>
                        <a href="#about"
                            class="inline-flex items-center justify-center px-[20px] py-[10px] rounded-sm bg-[#003570] hover:bg-[#071d36] text-white font-[500] text-[16px] transition-colors shadow-xs focus:outline-hidden focus:ring-2 focus:ring-[#0b2b4e] focus:ring-offset-2">
                            Know More
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>