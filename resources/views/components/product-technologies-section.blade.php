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

<section id="compatible-technologies" class="relative w-full py-14 sm:py-16 lg:py-[72px] bg-[#F3F3F3] select-none"
    aria-labelledby="compatible-technologies-heading">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Heading: Montserrat Bold Centered Navy --}}
        <div class="text-center mb-8 sm:mb-10 lg:mb-12">
            <h2 id="compatible-technologies-heading"
                class="font-heading font-[700] text-[26px] sm:text-3xl lg:text-[32px] text-[#0E4174] tracking-tight">
                {{ $title }}
            </h2>
        </div>

        @php
            $count = count($items);
            $gridClasses = match (true) {
                $count === 1 => 'grid grid-cols-1 max-w-md mx-auto',
                $count === 2 => 'grid grid-cols-1 sm:grid-cols-2 divide-y sm:divide-y-0 sm:divide-x divide-slate-200',
                $count === 4 => 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-slate-200',
                default => 'grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-slate-200',
            };
        @endphp

        {{-- Floating White Card with Divided Technology Items --}}
        <div class="bg-white rounded-[10px] shadow-[0_10px_30px_rgba(0,0,0,0.08)] border border-slate-100/80 px-5 py-4 sm:px-8 sm:py-6">
            <div class="{{ $gridClasses }}">
                @foreach ($items as $tech)
                    <div id="tech-card-{{ $tech['id'] }}"
                        class="flex items-center justify-start sm:justify-center gap-4 py-4 sm:py-2 px-4 sm:px-6">
                        <div class="shrink-0 flex items-center justify-center">
                            @if (!empty($tech['icon'] ?? $tech['image']))
                                <img src="{{ asset($tech['icon'] ?? $tech['image']) }}" alt="{{ $tech['alt'] ?? $tech['title'] }}"
                                    class="h-11 w-auto max-w-[84px] object-contain"
                                    loading="lazy" />
                            @endif
                        </div>

                        <h3 class="font-heading font-[600] text-[15px] sm:text-[16px] text-[#0E4174] leading-snug text-left">
                            {{ $tech['title'] }}
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>