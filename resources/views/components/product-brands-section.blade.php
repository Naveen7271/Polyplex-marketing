{{--
Product Brands Section ("Explore our Brands for {Product Name}")
Displays the signature brand cards for a specific product category on white cards,
set against an atmospheric dark gradient background with branded red (left) and blue (right) glows.

Customization:
Pass a custom title, product name, or brand array via props:
<x-product-brands-section product-name="Non-Tear Media" :brands="$brands" />
--}}
@props([
    'title' => null,
    'productName' => 'Non-Tear Media',
    'brands' => null,
])

@php
    $defaultBrands = [
        [
            'id' => 'novalife',
            'name' => 'NovaLife',
            'subtitle' => 'Premium Non-tear Media',
            'logo' => 'images/brands/logos/novalife.png',
            'alt' => 'NovaLife - Premium Non-tear Media',
            'url' => '#novalife',
        ],
        [
            'id' => 'novajet',
            'name' => 'NovaJet',
            'subtitle' => 'Digital Wide Format Media',
            'logo' => 'images/brands/logos/novajet-wide.png',
            'alt' => 'NovaJet - Digital Wide Format Media',
            'url' => '#novajet',
        ],
        [
            'id' => 'saraprint',
            'name' => 'Saraprint',
            'subtitle' => 'Coloring Digitally with Innovation',
            'logo' => 'images/brands/logos/saraprint.png',
            'alt' => 'Saraprint - Coloring Digitally with Innovation',
            'url' => '#saraprint',
        ],
    ];

    $items = $brands ?? $defaultBrands;
    $headingTitle = $title ?? ('Explore our Brands for ' . $productName);
@endphp

@if(!empty($items) && count($items) > 0)
<section id="product-brands-section" class="relative w-full py-[80px] sm:py-20 lg:py-[80px] overflow-hidden select-none"
    style="background: radial-gradient(ellipse 65% 85% at 0% 50%, rgba(135, 10, 25, 0.45) 0%, rgba(4, 7, 16, 0) 70%),
               radial-gradient(ellipse 65% 85% at 100% 50%, rgba(14, 65, 116, 0.5) 0%, rgba(4, 7, 16, 0) 70%),
               #040710;" aria-labelledby="product-brands-heading">

    {{-- Atmospheric Ambient Glow Orbs for Red & Blue Depth --}}
    <div class="absolute -top-24 -left-24 w-80 h-80 bg-red-600/15 rounded-full blur-3xl pointer-events-none"
        aria-hidden="true"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"
        aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Heading: Centered Bold White Montserrat --}}
        <div class="text-center mb-10 sm:mb-12 lg:mb-14">
            <h2 id="product-brands-heading"
                class="font-heading font-[700] text-[32px] sm:text-3xl md:text-[32px] lg:text-[32px] text-white tracking-tight drop-shadow-[0_2px_10px_rgba(0,0,0,0.6)]">
                {{ $headingTitle }}
            </h2>
        </div>

        @php
            $containerClasses = match (count($items)) {
                1 => 'max-w-xs sm:max-w-sm mx-auto flex justify-center',
                2 => 'max-w-2xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6 lg:gap-8 justify-center',
                default => 'max-w-4xl lg:max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 justify-center',
            };
            $cardClasses = count($items) === 1 ? 'w-full ' : '';
        @endphp

        {{-- Centered Brand Cards Grid --}}
        <div class="{{ $containerClasses }}">
            @foreach ($items as $brand)
                <a href="{{ $brand['url'] ?? '#' . $brand['id'] }}" id="product-brand-card-{{ $brand['id'] }}"
                    class="{{ $cardClasses }}group relative bg-white rounded-[5px] sm:rounded-[5px] p-6 sm:p-7 min-h-[207px] min-w-[301px] sm:min-h-[207px] md:min-h-[207px] min-w-[301px] flex flex-col items-center justify-center text-center shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 focus:outline-hidden focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-slate-900 cursor-pointer">

                    {{-- Brand Logo Graphic --}}
                    <div class="flex items-center justify-center h-10 sm:h-11 w-full px-2">
                        @if (!empty($brand['logo']))
                            <img src="{{ asset($brand['logo']) }}" alt="{{ $brand['alt'] ?? $brand['name'] }}"
                                class="max-h-9 sm:max-h-10 w-auto max-w-[170px] object-contain transition-transform duration-300 group-hover:scale-105"
                                loading="lazy" />
                        @else
                            <span class="font-heading font-bold text-xl sm:text-2xl text-red-600">
                                {{ $brand['name'] }}
                            </span>
                        @endif
                    </div>

                    {{-- Brand Subtitle --}}
                    <p
                        class="mt-2.5 sm:mt-3 font-sans text-xs sm:text-[13px] text-slate-800 font-normal tracking-tight text-center leading-snug line-clamp-2">
                        {{ $brand['subtitle'] }}
                    </p>

                </a>
            @endforeach
        </div>

    </div>
</section>
@endif