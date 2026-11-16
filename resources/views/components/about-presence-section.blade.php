@php
    $items = [
        [
            'type' => 'image',
            'image' => asset('images/about-presence-1.png'),
            'alt' => 'Polyplex Corporate Headquarters & Manufacturing Facility',
        ],
        [
            'type' => 'text',
            'text' => 'Our global presence in 60+ countries highlights our significant footprint and track record worldwide.',
        ],
        [
            'type' => 'image',
            'image' => asset('images/about-presence-3.png'),
            'alt' => 'Polyplex Global Operations Center',
        ],
        [
            'type' => 'text',
            'text' => 'A strong operational network of 9 manufacturing locations, 2 R&D facilities and 12 distribution & conversion centers in India.',
        ],
        [
            'type' => 'image',
            'image' => asset('images/about-presence-2.png'),
            'alt' => 'Polyplex State-of-the-Art Production Facility',
        ],
        [
            'type' => 'text',
            'text' => '700+ regional partners across India combine scale with regional strength, helping us serve customers across diverse markets.',
        ],
    ];
@endphp

{{-- Our Presence Section --}}
<section id="about-presence-section" class="w-full bg-[#F3F3F3] py-[60px] sm:py-20 lg:py-[60px]">
    <div class="mx-auto max-w-[1240px]">
        {{-- Section Title --}}
        <h2
            class="mb-[39px] text-center font-heading text-[32px] font-[700] text-[#0E4174] sm:mb-16 sm:text-4xl lg:mb-[39px] lg:text-[32px]">
            Our Presence
        </h2>

        {{-- 3x2 Checkerboard Grid --}}
        <div class="grid grid-cols-1 items-stretch sm:grid-cols-2  lg:grid-cols-3 ">
            @foreach ($items as $idx => $item)
                @if ($item['type'] === 'image')
                    {{-- Image Cell (user can update images manually) --}}
                    <div class="relative aspect-4/3 w-full overflow-hidden bg-slate-100 shadow-2xs">
                        <img src="{{ $item['image'] }}" alt="{{ $item['alt'] }}"
                            class="block h-full w-full object-cover object-center transition-transform duration-500 hover:scale-105"
                            loading="lazy" />
                    </div>
                @else
                    {{-- Text Cell --}}
                    <div class="flex aspect-4/3 w-full items-center bg-[#FFFFFF] justify-center p-6 text-center sm:p-8">
                        <p
                            class="mx-auto max-w-xs font-sans text-[16px] font-[500] leading-[24px] text-[#1E1E1E] sm:text-base lg:text-[16px]">
                            {{ $item['text'] }}
                        </p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>