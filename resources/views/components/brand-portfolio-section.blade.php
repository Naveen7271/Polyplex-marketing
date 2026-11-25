{{--
Brand Portfolio Section ("Our Brand Portfolio")
Displays a 4x3 interactive grid of Polyplex DigiPrint's 12 signature brands on white cards,
set against an atmospheric dark gradient background with branded red (left) and blue (right) glows.

Customization:
Pass a custom title or brand array via props:
<x-brand-portfolio-section :brands="$customBrands" />
--}}
@props([
    'title' => 'Our Brand Portfolio',
    'brands' => null,
])

@php
    $defaultBrands = [
        [
            'id' => 'saraprint',
            'name' => 'Saraprint',
            'subtitle' => 'Coloring Digitally with Innovation',
            'logo' => 'images/brands/logos/saraprint.png',
            'alt' => 'Saraprint - Coloring Digitally with Innovation',
            'url' => '#saraprint',
        ],
        [
            'id' => 'novacad',
            'name' => 'NovaCad',
            'subtitle' => 'Reprographic Media',
            'logo' => 'images/brands/logos/novacad.png',
            'alt' => 'NovaCad - Reprographic Media',
            'url' => '#novacad',
        ],
        [
            'id' => 'novadom',
            'name' => 'NovaDom',
            'subtitle' => 'Desktop Offset Plate',
            'logo' => 'images/brands/logos/novadom.png',
            'alt' => 'NovaDom - Desktop Offset Plate',
            'url' => '#novadom',
        ],
        [
            'id' => 'novajet-wide',
            'name' => 'NovaJet',
            'subtitle' => 'Digital Wide Format Media',
            'logo' => 'images/brands/logos/novajet-wide.png',
            'alt' => 'NovaJet - Digital Wide Format Media',
            'url' => '#novajet',
        ],
        [
            'id' => 'novajet-labels',
            'name' => 'NovaJet',
            'subtitle' => 'Multipurpose Labels',
            'logo' => 'images/brands/logos/novajet-wide.png',
            'alt' => 'NovaJet - Multipurpose Labels',
            'url' => '#novajet',
        ],
        [
            'id' => 'novalife',
            'name' => 'NovaLife',
            'subtitle' => 'Premium Non-tear Media',
            'logo' => 'images/brands/logos/novalife.png',
            'alt' => 'NovaLife - Premium Non-tear Media',
            'url' => '#novalife',
        ],
        [
            'id' => 'novasharp',
            'name' => 'NovaSharp',
            'subtitle' => 'Laser Printable Film',
            'logo' => 'images/brands/logos/novasharp.png',
            'alt' => 'NovaSharp - Laser Printable Film',
            'url' => '#novasharp',
        ],
        [
            'id' => 'novasign',
            'name' => 'NovaSign',
            'subtitle' => 'Digital Wide Format Media',
            'logo' => 'images/brands/logos/novasign.png',
            'alt' => 'NovaSign - Digital Wide Format Media',
            'url' => '#novasign',
        ],
        [
            'id' => 'novastick',
            'name' => 'NovaStick',
            'subtitle' => 'Self-Adhesive Labels',
            'logo' => 'images/brands/logos/novastick.png',
            'alt' => 'NovaStick - Self-Adhesive Labels',
            'url' => '#novastick',
        ],
        [
            'id' => 'polijet',
            'name' => 'PoliJet',
            'subtitle' => 'Desktop Offset Plate',
            'logo' => 'images/brands/logos/polijet.png',
            'alt' => 'PoliJet - Desktop Offset Plate',
            'url' => '#polijet',
        ],
        [
            'id' => 'posijet',
            'name' => 'PosiJet',
            'subtitle' => 'Inkjet Positive Film',
            'logo' => 'images/brands/logos/posijet.png',
            'alt' => 'PosiJet - Inkjet Positive Film',
            'url' => '#posijet',
        ],
        [
            'id' => 'novatrace',
            'name' => 'NovaTrace',
            'subtitle' => 'Tracing Paper',
            'logo' => 'images/brands/logos/novatrace.png',
            'alt' => 'NovaTrace - Tracing Paper',
            'url' => '#novatrace',
        ],
    ];

    try {
        $dbBrands = \Illuminate\Support\Facades\Schema::hasTable('brands') ? \App\Models\Brand::all() : collect();
    } catch (\Throwable) {
        $dbBrands = collect();
    }
    if ($brands !== null) {
        $items = $brands;
    } elseif ($dbBrands->isNotEmpty()) {
        $items = $dbBrands->map(function ($b) {
            return [
                'id' => $b->slug ?? (string) $b->id,
                'name' => $b->name,
                'subtitle' => $b->subtitle,
                'logo' => $b->logo,
                'alt' => $b->alt ?? ($b->name . ' - ' . $b->subtitle),
                'url' => $b->url ?? ('#' . ($b->slug ?? (string) $b->id)),
            ];
        })->toArray();
    } else {
        $items = $defaultBrands;
    }
