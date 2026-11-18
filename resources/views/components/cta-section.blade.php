{{-- Call to Action / Let's Build the Future Together Section --}}
@props([
    'headline' => 'Let’s Build the Future Together.',
    'description' => 'Have a requirement, need help finding the right media solutions, or want to explore an opportunity with Polyplex DigiPrint? Connect with our team.',
    'buttonText' => 'Contact Us',
    'buttonUrl' => null,
    'bg' => 'bg-white',
])

@php
    $actionUrl = $buttonUrl ?? route('contact');
@endphp

<section id="contact" class="relative z-10 w-full py-14 sm:py-20 lg:py-24 {{ $bg }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl text-left">

            {{-- Main Headline: Montserrat Bold --}}
            <h2
                class="font-heading font-[700] text-3xl sm:text-4xl lg:text-[40px] text-[#0E4174] tracking-tight leading-[1.15]">
                {{ $headline }}
            </h2>

            {{-- Narrative Copy: Inter regular --}}
            <p
                class="font-sans max-w-[640px] text-[#000000] text-[15px] min-[360px]:text-[16px] sm:text-base leading-relaxed mt-4 mb-8">
                {{ $description }}
            </p>

            {{-- Action Button: Deep Navy --}}
            <div>
                <a href="{{ $actionUrl }}"
                    class="inline-flex items-center justify-center py-[10px] px-[22px] rounded-xs bg-[#003570] hover:bg-[#071d36] text-white font-medium text-sm transition-colors shadow-xs focus:outline-hidden focus:ring-2 focus:ring-[#0b2b4e] focus:ring-offset-2">
                    {{ $buttonText }}
                </a>
            </div>

        </div>
    </div>
</section>