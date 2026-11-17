{{--
Product Applications Section ("Designed for Diverse Applications")
Displays a 2-column grid of horizontal application cards featuring photo previews on the left
and detailed use-case descriptions on the right against an off-white background (#F3F3F3).

Customization:
Pass a custom title or applications array via props:
<x-product-applications-section :applications="$customApplications" />
--}}
@props([
    'title' => 'Designed for Diverse Applications',
    'applications' => null,
])

@php
    $defaultApplications = [
        [
            'id' => 'wedding-albums',
            'title' => 'Wedding Albums',
            'description' => 'Durable media for preserving wedding photographs and creating premium album pages designed for repeated viewing and handling.',
            'image' => 'images/products/applications/wedding-albums.jpg',
            'alt' => 'Wedding Albums durable synthetic photo album pages',
        ],
        [
            'id' => 'travel-albums',
            'title' => 'Travel Albums',
            'description' => 'Suitable for travel memories and photo albums where pages need greater resistance to everyday handling.',
            'image' => 'images/products/applications/travel-albums.jpg',
            'alt' => 'Travel Albums resistant to frequent handling and flipping',
        ],
        [
            'id' => 'newborn-photo-albums',
            'title' => 'Newborn Photo Albums',
            'description' => 'Designed for premium newborn and baby photography albums where image quality and durability are important.',
            'image' => 'images/products/applications/newborn-photo-albums.jpg',
            'alt' => 'Newborn Photo Albums archival keepsake prints',
        ],
        [
            'id' => 'family-portraits',
            'title' => 'Family Portraits',
            'description' => 'Suitable for preserving family portraits and creating durable printed photo products.',
            'image' => 'images/products/applications/family-portraits.jpg',
            'alt' => 'Family Portraits durable keepsake printing',
        ],
        [
            'id' => 'commercial-prints',
            'title' => 'Commercial Prints',
            'description' => 'Can be used for applications such as bag tags, certificates and playing cards where non-tear performance can add value.',
            'image' => 'images/products/applications/commercial-prints.jpg',
            'alt' => 'Commercial Prints luggage tags, certificates and playing cards',
        ],
    ];

    $items = $applications ?? $defaultApplications;
@endphp

<section id="product-applications" class="relative w-full py-[60px] sm:py-20 lg:py-[60px] bg-[#F3F3F3] select-none" aria-labelledby="product-applications-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Heading: Centered Bold Montserrat Navy --}}
        <div class="text-center mb-10 sm:mb-12 lg:mb-16">
            <h2 id="product-applications-heading" class="font-heading font-[700] text-[32px] sm:text-3xl md:text-[34px] lg:text-[32px] text-[#0E4174] tracking-tight">
                {{ $title }}
            </h2>
        </div>

        {{-- 2-Column Application Cards Grid --}}
        <div class="grid grid-cols-1 max-w-[1242px] lg:grid-cols-2 gap-[33px] sm:gap-7 lg:gap-[33px]">
            @foreach ($items as $app)
                <div id="product-app-card-{{ $app['id'] }}"
                     class="group bg-white rounded-[10px] sm:rounded-[10px] overflow-hidden shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col sm:flex-row items-stretch border border-slate-100/60">

                    {{-- Left Media Column: Application Image --}}
                    <div class="w-full sm:w-[38%] md:w-[35%] lg:w-[220px] shrink-0 min-h-[285px] sm:min-h-[285px] relative overflow-hidden bg-slate-100">
                        @if (!empty($app['image']))
                            <img 
                                src="{{ asset($app['image']) }}" 
                                alt="{{ $app['alt'] ?? $app['title'] }}"
                                class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-500 ease-out"
                                loading="lazy"
                            />
                        @else
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400 text-xs uppercase font-sans tracking-wider">
                                Image Coming Soon
                            </div>
                        @endif
                    </div>

                    {{-- Right Content Column: Title & Description --}}
                    <div class="w-full sm:w-[62%] md:w-[65%] lg:w-[62%] p-6 sm:p-7 md:p-8 flex flex-col justify-center">
                        <h3 class="font-heading font-[600] text-[28px] sm:text-xl md:text-[21px] text-[#0E4174] tracking-tight leading-snug">
                            {{ $app['title'] }}
                        </h3>
                        <p class="mt-2.5 sm:mt-3 font-sans text-[16px] font-[500] sm:text-sm md:text-[14px] text-[#000000] leading-relaxed font-normal">
                            {{ $app['description'] }}
                        </p>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

