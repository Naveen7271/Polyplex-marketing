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
    class="relative w-full max-h-[501px] py-16 sm:py-20 lg:py-[60px] bg-[#F3F3F3] border-b border-slate-200/80 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Title: Montserrat Bold Centered --}}
        <div class="text-center max-w-4xl mx-auto mb-10 sm:mb-12 lg:mb-[37px]">
            <h2
                class="font-heading font-[700] text-2xl sm:text-3xl lg:text-[32px] text-[#0E4174] tracking-tight leading-tight">
                Explore Possibilities Across Applications
            </h2>
        </div>

        {{-- Floating White Applications Slider Card --}}
        <div
            class="relative bg-white sm: shadow-xl shadow-slate-200/60 border border-slate-100 px-4 sm:px-8 lg:px-[40px] py-8 sm:py-10 lg:py-[40px]">

            {{-- Prev Arrow Button --}}
            <button id="apps-prev-btn" type="button"
                class="absolute left-2 sm:left-4 lg:left-5 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-400 hover:text-[#0b2b4e] transition-colors z-20 focus:outline-none disabled:opacity-20 disabled:pointer-events-none"
                aria-label="Previous Applications">
                <svg class="w-5 h-5 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            {{-- Slider Viewport --}}
            <div id="apps-slider-container" class="overflow-hidden w-full mx-auto px-6 sm:px-4">
                <div id="apps-slider-track"
                    class="flex transition-transform duration-500 ease-out will-change-transform">
                    @foreach ($applications as $idx => $app)
                        @php
                            $customAppImg = null;
                            foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                                $candidate = "images/app-{$app['id']}.{$ext}";
                                if (file_exists(public_path($candidate))) {
                                    $customAppImg = asset($candidate);
                                    break;
                                }
                            }
                            $appImg = $customAppImg ?? asset($app['default_img']);
                        @endphp

                        {{-- Individual Application Item (1 per view on mobile/tablet, 2 per view on desktop) --}}
                        <div class="apps-slide-item w-full lg:w-1/2 shrink-0 px-3 sm:px-5 lg:px-6" data-index="{{ $idx }}">
                            <div
                                class="flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-6 lg:gap-7 group">

                                {{-- Thumbnail Image --}}
                                <div
                                    class="w-[218px] h-[225px] sm:w-36 sm:h-36 lg:w-[218px] lg:h-[225px] shrink-0  overflow-hidden shadow-md bg-slate-100">
                                    <img src="{{ $appImg }}" alt="{{ $app['alt'] }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy">
                                </div>

                                {{-- Text Block --}}
                                <div class="text-center sm:text-left flex flex-col justify-center pt-1 grow">
                                    <h3
                                        class="font-heading font-[600] text-[24px] sm:text-xl lg:text-[22px] text-[#0E4174] leading-snug mb-2 sm:mb-2.5 group-hover:text-blue-700 transition-colors">
                                        {{ $app['title'] }}
                                    </h3>
                                    <p class="font-sans text-[16px] font-[500] sm:text-sm text-[#000000] lg:max-w-[299px]">
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
                class="absolute right-2 sm:right-4 lg:right-5 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-400 hover:text-[#0b2b4e] transition-colors z-20 focus:outline-none disabled:opacity-20 disabled:pointer-events-none"
                aria-label="Next Applications">
                <svg class="w-5 h-5 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>

        </div>

    </div>
</section>