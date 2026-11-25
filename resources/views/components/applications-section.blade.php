@php
    $applications = [
        [
            'id' => 'commercial-print',
            'title' => 'Commercial Print',
            'description' => 'Media solutions designed for brochures, catalogues, leaflets, publications and other commercial printing requirements, supporting different print technologies and application needs.',
            'default_img' => 'images/app-commercial-print.png',
            'alt' => 'Commercial Print magazine and catalogue publication mockups',
        ],
        [
            'id' => 'photo-imaging',
            'title' => 'Photo and Digital Imaging',
            'description' => 'Solutions designed for photo reproduction, digital proofing and image-intensive applications where colour reproduction, detail and print quality are important.',
            'default_img' => 'images/app-photo-imaging.png',
            'alt' => 'Photo and Digital Imaging high-fidelity instant prints',
        ],
        [
            'id' => 'labels-packaging',
            'title' => 'Labels & Specialty Packaging',
            'description' => 'Self-adhesive substrates and specialty tear-resistant media engineered for product labeling, luxury retail packaging, and durable brand assets.',
            'default_img' => 'images/app-labels-packaging.jpg',
            'alt' => 'Labels and packaging printed gourmet jars and boxes',
        ],
        [
            'id' => 'industrial-tags',
            'title' => 'Industrial & Heavy-Duty Tags',
            'description' => 'Weatherproof, chemical-resistant synthetic paper solutions engineered for luggage tags, asset tracking, outdoor signage, and harsh industrial environments.',
            'default_img' => 'images/app-industrial-tags.jpg',
            'alt' => 'Industrial and heavy-duty tags for luggage and equipment',
        ],
    ];
@endphp

{{-- Explore Possibilities Across Applications Section --}}
<section id="applications"
    class="relative w-full py-12 sm:py-16 lg:py-[60px] bg-[#F3F3F3] border-b border-slate-200/80 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Title: Eyebrow, Montserrat Bold Centered Heading & Subtitle --}}
        <div class="text-center max-w-4xl mx-auto mb-8 sm:mb-12 lg:mb-[37px]">
            <p class="font-heading text-xs sm:text-sm font-[500] uppercase tracking-[0.22em] text-slate-800 mb-3">
                APPLICATIONS
            </p>
            <h2
                class="font-heading font-[700] text-2xl sm:text-3xl lg:text-[32px] text-[#0E4174] tracking-tight leading-tight max-w-[280px] sm:max-w-none mx-auto">
                Choose the Media. Create the Application.
            </h2>
            <p
                class="mt-4 font-sans text-sm sm:text-[15px] lg:text-[16px] font-normal text-slate-800 leading-relaxed max-w-3xl mx-auto">
                Every project asks something different of print media—visual impact, flexibility, handling strength,
                dimensional stability or ease of use. Discover products through the applications you want to create.
            </p>
        </div>

        {{-- Floating White Applications Slider Card --}}
        <div
            class="relative bg-white rounded-xl sm:rounded-none shadow-xl shadow-slate-200/60 border border-slate-100 px-4 sm:px-8 lg:px-[40px] py-5 sm:py-10 lg:py-[40px]">

            {{-- Prev Arrow Button --}}
            <button id="apps-prev-btn" type="button"
                class="absolute left-2 sm:left-4 lg:left-5 top-[125px] sm:top-1/2 -translate-y-1/2 w-8 h-8 sm:w-10 sm:h-10 bg-white hover:bg-slate-50 text-slate-700 hover:text-[#0b2b4e] rounded-full shadow-lg flex items-center justify-center transition-all z-20 focus:outline-none disabled:opacity-0 disabled:pointer-events-none cursor-pointer border border-slate-100"
                aria-label="Previous Applications" disabled>
                <svg class="w-4 h-4 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            {{-- Slider Viewport --}}
            <div id="apps-slider-container" class="overflow-hidden w-full mx-auto px-0 sm:px-4">
                <div id="apps-slider-track"
                    class="flex transition-transform duration-500 ease-out will-change-transform">
                    @foreach ($applications as $idx => $app)
                        @php
                            $customAppImg = null;
                            foreach (['png', 'webp', 'jpg', 'jpeg'] as $ext) {
                                $candidate = "images/app-{$app['id']}.{$ext}";
                                if (file_exists(public_path($candidate))) {
                                    $customAppImg = asset($candidate);
                                    break;
                                }
                            }
                            $appImg = $customAppImg ?? asset($app['default_img']);
                        @endphp

                        {{-- Individual Application Item (1 per view on mobile/tablet, 2 per view on desktop) --}}
                        <div class="apps-slide-item w-full lg:w-1/2 shrink-0 px-1 sm:px-5 lg:px-6" data-index="{{ $idx }}">
                            <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-6 lg:gap-7 group">

                                {{-- Thumbnail Image --}}
                                <div
                                    class="w-full h-[220px] min-[400px]:h-[240px] sm:w-36 sm:h-36 lg:w-[218px] lg:h-[225px] shrink-0 rounded-lg sm:rounded-none overflow-hidden shadow-xs bg-slate-100 relative">
                                    <img src="{{ $appImg }}" alt="{{ $app['alt'] }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy">
                                </div>

                                {{-- Text Block --}}
                                <div class="text-left flex flex-col justify-center pt-1 grow w-full">
                                    <h3
                                        class="font-heading font-[600] text-xl sm:text-xl lg:text-[22px] text-[#0E4174] leading-snug mb-2 sm:mb-2.5">
                                        {{ $app['title'] }}
                                    </h3>
                                    <p
                                        class="font-sans text-[13.5px] sm:text-sm text-slate-800 lg:max-w-[299px] leading-relaxed">
                                        {{ $app['description'] }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Next Arrow Button --}}
            <button id="apps-next-btn" type="button"
                class="absolute right-2 sm:right-4 lg:right-5 top-[125px] sm:top-1/2 -translate-y-1/2 w-8 h-8 sm:w-10 sm:h-10 bg-white hover:bg-slate-50 text-slate-700 hover:text-[#0b2b4e] rounded-full shadow-lg flex items-center justify-center transition-all z-20 focus:outline-none disabled:opacity-0 disabled:pointer-events-none cursor-pointer border border-slate-100"
                aria-label="Next Applications">
                <svg class="w-4 h-4 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>

        </div>

    </div>
</section>