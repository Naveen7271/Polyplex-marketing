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
        [
            'id' => 'menus-and-communication-materials',
            'title' => 'Menus and Communication Materials',
            'description' => 'Print media solutions for menus and other customer-facing communication materials, supporting clear reproduction and professional presentation across relevant applications.',
            'default_img' => 'images/app-menus-and-communication-materials.jpg',
            'alt' => 'Menus and communication materials print media solutions',
        ],
        [
            'id' => 'labels-and-tags',
            'title' => 'Labels and Tags',
            'description' => 'Solutions designed for labels and tags used across product branding, identification, pricing and information display, with media options suited to different printing processes.',
            'default_img' => 'images/app-labels-and-tags.jpg',
            'alt' => 'Labels and tags for product branding and identification',
        ],
        [
            'id' => 'branding-and-marketing',
            'title' => 'Branding and Marketing',
            'description' => 'Media solutions that support branded communication, promotional materials and marketing collateral, helping businesses create consistent and impactful printed communication.',
            'default_img' => 'images/app-branding-and-marketing.jpg',
            'alt' => 'Branding and marketing collateral print solutions',
        ],
        [
            'id' => 'identification-and-information',
            'title' => 'Identification and Information',
            'description' => 'Solutions for applications where clear, readable and reliable printed information is essential, including identification materials, information displays and related communication requirements.',
            'default_img' => 'images/app-identification-and-information.jpg',
            'alt' => 'Identification and information display print solutions',
        ],
        [
            'id' => 'packaging',
            'title' => 'Packaging',
            'description' => 'Print media solutions supporting packaging-related applications, including printed identification, information and visual communication across relevant print technologies.',
            'default_img' => 'images/app-packaging.jpg',
            'alt' => 'Packaging print media solutions',
        ],
        [
            'id' => 'office-and-business-printing',
            'title' => 'Office and Business Printing',
            'description' => 'Solutions designed for everyday office and business printing requirements, including documentation, filing, identification and other routine communication applications.',
            'default_img' => 'images/app-office-and-business-printing.jpg',
            'alt' => 'Office and business printing media solutions',
        ],
        [
            'id' => 'logistics-and-tracking',
            'title' => 'Logistics and Tracking',
            'description' => 'Media solutions supporting logistics-related applications such as package identification, inventory information and tracking, where clear and dependable printed information is important.',
            'default_img' => 'images/app-logistics-and-tracking.jpg',
            'alt' => 'Logistics and tracking print media solutions',
        ],
        [
            'id' => 'healthcare',
            'title' => 'Healthcare',
            'description' => 'Print solutions supporting healthcare-related communication and identification requirements, where clarity, consistency and appropriate media performance are essential.',
            'default_img' => 'images/app-healthcare.jpg',
            'alt' => 'Healthcare communication and identification print solutions',
        ],
        [
            'id' => 'retail-and-point-of-sale',
            'title' => 'Retail and Point-of-Sale',
            'description' => 'Solutions designed for retail environments, supporting promotional communication, product information, pricing, displays and other customer-facing print applications.',
            'default_img' => 'images/app-retail-and-point-of-sale.jpg',
            'alt' => 'Retail and point-of-sale print media solutions',
        ],
        [
            'id' => 'indoor-and-outdoor-graphics',
            'title' => 'Indoor and Outdoor Graphics',
            'description' => 'Wide-format media solutions for indoor and outdoor graphic applications, supporting printed visual communication across different environments and display requirements.',
            'default_img' => 'images/app-indoor-and-outdoor-graphics.jpg',
            'alt' => 'Indoor and outdoor wide-format graphic media solutions',
        ],
        [
            'id' => 'signage-and-displays',
            'title' => 'Signage and Displays',
            'description' => 'Media solutions designed for signage and display applications, supporting clear, impactful and visually engaging printed communication across commercial and public environments.',
            'default_img' => 'images/app-signage-and-displays.jpg',
            'alt' => 'Signage and display print media solutions',
        ],
        [
            'id' => 'technical-cad-and-gis',
            'title' => 'Technical, CAD and GIS',
            'description' => 'Solutions supporting technical printing and visualisation requirements, including CAD drawings, engineering documents, maps, GIS outputs and other detailed technical reproductions.',
            'default_img' => 'images/app-technical-cad-and-gis.jpg',
            'alt' => 'Technical, CAD and GIS printing solutions',
        ],
        [
            'id' => 'pre-press-and-specialised-printing',
            'title' => 'Pre-Press and Specialised Printing',
            'description' => 'Solutions supporting proofing, offset, screen printing, flexographic pre-press workflows and technical imaging applications, where specific media characteristics and print-process compatibility are essential.',
            'default_img' => 'images/app-pre-press-and-specialised-printing.jpg',
            'alt' => 'Pre-press and specialised printing media solutions',
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
                            $appImg = $customAppImg ?? (file_exists(public_path($app['default_img'])) ? asset($app['default_img']) : null);
                        @endphp

                        {{-- Individual Application Item (1 per view on mobile/tablet, 2 per view on desktop) --}}
                        <div class="apps-slide-item w-full lg:w-1/2 shrink-0 px-1 sm:px-5 lg:px-6" data-index="{{ $idx }}">
                            <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-6 lg:gap-7 group">

                                {{-- Thumbnail Image --}}
                                <div
                                    class="w-full h-[220px] min-[400px]:h-[240px] sm:w-36 sm:h-36 lg:w-[218px] lg:h-[225px] shrink-0 rounded-lg sm:rounded-none overflow-hidden shadow-xs bg-slate-100 relative">
                                    @if ($appImg)
                                        <img src="{{ $appImg }}" alt="{{ $app['alt'] }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-300"
                                            aria-hidden="true">
                                            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                {{-- Text Block --}}
                                <div class="text-left flex flex-col justify-center pt-1 grow w-full">
                                    <h3
                                        class="font-heading font-[600] text-xl sm:text-xl lg:text-[22px] text-[#0E4174] leading-snug mb-2 sm:mb-2.5">
                                        {{ $app['title'] }}
                                    </h3>
                                    <p
                                        class="font-heading leading-snug text-[16px] sm:text-[16px] text-[#000000] lg:max-w-[299px] ">
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