{{--
Compatible Technologies Section ("Compatible Technologies")
Displays a 3-column grid of printer and digital press technology compatibility cards
with framed equipment previews and bold Polyplex Navy headings.

Customization:
Pass a custom title or technologies array via props:
<x-product-technologies-section :technologies="$customTechnologies" />
--}}
@props([
    'title' => 'Compatible Technologies',
    'technologies' => null,
])

@php
    $defaultTechnologies = [
        [
            'id' => 'hp-indigo',
            'title' => 'HP Indigo',
            'image' => 'images/products/technologies/hp-indigo.png',
            'alt' => 'HP Indigo commercial digital printing press compatibility',
        ],
        [
            'id' => 'dry-toner',
            'title' => 'Dry Toner',
            'image' => 'images/products/technologies/dry-toner.png',
            'alt' => 'Dry Toner laser and digital printing technology',
        ],
        [
            'id' => 'inkjet-dye-pigment',
            'title' => 'Inkjet Dye and Pigment',
            'image' => 'images/products/technologies/inkjet-dye-pigment.png',
            'alt' => 'Inkjet Dye and Pigment printing technology',
        ],
    ];

    $items = $technologies ?? $defaultTechnologies;
@endphp

<section id="compatible-technologies" class="relative w-full py-[72px] sm:py-20 lg:py-[72px] bg-white select-none"
    aria-labelledby="compatible-technologies-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Heading: Montserrat Bold Centered Navy --}}
        <div class="text-center mb-10 sm:mb-12 lg:mb-[73px]">
            <h2 id="compatible-technologies-heading"
                class="font-heading font-[700] text-[32px] sm:text-3xl md:text-[34px] lg:text-[32px] text-[#0E4174] tracking-tight">
                {{ $title }}
            </h2>
        </div>

        @php
            $containerClasses = match (count($items)) {
                1 => 'max-w-md mx-auto flex justify-center',
                2 => 'max-w-3xl lg:max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-7 lg:gap-8 justify-center',
                default => 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7 lg:gap-8',
            };
            $cardClasses = count($items) === 1 ? 'w-full ' : '';
        @endphp

        {{-- Technology Compatibility Cards Grid --}}
        <div class="{{ $containerClasses }}">
            @foreach ($items as $tech)
                <div id="tech-card-{{ $tech['id'] }}"
                    class="{{ $cardClasses }}group bg-[#F3F3F3] rounded-[1px] sm: p-5 sm:p-6 lg:p-[20px] flex flex-col items-center justify-between shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    {{-- Inner Framed Box Housing Equipment Preview --}}
                    <div
                        class="w-full rounded-[5px] sm: border border-slate-300/80 sm: flex items-center justify-center min-h-[162px] sm:min-h-[162px] md:min-h-[175px] overflow-hidden bg-transparent">
                        @if (!empty($tech['image']))
                            <img src="{{ asset($tech['image']) }}" alt="{{ $tech['alt'] ?? $tech['title'] }}"
                                class="max-h-[162px] max-w-[350px] w-auto object-contain transition-transform duration-500 ease-out group-hover:scale-105"
                                loading="lazy" />
                        @else
                            <div class="text-slate-400 font-sans text-xs uppercase tracking-wider">
                                Preview Coming Soon
                            </div>
                        @endif
                    </div>

                    {{-- Technology Title --}}
                    <h3
                        class="font-heading font-bold text-base sm:text-lg md:text-[19px] text-[#0E4174] tracking-tight mt-4 sm:mt-5 text-center leading-snug">
                        {{ $tech['title'] }}
                    </h3>

                </div>
            @endforeach
        </div>

    </div>
</section>