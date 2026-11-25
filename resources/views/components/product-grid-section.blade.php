{{--
Product Grid Section ("Discover Our Products")
Displays a 3x3 interactive card grid showcasing Polyplex DigiPrint's 9 product lines.

Note:
Image files are located at public/images/products/.
You can replace these images at any time with high-resolution assets or pass custom products via props:
<x-product-grid-section :products="$customProducts" />
--}}
@props([
    'title' => 'Discover Our Products',
    'products' => null,
])

@php
    $defaultProducts = [
        [
            'id' => 'non-tear-media',
            'title' => 'Non-Tear Media',
            'title_lines' => ['Non-Tear', 'Media'],
            'image' => 'images/products/non-tear-media.jpg',
            'url' => '#non-tear-media',
            'alt' => 'Non-Tear Media durable synthetic substrates',
        ],
        [
            'id' => 'gloss-art-paper',
            'title' => 'Gloss Art Paper Media',
            'title_lines' => ['Gloss Art', 'Paper Media'],
            'image' => 'images/products/gloss-art-paper-media.jpg',
            'url' => '#gloss-art-paper',
            'alt' => 'Gloss Art Paper Media premium lookbook catalogue',
        ],
        [
            'id' => 'inkjet-photo-media',
            'title' => 'Inkjet Photo Media',
            'title_lines' => ['Inkjet Photo', 'Media'],
            'image' => 'images/products/inkjet-photo-media.jpg',
            'url' => '#inkjet-photo-media',
            'alt' => 'Inkjet Photo Media fine art gallery exhibition substrate',
        ],
        [
            'id' => 'digital-labels',
            'title' => 'Digital Labels',
            'title_lines' => ['Digital Labels'],
            'image' => 'images/products/digital-labels.jpg',
            'url' => '#digital-labels',
            'alt' => 'Digital Labels packaging and branding applications',
        ],
        [
            'id' => 'multi-purpose-labels',
            'title' => 'Multi-Purpose Labels',
            'title_lines' => ['Multi-Purpose', 'Labels'],
            'image' => 'images/products/multi-purpose-labels.jpg',
            'url' => '#multi-purpose-labels',
            'alt' => 'Multi-Purpose Labels commercial and retail price tags',
        ],
        [
            'id' => 'digital-wide-format',
            'title' => 'Digital Wide-Format Media',
            'title_lines' => ['Digital Wide-', 'Format Media'],
            'image' => 'images/products/digital-wide-format-media.jpg',
            'url' => '#digital-wide-format',
            'alt' => 'Digital Wide-Format Media commercial backlit signage display',
        ],
        [
            'id' => 'reprographic-media',
            'title' => 'Reprographic Media',
            'title_lines' => ['Reprographic', 'Media'],
            'image' => 'images/products/reprographic-media.jpg',
            'url' => '#reprographic-media',
            'alt' => 'Reprographic Media engineering blueprints and drafting media',
        ],
        [
            'id' => 'polyester-offset-plates',
            'title' => 'Polyester Offset Plates',
            'title_lines' => ['Polyester Offset', 'Plates'],
            'image' => 'images/products/polyester-offset-plates.jpg',
            'url' => '#polyester-offset-plates',
            'alt' => 'Polyester Offset Plates commercial offset press plates',
        ],
        [
            'id' => 'laser-inkjet-positive-films',
            'title' => 'Laser and Inkjet Positive Films',
            'title_lines' => ['Laser and Inkjet', 'Positive Films'],
            'image' => 'images/products/laser-and-inkjet-positive-films.jpg',
            'url' => '#laser-inkjet-positive-films',
            'alt' => 'Laser and Inkjet Positive Films screen and offset prepress imaging',
        ],
    ];

    try {
        $dbProducts = \Illuminate\Support\Facades\Schema::hasTable('products')
            ? \App\Models\Product::where('is_active', true)->orderBy('sort_order')->get()
            : collect();
    } catch (\Throwable) {
        $dbProducts = collect();
    }
    if ($products !== null) {
        $items = $products;
    } elseif ($dbProducts->isNotEmpty()) {
        $items = $dbProducts->map(function ($p) {
            $words = explode(' ', $p->name);
            $mid = ceil(count($words) / 2);
            $line1 = implode(' ', array_slice($words, 0, (int)$mid));
            $line2 = implode(' ', array_slice($words, (int)$mid));
            return [
                'id' => $p->slug,
                'title' => $p->name,
                'title_lines' => $line2 ? [$line1, $line2] : [$line1],
                'image' => $p->banner_image ?? ('images/products/' . $p->slug . '.jpg'),
                'url' => route('products.show', $p->slug),
                'alt' => $p->name,
            ];
        })->toArray();
    } else {
        $items = $defaultProducts;
    }
