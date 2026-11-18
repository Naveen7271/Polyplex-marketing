{{--
Product / Brand Compatibility Section ("COMPATIBILITY")
Displays a 3-column grid of printing technology compatibility cards with photo preview headers,
bold headings, and descriptive body copy against a soft sky-blue gradient background.

Customization:
<x-product-compatibility-section 
    :overline="$overline" 
    :headline="$headline" 
    :technologies="$technologies" 
/>
--}}
@props([
    'overline' => 'COMPATIBILITY',
    'headline' => 'NovaJet supports multiple digital printing technologies, providing flexibility across different production environments.',
    'technologies' => null,
])

@php
    $defaultTechnologies = [
        [
            'id' => 'hp-indigo',
            'title' => 'HP Indigo',
            'description' => 'Compatible with HP Indigo digital printing technology for applications requiring digital production printing.',
            'image' => 'images/products/compatibility/hp-indigo.jpg',
            'fallbackImage' => 'images/products/applications/commercial-prints.jpg',
            'alt' => 'HP Indigo digital printing technology compatibility',
        ],
        [
            'id' => 'dry-toner',
            'title' => 'Dry Toner',
            'description' => 'Suitable for compatible dry toner printing systems used in digital production environments.',
            'image' => 'images/products/compatibility/dry-toner.jpg',
            'fallbackImage' => 'images/products/applications/travel-albums.jpg',
            'alt' => 'Dry toner digital printing technology compatibility',
        ],
        [
            'id' => 'inkjet-dye-pigment',
            'title' => 'Inkjet (Dye & Pigment)',
            'description' => 'Compatible with inkjet printing systems using both dye and pigment inks, supporting different printing requirements.',
            'image' => 'images/products/compatibility/inkjet.jpg',
            'fallbackImage' => 'images/products/applications/family-portraits.jpg',
            'alt' => 'Inkjet dye and pigment ink printing compatibility',
        ],
    ];

    $items = $technologies ?? $defaultTechnologies;
@endphp

<section id="product-compatibility" class="relative w-full py-16 sm:py-20 lg:py-24 select-none overflow-hidden"
    style="background: linear-gradient(180deg, #DCEAF8 0%, #EBF3FB 45%, #F7FAFD 80%, #FFFFFF 100%);"
    aria-labelledby="product-compatibility-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Overline: COMPATIBILITY in Polyplex Navy --}}
        @if (!empty($overline))
            <div class="text-center">
                <span class="font-heading font-semibold text-xs sm:text-[13px] text-[#0E4174] uppercase tracking-[0.2em]">
                    {{ $overline }}
                </span>
            </div>
        @endif

        {{-- Section Headline --}}
        @if (!empty($headline))
            <div class="text-center mt-3 mb-10 sm:mb-12 lg:mb-14 max-w-3xl mx-auto">
                <h2 id="product-compatibility-heading"
                    class="font-heading font-semibold text-[22px] sm:text-[25px] md:text-[28px] text-[#0E4174] leading-snug tracking-tight">
                    {{ $headline }}
                </h2>
            </div>
        @endif

        {{-- Compatibility Cards Grid (3-column for 3 items, 2x2 for 4 items, 2-col for 2 items) --}}
        @php
            $itemCount = count($items);
            $gridClass = match ($itemCount) {
                4 => 'max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-7 lg:gap-8',
                2 => 'max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-7 lg:gap-8',
                default => 'grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-7 lg:gap-8',
            };
        @endphp
        <div class="{{ $gridClass }}">
            @foreach ($items as $item)
                @php
                    $displayImage = null;
                    if (!empty($item['image']) && file_exists(public_path($item['image']))) {
                        $displayImage = $item['image'];
                    } elseif (!empty($item['fallbackImage']) && file_exists(public_path($item['fallbackImage']))) {
                        $displayImage = $item['fallbackImage'];
                    }
                @endphp

                <div id="compatibility-card-{{ $item['id'] ?? Str::slug($item['title']) }}"
                    class="group bg-white rounded-2xl shadow-sm hover:shadow-md border border-slate-100/90 overflow-hidden flex flex-col transition-all duration-200 hover:-translate-y-0.5">

                    {{-- Top Card Photo Container --}}
                    <div class="w-full h-48 sm:h-52 md:h-56 bg-slate-100 overflow-hidden relative">
                        @if ($displayImage)
                            <img src="{{ asset($displayImage) }}" alt="{{ $item['alt'] ?? $item['title'] }}"
                                class="w-full h-full object-cover object-center transition-transform duration-500 ease-out group-hover:scale-105"
                                loading="lazy" />
                        @else
                            {{-- Elegant Empty Placeholder Box until user adds manual image --}}
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100 text-slate-400 p-4">
                                <svg class="w-10 h-10 mb-2 stroke-slate-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                <span class="font-sans text-xs text-slate-400 font-medium">Image Placeholder</span>
                            </div>
                        @endif
                    </div>

                    {{-- Bottom Card Body --}}
                    <div class="p-6 sm:p-7 flex flex-col flex-1 justify-start">
                        <h3 class="font-heading font-semibold text-[19px] sm:text-[21px] text-[#000000] tracking-tight leading-snug mb-2 sm:mb-2.5">
                            {{ $item['title'] }}
                        </h3>

                        <p class="font-sans text-[13.5px] sm:text-[14px] leading-relaxed text-slate-600 font-normal">
                            {{ $item['description'] }}
                        </p>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
