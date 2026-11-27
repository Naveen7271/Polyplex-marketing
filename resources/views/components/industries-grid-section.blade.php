{{--
Industries Discovery Grid Section
Displays a 2-column responsive card grid showcasing key printing & packaging industry sectors,
with card border styling, aspect-ratio image containers, branded Polyplex Navy titles,
and informative industry narratives matching the design specifications.

Customization:
<x-industries-grid-section :industries="$customIndustries" />
--}}
@props([
    'intro' => 'Choose your industry to view common print applications and relevant product families. Final product suitability should be determined by the specific media grade, printer and end-use conditions.',
    'industries' => [
        [
            'id' => 'commercial-printing',
            'title' => 'Commercial Printing',
            'image' => 'images/industries/commercial-printing.jpg',
            'alt' => 'Commercial Printing brochures, catalogues and presentation material',
            'leadIn' => 'Make Every Print Piece Count.',
            'description' => 'From brochures and catalogues to premium presentation material, media selection can influence how printed communication looks and feels. Explore suitable commercial print media based on the intended finish, process and format.',
            'products' => [
                ['name' => 'Gloss Art Paper Media', 'slug' => 'gloss-art-paper-media'],
                ['name' => 'Non-Tear Media', 'slug' => 'non-tear-media'],
            ],
        ],
        [
            'id' => 'photography-imaging',
            'title' => 'Photography and Imaging',
            'image' => 'images/industries/photography-imaging.png',
            'alt' => 'Photography and Imaging vibrant printed photo and portrait keepsake',
            'leadIn' => 'Turn Images into Keepsakes.',
            'description' => 'Great photography deserves a thoughtful print presentation. Discover media for portraits, photobooks and creative photo output, selected for the required printer technology and finish.',
            'products' => [
                ['name' => 'Inkjet Photo Media', 'slug' => 'inkjet-photo-media'],
                ['name' => 'Non-Tear Media', 'slug' => 'non-tear-media'],
            ],
        ],
        [
            'id' => 'publishing-printing',
            'title' => 'Publishing and Printing',
            'image' => 'images/industries/publishing-printing.jpg',
            'alt' => 'Publishing and Printing books, journals and editorial publications',
            'leadIn' => 'Bring Stories to the Printed Page.',
            'description' => 'From short-run publications to image-led print pieces, choosing appropriate substrates supports the appearance and usability of finished publications.',
            'products' => [
                ['name' => 'Gloss Art Paper Media', 'slug' => 'gloss-art-paper-media'],
                ['name' => 'Polyester Offset Plates', 'slug' => 'polyester-offset-plates'],
            ],
        ],
        [
            'id' => 'advertising-marketing',
            'title' => 'Advertising and Marketing',
            'image' => 'images/industries/advertising-marketing.png',
            'alt' => 'Advertising and Marketing promotional posters and display graphics',
            'leadIn' => 'Make the Message Visible.',
            'description' => 'Print continues to bring campaigns into shops, events and everyday spaces. Explore media for posters, display graphics and branded promotional applications.',
            'products' => [
                ['name' => 'Digital Wide-Format Media', 'slug' => 'digital-wide-format-media'],
                ['name' => 'Gloss Art Paper Media', 'slug' => 'gloss-art-paper-media'],
            ],
        ],
        [
            'id' => 'packaging-labelling',
            'title' => 'Packaging and Labelling',
            'image' => 'images/industries/packaging-labelling.jpg',
            'alt' => 'Packaging and Labelling bottles and specialty printed product labels',
            'leadIn' => 'Give Every Pack a Stronger Presence.',
            'description' => 'Packaging labels help communicate identity, information and presentation. Find self-adhesive media for selected printed label applications and compatible converting workflows.',
            'products' => [
                ['name' => 'Digital Labels', 'slug' => 'digital-labels'],
                ['name' => 'Multi-Purpose Labels', 'slug' => 'multi-purpose-labels'],
            ],
        ],
        [
            'id' => 'retail-point-of-sale',
            'title' => 'Retail and Point-of-Sale',
            'image' => 'images/industries/retail-point-of-sale.jpg',
            'alt' => 'Retail and Point-of-Sale promotional display graphics and labels',
            'leadIn' => 'Catch Attention Where Decisions Happen.',
            'description' => 'Shelf graphics, window messages and in-store displays help customers navigate products and promotions. Explore display and labelling media suited to the installation environment.',
            'products' => [
                ['name' => 'Digital Wide-Format Media', 'slug' => 'digital-wide-format-media'],
                ['name' => 'Digital Labels', 'slug' => 'digital-labels'],
            ],
        ],
        [
            'id' => 'healthcare',
            'title' => 'Healthcare',
            'image' => 'images/industries/healthcare.jpg',
            'alt' => 'Healthcare medical imaging, patient records and workflow labels',
            'leadIn' => 'Clear Information for Everyday Healthcare Workflows.',
            'description' => 'Printed documents, administrative labels and information materials support communication and organisation in healthcare settings. Choose products only after confirming the specific application requirements.',
            'products' => [
                ['name' => 'Multi-Purpose Labels', 'slug' => 'multi-purpose-labels'],
                ['name' => 'Reprographic Media', 'slug' => 'reprographic-media'],
            ],
        ],
        [
            'id' => 'education',
            'title' => 'Education',
            'image' => 'images/industries/education.png',
            'alt' => 'Education printed learning puzzles, notices and classroom materials',
            'leadIn' => 'Support Learning Through Print.',
            'description' => 'Educational institutions use printed materials for teaching, administration, identification and communication. Discover media options for learning resources, notices and general-purpose labels.',
            'products' => [
                ['name' => 'Gloss Art Paper Media', 'slug' => 'gloss-art-paper-media'],
                ['name' => 'Multi-Purpose Labels', 'slug' => 'multi-purpose-labels'],
            ],
        ],
        [
            'id' => 'office-corporate',
            'title' => 'Office and Corporate',
            'image' => 'images/industries/office-corporate.jpg',
            'alt' => 'Office and Corporate ring binders, labels and printed documentation',
            'leadIn' => 'Keep Business Communication Clear.',
            'description' => 'From internal documents and labels to presentation materials, offices rely on printed information every day. Explore practical media for routine and special-use applications.',
            'products' => [
                ['name' => 'Multi-Purpose Labels', 'slug' => 'multi-purpose-labels'],
                ['name' => 'Gloss Art Paper Media', 'slug' => 'gloss-art-paper-media'],
            ],
        ],
        [
            'id' => 'logistics-supply-chain',
            'title' => 'Logistics and Supply Chain',
            'image' => 'images/industries/logistics-supply-chain.jpg',
            'alt' => 'Logistics and Supply Chain parcels with printed barcode labels',
            'leadIn' => 'Support Identification at Every Step.',
            'description' => 'Packages, stock locations and internal workflows depend on legible identification. Explore relevant label and tag substrates, with adhesive and handling performance verified against the intended use.',
            'products' => [
                ['name' => 'Multi-Purpose Labels', 'slug' => 'multi-purpose-labels'],
                ['name' => 'Digital Labels', 'slug' => 'digital-labels'],
                ['name' => 'Non-Tear Media', 'slug' => 'non-tear-media'],
            ],
        ],
        [
            'id' => 'architecture-engineering-construction',
            'title' => 'Architecture, Engineering and Construction',
            'image' => 'images/industries/architecture-engineering-construction.jpg',
            'alt' => 'Architecture, Engineering and Construction architectural plans and CAD drawings',
            'leadIn' => 'Make Technical Detail Easy to Read.',
            'description' => 'Clear plans and technical drawings support coordination across project teams. Explore reprographic media for architectural, engineering and plotting applications.',
            'products' => [
                ['name' => 'Reprographic Media', 'slug' => 'reprographic-media'],
            ],
        ],
        [
            'id' => 'textile-garments',
            'title' => 'Textile and Garments',
            'image' => 'images/industries/textile-garments.jpg',
            'alt' => 'Textile and Garments printed bib numbers, tags and apparel labels',
            'leadIn' => 'From Design Ideas to Product Identification.',
            'description' => 'Printed patterns, product tags and labels contribute to the garment development and presentation process. Choose media according to the print equipment and application requirements.',
            'products' => [
                ['name' => 'Reprographic Media', 'slug' => 'reprographic-media'],
                ['name' => 'Digital Labels', 'slug' => 'digital-labels'],
                ['name' => 'Non-Tear Media', 'slug' => 'non-tear-media'],
            ],
        ],
        [
            'id' => 'signage-visuals-communication',
            'title' => 'Signage and Visual Communication',
            'image' => 'images/industries/signage-visuals-communication.jpg',
            'alt' => 'Signage and Visual Communication safety signs and directional display graphics',
            'leadIn' => 'Make Messages Seen.',
            'description' => 'Promotional displays, directional graphics and interior visuals turn printed media into useful communication. Explore formats and finishes that fit your printer and installation method.',
            'products' => [
                ['name' => 'Digital Wide-Format Media', 'slug' => 'digital-wide-format-media'],
            ],
        ],
        [
            'id' => 'manufacturing-industrial',
            'title' => 'Manufacturing and Industrial',
            'image' => 'images/industries/manufacturing-industrial.jpg',
            'alt' => 'Manufacturing and Industrial equipment warning and identification labels',
            'leadIn' => 'Help Information Stay Visible in the Workflow.',
            'description' => 'Identification labels, internal tags and technical documents support daily manufacturing operations. Evaluate material, adhesive and print performance for each operating condition.',
            'products' => [
                ['name' => 'Digital Labels', 'slug' => 'digital-labels'],
                ['name' => 'Multi-Purpose Labels', 'slug' => 'multi-purpose-labels'],
                ['name' => 'Reprographic Media', 'slug' => 'reprographic-media'],
                ['name' => 'Non-Tear Media', 'slug' => 'non-tear-media'],
            ],
        ],
    ],
])