@endphp

<section id="discover-products"
    class="relative w-full bg-white py-[60px] sm:py-[60px] md:py-[60px] lg:py-[60px] select-none"
    aria-labelledby="discover-products-heading">
    <div class="max-w-[1181px] mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Heading: Centered Navy Montserrat --}}
        <div class="text-center mb-10 sm:mb-12 lg:mb-16">
            <h2 id="discover-products-heading"
                class="font-heading font-[700] text-[32px] sm:text-3xl md:text-[34px] lg:text-[32px] text-[#0E4174] tracking-tight">
                {{ $title }}
            </h2>
        </div>

        {{-- 3x3 Products Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[106px] sm:gap-7 lg:gap-[106px] xl:gap-[106px]">
            @foreach ($items as $product)
                <a href="{{ isset($product['url']) && !str_starts_with($product['url'], '#') ? $product['url'] : route('products.show', $product['id']) }}"
                    id="product-card-{{ $product['id'] }}"
                    class="group relative block aspect-[4/5] sm:aspect-[4/5] rounded-[5px] sm:rounded-[5px] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:ring-offset-2">

                    {{-- Card Image (User can replace in public/images/products/ or pass via props) --}}
                    @if (!empty($product['image']))
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['alt'] ?? $product['title'] }}"
                            class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-700 ease-out will-change-transform"
                            loading="lazy" />
                    @else
                        {{-- Fallback Placeholder when image is not yet added --}}
                        <div
                            class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-950 flex items-center justify-center">
                            <span class="text-slate-500 font-sans text-xs uppercase tracking-wider">Image Coming Soon</span>
                        </div>
                    @endif

                    {{-- Top Gradient Overlay for Optimal Text Readability --}}
                    <div class="absolute inset-0 bg-gradient-to-b from-black/65 via-black/15 to-black/35 group-hover:from-black/75 group-hover:via-black/20 group-hover:to-black/45 transition-colors duration-300 pointer-events-none"
                        aria-hidden="true"></div>

                    {{-- Product Title Overlay (Top-Left Positioned) --}}
                    <div class="absolute top-0 left-0 right-0 p-[22px] sm:p-6 lg:p-[22px] z-10 pointer-events-none">
                        <h3
                            class="font-sans font-[700] text-[28px] sm:text-xl md:text-[21px] lg:text-[28px] text-white tracking-tight leading-[1.25] drop-shadow-[0_2px_8px_rgba(0,0,0,0.85)]">
                            @if (!empty($product['title_lines']) && is_array($product['title_lines']))
                                @foreach ($product['title_lines'] as $line)
                                    <span class="block">{{ $line }}</span>
                                @endforeach
                            @else
                                {{ $product['title'] }}
                            @endif
                        </h3>
                    </div>

                    {{-- Subtle hover indicator pill in bottom-right --}}
                    <div
                        class="absolute bottom-4 right-4 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/20 backdrop-blur-xs text-white">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </span>
                    </div>

                </a>
            @endforeach
        </div>

    </div>
</section>