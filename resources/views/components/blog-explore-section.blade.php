{{--
Blog & News Page - Curated Articles Grid Section: "MORE TO EXPLORE" / "LATEST BLOGS"
Displays:
1. Centered Section Eyebrow: "MORE TO EXPLORE" or "LATEST BLOGS" (configurable via :title prop)
2. 2x2 Grid of 4 Curated Article Cards (Responsive 1-col on mobile, 2-col on md/lg)
3. Each Card features: High-resolution media preview, Date (e.g. NOV 26), Navy Headline, and Subtitle
4. Interactive Pagination Controls: 3 Dots + Circular Next Chevron Button to cycle through additional curated articles
--}}
@props([
    'title' => 'MORE TO EXPLORE',
])

@php
    $exploreItemsPage1 = [
        [
            'id' => 1,
            'slug' => 'customised-print-solutions-for-businesses',
            'date' => 'NOV 26',
            'title' => 'Customised Print Solutions for Businesses',
            'description' => 'Professional printing for growing brands',
            'image' => 'images/blog/explore-1-customised-print.jpg',
            'alt' => 'Customised industrial printing machine with golden cylinder',
        ],
        [
            'id' => 2,
            'slug' => 'choosing-media-for-business-printing',
            'date' => 'NOV 26',
            'title' => 'Choosing Media for Business Printing',
            'description' => 'Find the perfect paper finish',
            'image' => 'images/blog/explore-2-choosing-media.jpg',
            'alt' => 'Curved perforated flexible synthetic print media sheet',
        ],
        [
            'id' => 3,
            'slug' => 'business-cards-that-last-longer',
            'date' => 'OCT 26',
            'title' => 'Business Cards That Last Longer',
            'description' => 'Make every first impression count',
            'image' => 'images/blog/explore-3-business-cards.jpg',
            'alt' => 'Business professionals exchanging durable synthetic business cards',
        ],
        [
            'id' => 4,
            'slug' => 'brochure-designs-that-drive-engagement',
            'date' => 'OCT 26',
            'title' => 'Brochure Designs That Drive Engagement',
            'description' => 'Turn business information into interest',
            'image' => 'images/blog/explore-4-brochure-designs.jpg',
            'alt' => 'Creative restaurant menu and promotional brochure flat lay layout',
        ],
    ];

    $exploreItemsPage2 = [
        [
            'id' => 5,
            'slug' => 'packaging-labelling',
            'date' => 'OCT 18',
            'title' => 'High-Performance Synthetic Papers in Modern Packaging',
            'description' => 'Elevating shelf-life and brand prestige',
            'image' => 'images/products/packaging-labelling.jpg',
            'alt' => 'Synthetic packaging and label substrates',
        ],
        [
            'id' => 6,
            'slug' => 'digital-wide-format-media',
            'date' => 'OCT 10',
            'title' => 'The Science Behind Water-Resistant Digital Media',
            'description' => 'Durability for harsh outdoor environments',
            'image' => 'images/products/digital-wide-format-media.jpg',
            'alt' => 'Water resistant digital wide format media',
        ],
        [
            'id' => 7,
            'slug' => 'non-tear-media',
            'date' => 'SEPT 28',
            'title' => 'Eco-Conscious Printing: Mono-Material Substrates',
            'description' => 'Designing for circular economy recyclability',
            'image' => 'images/products/non-tear-media.jpg',
            'alt' => 'Recyclable mono-material printing substrates',
        ],
        [
            'id' => 8,
            'slug' => 'inkjet-photo-media',
            'date' => 'SEPT 15',
            'title' => 'Wide-Format Digital Graphics: Maximizing Impact',
            'description' => 'Vibrant color fidelity for retail displays',
            'image' => 'images/products/inkjet-photo-media.jpg',
            'alt' => 'Wide format digital graphics and point of sale media',
        ],
    ];

    $exploreItemsPage3 = [
        [
            'id' => 9,
            'slug' => 'polyester-offset-plates',
            'date' => 'SEPT 05',
            'title' => 'Polyester Offset Plates in Fast-Paced Commercial Press',
            'description' => 'Cost-effective precision for medium run lengths',
            'image' => 'images/products/polyester-offset-plates.jpg',
            'alt' => 'Polyester offset plates in commercial print production',
        ],
        [
            'id' => 10,
            'slug' => 'digital-labels',
            'date' => 'AUG 28',
            'title' => 'Self-Adhesive Labels: Choosing the Right Adhesive Type',
            'description' => 'Removable vs permanent tack for variable packaging surfaces',
            'image' => 'images/products/digital-labels.jpg',
            'alt' => 'Self-adhesive digital label media rolls',
        ],
        [
            'id' => 11,
            'slug' => 'digital-yatra-delhi',
            'date' => 'AUG 19',
            'title' => 'Digital Yatra Insights: Emerging Substrate Trends in India',
            'description' => 'Connecting commercial printers with next-gen media',
            'image' => 'images/news-4-digital-yatra-delhi.png',
            'alt' => 'Digital Yatra printing industry conference',
        ],
        [
            'id' => 12,
            'slug' => 'laser-and-inkjet-positive-films',
            'date' => 'AUG 08',
            'title' => 'Laser & Inkjet Positive Films for Sharp Screen Exposures',
            'description' => 'High optical density for high-density screen stencils',
            'image' => 'images/products/laser-and-inkjet-positive-films.jpg',
            'alt' => 'Positive films for screen printing and reprographics',
        ],
    ];
