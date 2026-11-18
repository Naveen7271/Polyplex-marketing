@php
    $boxes = [
        [
            'id' => 1,
            'title' => 'Controlled Material Inputs',
            'description' => 'Controlled material inputs help establish consistency across manufacturing processes and support reliable product performance.',
            'image' => asset('images/about-manufacturing-1.jpg'),
            'icon' => 'badge-check',
        ],
        [
            'id' => 2,
            'title' => 'Process & Formulation Expertise',
            'description' => 'Our process and formulation expertise enables us to translate material knowledge into products designed for specific print and application requirements.',
            'image' => asset('images/about-manufacturing-2.jpg'),
            'icon' => 'brain-circuit',
        ],
        [
            'id' => 3,
            'title' => 'Application-Based Quality Control',
            'description' => 'Quality control is aligned with application requirements to help ensure that products deliver consistent and reliable performance in their intended use.',
            'image' => asset('images/about-manufacturing-3.jpg'),
            'icon' => 'chart-no-axes-column-increasing',
        ],
    ];
@endphp

{{-- Manufacturing Excellence Section --}}
<section id="about-manufacturing-section" class="relative w-full bg-[#F3F3F3]">
    {{-- Top Background Banner with Heading --}}
    <div class="relative w-full pb-[200px] pt-[66px] sm:pb-36 sm:pt-20 lg:pb-[221px] lg:pt-[66px]">
        {{-- Background Image with Dark Overlay --}}
        <div class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('images/about-manufacturing-bg.png') }}"
                alt="Manufacturing Excellence - Polyplex Production Facility"
                class="h-full w-full object-cover object-center" />
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        {{-- Section Title --}}
        <div class="relative z-10 mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="font-heading text-[32px] font-[700] tracking-tight text-[#F3F3F3] sm:text-4xl lg:text-[32px]">
                Manufacturing Excellence
            </h2>
        </div>
    </div>

    {{-- Floating Card with 3 Interactive Hover Boxes --}}
    <div
        class="relative z-20 mx-auto -mt-28 sm:-mt-32 md:-mt-36 lg:-mt-[150px] max-w-[1301px] px-4 sm:px-6 lg:px-8 pb-12 sm:pb-16 lg:pb-20">
        <div class="grid grid-cols-1 overflow-hidden bg-white shadow-xl md:grid-cols-3">
            @foreach ($boxes as $box)
                <div class="group relative mx-auto md:mx-0 w-full min-h-[300px] sm:min-h-[340px] md:h-[477px] overflow-hidden py-10 px-6 sm:py-14 sm:px-10 lg:py-[140px] lg:px-[70px] cursor-pointer transition-all duration-300 border-b md:border-b-0 md:border-r border-slate-100 last:border-b-0 last:border-r-0"
                    tabindex="0">
                    {{-- Hover Background Image with Dark Overlay --}}
                    <div
                        class="pointer-events-none absolute inset-0 z-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100 group-focus:opacity-100">
                        <img src="{{ $box['image'] }}" alt="{{ $box['title'] }}"
                            class="h-full w-full scale-100 object-cover object-center transition-transform duration-500 ease-out group-hover:scale-105"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-slate-950/75"></div>
                    </div>

                    {{-- Box Content --}}
                    <div class="relative z-10 flex h-full flex-col justify-start">
                        {{-- Icon --}}
                        <div class="mb-[20px]">
                            @if ($box['icon'] === 'badge-check' || $box['icon'] === 'check-circle')
                                <img src="{{ asset('images/badge-check.png') }}" alt="{{ $box['title'] }}"
                                    class="h-8 w-8 object-contain transition-all duration-300 group-hover:brightness-0 group-hover:invert group-focus:brightness-0 group-focus:invert" />
                            @elseif ($box['icon'] === 'brain-circuit' || $box['icon'] === 'brain')
                                <img src="{{ asset('images/brain-circuit.png') }}" alt="{{ $box['title'] }}"
                                    class="h-8 w-8 object-contain transition-all duration-300 group-hover:brightness-0 group-hover:invert group-focus:brightness-0 group-focus:invert" />
                            @elseif ($box['icon'] === 'chart-no-axes-column-increasing' || $box['icon'] === 'bars')
                                <img src="{{ asset('images/chart-no-axes-column-increasing.png') }}" alt="{{ $box['title'] }}"
                                    class="h-8 w-8 object-contain transition-all duration-300 group-hover:brightness-0 group-hover:invert group-focus:brightness-0 group-focus:invert" />
                            @else
                                <img src="{{ $box['icon'] }}" alt="{{ $box['title'] }}"
                                    class="h-8 w-8 object-contain transition-all duration-300 group-hover:brightness-0 group-hover:invert group-focus:brightness-0 group-focus:invert" />
                            @endif
                        </div>

                        {{-- Title --}}
                        <h3
                            class="mb-[12px] font-heading text-[24px] font-[600] leading-tight text-[#000000] transition-colors duration-300 group-hover:text-white group-focus:text-white sm:text-[24px]">
                            {{ $box['title'] }}
                        </h3>

                        {{-- Description --}}
                        <p
                            class="font-sans text-[14px] font-[400] leading-[19px] text-[#000000] transition-colors duration-300 group-hover:text-white/90 group-focus:text-white/90 sm:text-[14px]">
                            {{ $box['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>