@endphp

<section id="brand-portfolio" class="relative w-full py-[60px] sm:py-20 lg:py-[60px] overflow-hidden select-none" style="background: radial-gradient(ellipse 65% 85% at 0% 50%, rgba(135, 10, 25, 0.45) 0%, rgba(4, 7, 16, 0) 70%),
               radial-gradient(ellipse 65% 85% at 100% 50%, rgba(14, 65, 116, 0.5) 0%, rgba(4, 7, 16, 0) 70%),
               #040710;" aria-labelledby="brand-portfolio-heading">

    {{-- Subtle Ambient Glow Orbs for Extra Atmospheric Depth --}}
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-red-600/15 rounded-full blur-3xl pointer-events-none"
        aria-hidden="true"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"
        aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-3 lg:px-3">

        {{-- Section Heading: Montserrat Bold Centered White --}}
        <div class="text-center mb-10 sm:mb-12 lg:mb-[60px]">
            <h2 id="brand-portfolio-heading"
                class="font-heading font-[700] text-[32px] sm:text-3xl md:text-[34px] lg:text-[32px] text-white  drop-shadow-[0_2px_10px_rgba(0,0,0,0.6)]">
                {{ $title }}
            </h2>
        </div>

        {{-- 4x3 Brand Cards Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] sm:gap-5 lg:gap-[30px] justify-items-center justify-center">
            @foreach ($items as $brand)
                <a href="{{ $brand['url'] ?? '#' . $brand['id'] }}" id="brand-card-{{ $brand['id'] }}"
                    class="group relative mx-auto w-full max-w-[301px] h-[207px] bg-white rounded-[5px] p-5 sm:p-6 lg:p-7 min-h-[140px] sm:min-h-[148px] md:min-h-[155px] flex flex-col items-center justify-center text-center shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 focus:outline-hidden focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-slate-900 cursor-pointer">

                    {{-- Brand Logo Graphic --}}
                    <div class="flex items-center justify-center h-10 sm:h-11 w-full px-2">
                        @if (!empty($brand['logo']))
                            <img src="{{ asset($brand['logo']) }}" alt="{{ $brand['alt'] ?? $brand['name'] }}"
                                class="max-h-9 sm:max-h-10 w-auto max-w-[170px] object-contain transition-transform duration-300 group-hover:scale-105"
                                loading="lazy" />
                        @else
                            <span class="font-heading font-bold text-xl sm:text-2xl text-red-600">
                                {{ $brand['name'] }}
                            </span>
                        @endif
                    </div>

                    {{-- Brand Subtitle / Category Description --}}
                    <p
                        class="mt-2.5 sm:mt-3 font-sans text-xs sm:text-[13px] text-slate-800 font-normal tracking-tight text-center leading-snug line-clamp-2">
                        {{ $brand['subtitle'] }}
                    </p>

                </a>
            @endforeach
        </div>

    </div>
</section>