<section id="industries-grid" class="relative w-full py-[60px] sm:py-16 md:py-20 lg:py-[60px] bg-white"
    aria-label="Industry Solutions and Sectors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Centered Intro Statement --}}
        @if (!empty($intro))
            <div class="max-w-4xl mx-auto text-center mb-10 sm:mb-12 lg:mb-14">
                <p
                    class="font-heading font-[600] text-[17px] sm:text-[19px] md:text-[21px] text-[#0E4174] leading-[1.5] tracking-tight">
                    {{ $intro }}
                </p>
            </div>
        @endif

        {{-- 2-Column Responsive Card Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[30px] sm:gap-7 lg:gap-[30px] xl:gap-[30px]">
            @foreach ($industries as $industry)
                <article
                    class="bg-white rounded-[11px] border border-slate-200/90 hover:border-slate-300 transition-all duration-300 p-[20px] sm:p-5 lg:p-[20px] flex flex-col hover:shadow-lg hover:shadow-slate-200/50 group"
                    aria-labelledby="industry-title-{{ $industry['id'] }}">

                    {{-- Image Container with Inset Rounded Margins --}}
                    <div
                        class="relative w-full aspect-[16/10] rounded-[6px] overflow-hidden bg-slate-100 mb-4 sm:mb-5 shrink-0 border border-slate-100">
                        @if (!empty($industry['image']) && file_exists(public_path($industry['image'])))
                            <img src="{{ asset($industry['image']) }}" alt="{{ $industry['alt'] ?? $industry['title'] }}"
                                class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-500 ease-out"
                                loading="lazy" />
                        @else
                            {{-- Elegant Fallback if User Has Not Added Image File Yet --}}
                            <div
                                class="w-full h-full flex flex-col items-center justify-center bg-slate-50 text-slate-400 p-6 text-center">
                                <svg class="w-12 h-12 text-slate-300 mb-2 stroke-[1.5]" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                <span class="font-heading font-semibold text-xs text-slate-500 tracking-wide uppercase">
                                    {{ $industry['title'] }}
                                </span>
                            </div>
                        @endif
                    </div>

                    {{-- Text Content Area --}}
                    <div class="flex flex-col grow justify-start px-0.5 sm:px-1">
                        {{-- Industry Title: Polyplex Navy --}}
                        <h2 id="industry-title-{{ $industry['id'] }}"
                            class="font-heading font-[600] text-[24px] sm:text-[22px] md:text-[23px] text-[#0E4174] tracking-tight leading-snug">
                            {{ $industry['title'] }}
                        </h2>

                        {{-- Industry Narrative Description --}}
                        <p
                            class="mt-2 sm:mt-2.5 font-sans font-[400] text-[15px] sm:text-[13.5px] md:text-sm text-slate-700 leading-relaxed sm:leading-[1.6]">
                            @if (!empty($industry['leadIn']))
                                <strong class="font-semibold text-slate-900">{{ $industry['leadIn'] }}</strong>
                            @endif
                            {{ $industry['description'] }}
                        </p>

                        {{-- Red Guidance Action Link --}}
                        <div class="mt-2.5 sm:mt-3">
                            <a href="{{ $industry['ctaUrl'] ?? route('contact') }}"
                                class="inline-flex items-center gap-1.5 font-sans font-medium text-[13.5px] sm:text-sm text-[#D6001C] hover:text-[#b00017] transition-colors">
                                <span>{{ $industry['ctaText'] ?? 'Ask for Application Guidance' }}</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>

                        {{-- Product Family Pill Tags --}}
                        @if (!empty($industry['products']))
                            <div class="mt-4 sm:mt-5 flex flex-wrap gap-2.5">
                                @foreach ($industry['products'] as $product)
                                    <a href="{{ route('products.show', $product['slug']) }}"
                                        class="inline-flex items-center px-3.5 py-1.5 rounded-[6px] bg-[#0E4174] hover:bg-[#0a325a] text-white font-sans font-medium text-[12px] sm:text-[12.5px] leading-tight transition-colors">
                                        {{ $product['name'] }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </article>
            @endforeach
        </div>

    </div>
</section>