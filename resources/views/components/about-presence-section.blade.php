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
            'heading' => 'A strong operational network across India',
            'bullets' => [
                '9 manufacturing locations',
                '2 R&D facilities',
                '12 distribution & conversion centres',
            ],
        ],
        [
            'type' => 'image',
            'image' => asset('images/about-hero-2.png'),
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
                    <div class="flex aspect-4/3 w-full items-center bg-[#FFFFFF] justify-center p-6 sm:p-8">
                        @if (!empty($item['heading']) || !empty($item['bullets']))
                            <div class="mx-auto w-full max-w-[310px] text-left">
                                @if (!empty($item['heading']))
                                    <h3 class="font-heading text-[20px] font-[600] leading-[1.3] text-[#0E4174] sm:text-[21px]">
                                        {{ $item['heading'] }}
                                    </h3>
                                @endif
                                @if (!empty($item['bullets']))
                                    <ul
                                        class="mt-4 list-disc space-y-1.5 pl-5 font-sans text-[15px] font-[500] leading-[24px] text-[#1E1E1E] sm:text-[16px]">
                                        @foreach ($item['bullets'] as $bullet)
                                            <li>{{ $bullet }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @else
                            <p
                                class="mx-auto max-w-xs text-left font-sans text-[16px] font-[500] leading-[24px] text-[#1E1E1E] sm:text-base lg:text-[16px]">
                                {{ $item['text'] }}
                            </p>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>