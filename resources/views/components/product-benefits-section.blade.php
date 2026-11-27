{{--
Product Key Benefits Section ("Where the Material Makes a Difference")
Displays a centered narrative block with a KEY BENEFITS overline and a 3-column
row of benefit callouts accented with left vertical rules.

Customization:
Pass custom title, description, overline, or benefits array via props:
<x-product-benefits-section :title="$title" :description="$description" :benefits="$benefits" />
--}}
@props([
    'title' => 'Where the Material Makes a Difference',
    'description' => null,
    'overline' => 'KEY BENEFITS',
    'benefits' => null,
])

@php
    $defaultDescription = 'Photobooks and albums benefit from pages designed for repeated handling. Selected commercial print applications, such as tags and speciality printed pieces, can also use non-tear media where tear resistance is a priority.';

    $defaultBenefits = [
        'Resistance to tearing compared with conventional paper, subject to the selected grade.',
        'Choice of product formats and finishes as per the available range.',
        'Potential for long-lasting handled print applications when the complete workflow is suitable.',
    ];

    $displayDescription = $description ?? $defaultDescription;
    $items = $benefits ?? $defaultBenefits;
@endphp

<section id="product-benefits" class="relative w-full py-14 sm:py-16 lg:py-[76px] bg-white select-none"
    aria-labelledby="product-benefits-heading">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Heading --}}
        <h2 id="product-benefits-heading"
            class="font-heading font-[700] text-[26px] sm:text-[30px] lg:text-[32px] text-[#0E4174] tracking-tight leading-tight">
            {{ $title }}
        </h2>

        {{-- Supporting Narrative --}}
        @if (!empty($displayDescription))
            <p
                class="mt-3 sm:mt-4 max-w-3xl font-sans font-normal text-[14px] sm:text-[15px] text-[#1E1E1E] leading-relaxed">
                {{ $displayDescription }}
            </p>
        @endif

        {{-- Overline & 3-Column Benefits Row --}}
        @if (!empty($items))
            @if (!empty($overline))
                <div class="mt-9 sm:mt-11 mb-5 sm:mb-6">
                    <span class="font-heading font-[600] text-[12px] sm:text-[13px] tracking-[0.18em] uppercase text-[#0E4174]">
                        {{ $overline }}
                    </span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 lg:gap-10">
                @foreach ($items as $benefit)
                    <div class="border-l-[1.5px] border-[#353535] pl-4 py-0.5">
                        <p class="font-sans font-normal text-[13.5px] sm:text-[14px] text-[#1E1E1E] leading-relaxed">
                            {{ $benefit }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>