@endphp

<section id="more-to-explore" class="w-full bg-[#FBFBFB] py-12 sm:py-16 md:py-20 select-none" aria-label="{{ $title }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Eyebrow Header: Centered --}}
        <div class="text-center max-w-4xl mx-auto mb-8 sm:mb-10 lg:mb-12">
            <h2 class="font-heading font-[600] text-[13px] sm:text-[14px] text-slate-900 tracking-[0.2em] uppercase">
                {{ $title }}
            </h2>
        </div>

        {{-- Page 1: 2x2 Grid of 4 Cards (Active by default) --}}
        <div id="explore-grid-page-1" class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 lg:gap-7 max-w-5xl mx-auto transition-opacity duration-300">
            @foreach ($exploreItemsPage1 as $item)
                @php
                    $imgSrc = asset($item['image']);
                    $cardUrl = route('blog.show', $item['slug']);
                @endphp
                <article class="bg-white rounded-xl border border-slate-200/80 p-3 sm:p-3.5 shadow-2xs hover:shadow-md transition-shadow group flex flex-col justify-between">
                    <div>
                        {{-- Thumbnail Image Container --}}
                        <a href="{{ $cardUrl }}" class="block w-full h-[180px] sm:h-[195px] md:h-[205px] rounded-lg overflow-hidden bg-slate-100 mb-3.5 relative">
                            <img 
                                src="{{ $imgSrc }}" 
                                alt="{{ $item['alt'] }}" 
                                class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-300"
                                loading="lazy"
                            />
                        </a>

                        {{-- Card Metadata --}}
                        <div class="px-1 pb-1">
                            {{-- Date --}}
                            <p class="font-sans text-[11px] sm:text-xs font-[600] text-[#0E4174] uppercase tracking-wider mb-1.5 sm:mb-2">
                                {{ $item['date'] }}
                            </p>

                            {{-- Title --}}
                            <h3 class="font-heading font-[600] text-[16px] sm:text-[18px] text-[#0E4174] leading-snug mb-1 group-hover:text-blue-900 transition-colors">
                                <a href="{{ $cardUrl }}" class="hover:underline">
                                    {{ $item['title'] }}
                                </a>
                            </h3>

                            {{-- Description / Subtitle --}}
                            <p class="font-sans text-[13px] sm:text-[14px] text-slate-500 font-normal leading-relaxed">
                                {{ $item['description'] }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Page 2: Additional Curated Articles (Initially hidden) --}}
        <div id="explore-grid-page-2" class="hidden grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 lg:gap-7 max-w-5xl mx-auto transition-opacity duration-300">
            @foreach ($exploreItemsPage2 as $item)
                @php
                    $imgSrc = asset($item['image']);
                    $cardUrl = route('blog.show', $item['slug']);
                @endphp
                <article class="bg-white rounded-xl border border-slate-200/80 p-3 sm:p-3.5 shadow-2xs hover:shadow-md transition-shadow group flex flex-col justify-between">
                    <div>
                        <a href="{{ $cardUrl }}" class="block w-full h-[180px] sm:h-[195px] md:h-[205px] rounded-lg overflow-hidden bg-slate-100 mb-3.5 relative">
                            <img 
                                src="{{ $imgSrc }}" 
                                alt="{{ $item['alt'] }}" 
                                class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-300"
                                loading="lazy"
                            />
                        </a>

                        <div class="px-1 pb-1">
                            <p class="font-sans text-[11px] sm:text-xs font-[600] text-[#0E4174] uppercase tracking-wider mb-1.5 sm:mb-2">
                                {{ $item['date'] }}
                            </p>

                            <h3 class="font-heading font-[600] text-[16px] sm:text-[18px] text-[#0E4174] leading-snug mb-1 group-hover:text-blue-900 transition-colors">
                                <a href="{{ $cardUrl }}" class="hover:underline">
                                    {{ $item['title'] }}
                                </a>
                            </h3>

                            <p class="font-sans text-[13px] sm:text-[14px] text-slate-500 font-normal leading-relaxed">
                                {{ $item['description'] }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Page 3: Additional Curated Articles (Initially hidden) --}}
        <div id="explore-grid-page-3" class="hidden grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 lg:gap-7 max-w-5xl mx-auto transition-opacity duration-300">
            @foreach ($exploreItemsPage3 as $item)
                @php
                    $imgSrc = asset($item['image']);
                    $cardUrl = route('blog.show', $item['slug']);
                @endphp
                <article class="bg-white rounded-xl border border-slate-200/80 p-3 sm:p-3.5 shadow-2xs hover:shadow-md transition-shadow group flex flex-col justify-between">
                    <div>
                        <a href="{{ $cardUrl }}" class="block w-full h-[180px] sm:h-[195px] md:h-[205px] rounded-lg overflow-hidden bg-slate-100 mb-3.5 relative">
                            <img 
                                src="{{ $imgSrc }}" 
                                alt="{{ $item['alt'] }}" 
                                class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-300"
                                loading="lazy"
                            />
                        </a>

                        <div class="px-1 pb-1">
                            <p class="font-sans text-[11px] sm:text-xs font-[600] text-[#0E4174] uppercase tracking-wider mb-1.5 sm:mb-2">
                                {{ $item['date'] }}
                            </p>

                            <h3 class="font-heading font-[600] text-[16px] sm:text-[18px] text-[#0E4174] leading-snug mb-1 group-hover:text-blue-900 transition-colors">
                                <a href="{{ $cardUrl }}" class="hover:underline">
                                    {{ $item['title'] }}
                                </a>
                            </h3>

                            <p class="font-sans text-[13px] sm:text-[14px] text-slate-500 font-normal leading-relaxed">
                                {{ $item['description'] }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Pagination Dots & Next Arrow Controls --}}
        <div class="flex items-center justify-center gap-2 mt-8 sm:mt-10" aria-label="Explore articles pagination">
            <div class="flex items-center gap-2">
                <button 
                    id="explore-dot-1" 
                    type="button" 
                    class="w-2 h-2 rounded-full bg-[#0E4174] transition-all cursor-pointer focus:outline-hidden"
                    aria-label="Go to explore page 1"
                ></button>
                <button 
                    id="explore-dot-2" 
                    type="button" 
                    class="w-1.5 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer focus:outline-hidden"
                    aria-label="Go to explore page 2"
                ></button>
                <button 
                    id="explore-dot-3" 
                    type="button" 
                    class="w-1.5 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer focus:outline-hidden"
                    aria-label="Go to explore page 3"
                ></button>
            </div>

            <button 
                id="explore-next-btn" 
                type="button" 
                class="w-7 h-7 sm:w-8 sm:h-8 rounded-full border border-slate-300 hover:border-[#0E4174] text-slate-600 hover:text-[#0E4174] flex items-center justify-center transition-colors ml-3 cursor-pointer focus:outline-hidden"
                aria-label="Next explore articles"
            >
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>

    </div>
</section>
