{{-- Call to Action / Application Guidance Section --}}
@props([
    'headline' => 'Have an Application in Mind? Let’s Find the Right Media.',
    'description' => 'Share your printing technology, end use and preferred format. Our team will help you explore suitable product options.',
    'buttonText' => 'Explore Our Products',
    'buttonText2' => 'Request Product Guidance',
    'productsUrl' => null,
    'buttonUrl' => null,
    'bg' => 'bg-[#191A1A]',
])

@php
    $exploreUrl = $productsUrl ?? route('products');
    $actionUrl = $buttonUrl ?? route('contact');
@endphp

<section id="contact" class="relative z-10 w-full py-12 sm:py-16 lg:py-[60px] {{ $bg }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-[1245px] mx-auto text-center">

            {{-- Main Headline: Montserrat Bold --}}
            <h2
                class="font-heading font-[700] text-2xl sm:text-3xl lg:text-[32px] text-white tracking-tight leading-[1.2]">
                {!! $headline !!}
            </h2>

            {{-- Narrative Copy: Inter regular --}}
            <p class="font-sans max-w-3xl mx-auto text-[#E5E5E5] text-[14px] sm:text-[15px] leading-relaxed mt-3 mb-7">
                {{ $description }}
            </p>

            {{-- Action Buttons: White Surface --}}
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ $exploreUrl }}"
                    class="inline-flex items-center justify-center py-[11px] px-[22px] rounded-[4px] bg-white hover:bg-neutral-100 text-[#191919] font-sans font-medium text-[14px] transition-colors shadow-xs focus:outline-hidden focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#191919]">
                    {{ $buttonText }}
                </a>
                <a href="{{ $actionUrl }}"
                    class="inline-flex items-center justify-center py-[11px] px-[22px] rounded-[4px] bg-white hover:bg-neutral-100 text-[#191919] font-sans font-medium text-[14px] transition-colors shadow-xs focus:outline-hidden focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#191919]">
                    {{ $buttonText2 }}
                </a>
            </div>

        </div>
    </div>
</section>