{{--
Industries Discovery Grid Section
Displays a 2-column responsive card grid showcasing key printing & packaging industry sectors,
with card border styling, aspect-ratio image containers, branded Polyplex Navy titles,
and informative industry narratives matching the design specifications.

Customization:
<x-industries-grid-section :industries="$customIndustries" />
--}}
@props([
    'industries' => [
        [
            'id' => 'commercial-printing',
            'title' => 'Commercial Printing',
            'image' => 'images/industries/commercial-printing.jpg',
            'alt' => 'Commercial Printing corporate identity, brochures, catalogues and business stationery mockups',
            'description' => 'Commercial printing continues to play an important role in business communication, marketing and brand promotion. From brochures and catalogues to promotional materials and business documents, the industry demands versatile substrates that deliver quality, consistency and reliable print performance.',
        ],
        [
            'id' => 'photography-imaging',
            'title' => 'Photography and Imaging',
            'image' => 'images/industries/photography-imaging.jpg',
            'alt' => 'Photography and Imaging high-fidelity family portraits and professional photo media',
            'description' => 'Photography and imaging rely on print media that reproduces colours, details and visual depth with accuracy. From photographic prints to digital proofing, suitable materials support image quality across professional and creative applications.',
        ],
        [
            'id' => 'publishing-printing',
            'title' => 'Publishing and Printing',
            'image' => 'images/industries/publishing-printing.jpg',
            'alt' => 'Publishing and Printing magazines, journals, books and editorial publications',
            'description' => 'Publishing and printing bring written and visual content to audiences through books, magazines, journals and other publications. Reliable print media supports text clarity, image reproduction and consistent output across publishing requirements.',
        ],
        [
            'id' => 'advertising-marketing',
            'title' => 'Advertising and Marketing',
            'image' => 'images/industries/advertising-marketing.jpg',
            'alt' => 'Advertising and Marketing illuminated promotional posters and campaign collateral',
            'description' => 'Advertising and marketing use printed communication to build brand visibility, promote offerings and engage audiences. From campaign materials and promotional graphics to branded collateral, print media supports impactful communication across marketing channels.',
        ],
        [
            'id' => 'packaging-labelling',
            'title' => 'Packaging and Labelling',
            'image' => 'images/industries/packaging-labelling.jpg',
            'alt' => 'Packaging and Labelling gourmet jars, boxes and specialty printed packaging',
            'description' => 'Packaging and labelling support product identification, information sharing and brand presentation across industries. Print media enables clear reproduction of product details, graphics and branding across different packaging formats and labelling applications.',
        ],
        [
            'id' => 'retail-point-of-sale',
            'title' => 'Retail and Point-of-Sale',
            'image' => 'images/industries/retail-point-of-sale.jpg',
            'alt' => 'Retail and Point-of-Sale shelf displays, product boxes and promotional point of sale signage',
            'description' => 'Retail environments use printed materials to highlight products, communicate promotions and improve customer engagement. From shelf displays and pricing materials to promotional graphics, print media supports effective communication across physical shopping spaces.',
        ],
        [
            'id' => 'healthcare',
            'title' => 'Healthcare',
            'image' => 'images/industries/healthcare.jpg',
            'alt' => 'Healthcare medical personnel discussing patient records and clinical print documentation',
            'description' => 'Healthcare environments depend on clear and reliable printed communication. From patient records and medical documentation to identification labels and informational materials, print media supports information exchange and organised workflows across healthcare facilities.',
        ],
        [
            'id' => 'education',
            'title' => 'Education',
            'image' => 'images/industries/education.jpg',
            'alt' => 'Education students and academic personnel collaborating with learning materials',
            'description' => 'Educational institutions rely on printed materials for learning, communication and administration. From textbooks and classroom resources to examination papers and certificates, print media supports knowledge sharing and everyday academic activities.',
        ],
        [
            'id' => 'office-corporate',
            'title' => 'Office and Corporate',
            'image' => 'images/industries/office-corporate.jpg',
            'alt' => 'Office and corporate team reviewing business presentations and documentation',
            'description' => 'Office and corporate environments require dependable print media for documentation and daily communication. From business reports and presentations to internal records and forms, printed materials support information management and workplace operations.',
        ],
        [
            'id' => 'logistics-supply-chain',
            'title' => 'Logistics and Supply Chain',
            'image' => 'images/industries/logistics-supply-chain.jpg',
            'alt' => 'Logistics and supply chain freight port with shipping containers and barcode tracking',
            'description' => 'Logistics operations depend on accurate printed information for identification and tracking. From shipping labels and barcodes to inventory records and package documentation, print media supports organised processes and information flow across supply chains.',
        ],
        [
            'id' => 'architecture-engineering-construction',
            'title' => 'Architecture, Engineering and Construction',
            'image' => 'images/industries/architecture-engineering-construction.jpg',
            'alt' => 'Architecture, engineering and construction modern commercial building plans and CAD drawings',
            'description' => 'Architecture, engineering and construction rely on precise printed documentation and technical visualisation. From architectural drawings and engineering plans to construction layouts, print media supports detailed reproduction and effective project communication.',
        ],
        [
            'id' => 'textile-garments',
            'title' => 'Textile and Garments',
            'image' => 'images/industries/textile-garments.jpg',
            'alt' => 'Textile and garments vibrant apparel on hangers and garment tags',
            'description' => 'The textile and garment industry uses printed materials across design, production and identification processes. From pattern printing and technical documentation to labels and tags, print media supports varied creative and operational requirements.',
        ],
        [
            'id' => 'signage-visuals-communication',
            'title' => 'Signage and Visuals Communication',
            'image' => 'images/industries/signage-visuals-communication.jpg',
            'alt' => 'Signage and visuals communication durable airline safety cards and informational displays',
            'description' => 'Signage and visual communication help businesses share information, establish visibility and guide audiences. From directional signs and promotional graphics to informational displays, print media supports clear messaging across commercial and public environments.',
        ],
        [
            'id' => 'manufacturing-industrial',
            'title' => 'Manufacturing and Industrial',
            'image' => 'images/industries/manufacturing-industrial.jpg',
            'alt' => 'Manufacturing and industrial durable equipment identification tags and barcode labels',
            'description' => 'Manufacturing and industrial environments rely on printed materials for product identification, operational communication and equipment labelling. From barcode labels and technical documentation to safety signage, print media supports organised workflows and information management across industrial operations.',
        ],
    ],
])

<section id="industries-grid" class="relative w-full py-[60px] sm:py-16 md:py-20 lg:py-[60px] bg-white"
    aria-label="Industry Solutions and Sectors">
    <div class="max-w-7xl mx-auto sm:px-6 ">

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
                            class="font-heading font-[600] text-[27px] sm:text-[21px] md:text-[22px] text-[#0E4174] tracking-tight leading-snug">
                            {{ $industry['title'] }}
                        </h2>

                        {{-- Industry Narrative Description --}}
                        <p
                            class="mt-2.5 sm:mt-3 font-sans font-[500] text-[16px] sm:text-[13.5px] md:text-sm text-slate-600 leading-relaxed sm:leading-[1.65]">
                            {{ $industry['description'] }}
                        </p>
                    </div>

                </article>
            @endforeach
        </div>

    </div>
</section>