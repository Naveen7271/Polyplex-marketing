{{--
Product Features Section ("FEATURES")
Displays a modern 3-column grid of white feature cards with rounded borders,
Polyplex Navy titles, and clear descriptive copy against a clean white background.

Customization:
Pass a custom overline or features array via props:
<x-product-features-section overline="FEATURES" :features="$features" />
--}}
@props([
    'overline' => 'FEATURES',
    'features' => null,
])

@php
    $defaultFeatures = [
        [
            'id' => 'durability-tear-resistance',
            'title' => 'Durability and Tear Resistance',
            'description' => 'Designed to withstand tearing during handling and use, helping printed materials maintain their usability across different applications.',
        ],
        [
            'id' => 'versatile-application-potential',
            'title' => 'Versatile Application Potential',
            'description' => 'Suitable for photographic and general commercial applications where durable and reliable printed media is required.',
        ],
        [
            'id' => 'digital-production-printing',
            'title' => 'Digital Production Printing',
            'description' => 'Developed for digital production printing environments, supporting different printing requirements and production workflows.',
        ],
        [
            'id' => 'multiple-printing-technology-support',
            'title' => 'Multiple Printing Technology Support',
            'description' => 'Compatible with HP Indigo, dry toner and inkjet technologies, offering flexibility across different digital printing systems.',
        ],
        [
            'id' => 'dye-pigment-ink-compatibility',
            'title' => 'Dye and Pigment Ink Compatibility',
            'description' => 'Supports inkjet printing with both dye and pigment inks, accommodating different inkjet printing requirements.',
        ],
    ];

    $items = $features ?? $defaultFeatures;
@endphp

<section id="product-features" class="relative w-full py-14 sm:py-16 lg:py-20 bg-white select-none"
    aria-label="{{ $overline }} Section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Overline: FEATURES in Blue Uppercase Tracking --}}
        @if (!empty($overline))
            <div class="mb-8 sm:mb-10 lg:mb-12">
                <span class="font-heading font-semibold text-[13px] sm:text-[14px] text-[#0E4174] uppercase tracking-[0.16em]">
                    {{ $overline }}
                </span>
            </div>
        @endif

        {{-- 3-Column Responsive Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7 lg:gap-8">
            @foreach ($items as $feature)
                <div id="feature-card-{{ $feature['id'] ?? Str::slug($feature['title']) }}"
                    class="bg-white rounded-2xl border border-slate-200/90 p-7 sm:p-8 flex flex-col justify-start transition-all duration-200 hover:border-slate-300 hover:shadow-md">

                    {{-- Feature Title in Navy Montserrat --}}
                    <h3 class="font-heading font-semibold text-[20px] sm:text-[22px] leading-[1.3] text-[#0E4174] tracking-tight mb-3 sm:mb-4">
                        {{ $feature['title'] }}
                    </h3>

                    {{-- Feature Description --}}
                    <p class="font-sans text-[14px] sm:text-[14.5px] leading-relaxed text-slate-700 font-normal">
                        {{ $feature['description'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>

