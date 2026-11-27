{{--
Product Application Categories Section
Displays categorised 3-card application carousels (Photography & Imaging, Medical & Diagnostic Imaging,
Cards & Personal Identification, Tags & Labels, Books, Documents & Publications, Retail, Advertising & Signage,
Educational, Recreational & Reference, and Specialised & Outdoor Applications).

Images can be placed in public/images/products/applications/ (any casing/spacing, e.g. Photobooks.png or photo-books.jpg)
or passed via the :categories prop.
--}}
@props([
    'categories' => null,
])

@php
    $defaultCategories = [
        [
            'id' => 'photography-imaging',
            'title' => 'Photography & Imaging',
            'hasCarousel' => true,
            'items' => [
                ['slug' => 'photo-books', 'title' => 'Photo Books'],
                ['slug' => 'memory-books', 'title' => 'Memory Books'],
                ['slug' => 'wedding-albums', 'title' => 'Wedding Albums'],
            ],
        ],
        [
            'id' => 'medical-diagnostic-imaging',
            'title' => 'Medical & Diagnostic Imaging',
            'hasCarousel' => true,
            'items' => [
                ['slug' => 'chest-x-ray-films', 'title' => 'Chest X-Ray Films'],
                ['slug' => 'dental-x-ray-films', 'title' => 'Dental X-Ray Films'],
                ['slug' => 'general-x-ray-films', 'title' => 'General X-Ray Films'],
            ],
        ],
        [
            'id' => 'cards-personal-identification',
            'title' => 'Cards & Personal Identification',
            'hasCarousel' => true,
            'items' => [
                ['slug' => 'business-cards', 'title' => 'Business Cards'],
                ['slug' => 'visiting-cards', 'title' => 'Visiting Cards'],
                ['slug' => 'identity-cards', 'title' => 'Identity Cards'],
            ],
        ],
        [
            'id' => 'tags-labels',
            'title' => 'Tags & Labels',
            'hasCarousel' => true,
            'items' => [
                ['slug' => 'industrial-tags', 'title' => 'Industrial Tags'],
                ['slug' => 'material-tags', 'title' => 'Material Tags'],
                ['slug' => 'baggage-tags', 'title' => 'Baggage Tags'],
            ],
        ],
        [
            'id' => 'books-documents-publications',
            'title' => 'Books, Documents & Publications',
            'hasCarousel' => true,
            'items' => [
                ['slug' => 'brochures', 'title' => 'Brochures'],
                ['slug' => 'catalogues', 'title' => 'Catalogues'],
                ['slug' => 'book-covers', 'title' => 'Book Covers'],
            ],
        ],
        [
            'id' => 'retail-advertising-signage',
            'title' => 'Retail, Advertising & Signage',
            'hasCarousel' => true,
            'items' => [
                ['slug' => 'pos-banners', 'title' => 'POS Banners'],
                ['slug' => 'placards', 'title' => 'Placards'],
                ['slug' => 'danglers', 'title' => 'Danglers'],
            ],
        ],
        [
            'id' => 'educational-recreational-reference',
            'title' => 'Educational, Recreational & Reference',
            'hasCarousel' => true,
            'items' => [
                ['slug' => 'floor-plans', 'title' => 'Floor Plans'],
                ['slug' => 'personalised-rulers', 'title' => 'Personalised Rulers'],
                ['slug' => 'mouse-pads', 'title' => 'Mouse Pads'],
            ],
        ],
        [
            'id' => 'specialised-outdoor-applications',
            'title' => 'Specialised & Outdoor Applications',
            'hasCarousel' => false,
            'items' => [
                ['slug' => 'airplane-tray-liners', 'title' => 'Airplane Tray Liners'],
                ['slug' => 'sporting-bibs', 'title' => 'Sporting Bibs'],
                ['slug' => 'table-mats-coasters', 'title' => 'Table Mats & Coasters'],
            ],
        ],
    ];

    $categoryList = $categories ?? $defaultCategories;

    $applicationsImageDir = public_path('images/products/applications');
    $applicationImageMap = [];

    if (is_dir($applicationsImageDir)) {
        $allowedExtensions = ['png', 'jpg', 'jpeg', 'webp', 'avif', 'svg'];
        foreach (scandir($applicationsImageDir) ?: [] as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (!in_array($ext, $allowedExtensions, true)) {
                continue;
            }
            $base = pathinfo($file, PATHINFO_FILENAME);
            $normalized = strtolower((string) preg_replace('/[^a-z0-9]/i', '', $base));
            if ($normalized !== '' && !isset($applicationImageMap[$normalized])) {
                $applicationImageMap[$normalized] = 'images/products/applications/' . rawurlencode($file);
            }
        }
    }

    $resolveItemImage = static function (array $item) use ($applicationImageMap): ?string {
        if (!empty($item['image'])) {
            if (str_starts_with($item['image'], 'http://') || str_starts_with($item['image'], 'https://')) {
                return $item['image'];
            }
            $existsInPublic = file_exists(public_path($item['image']));
            $existsInStorage = str_starts_with($item['image'], 'storage/')
                && \Illuminate\Support\Facades\Storage::disk('public')->exists(\Illuminate\Support\Str::after($item['image'], 'storage/'));
            if ($existsInPublic || $existsInStorage) {
                $encodedPath = implode('/', array_map('rawurlencode', explode('/', ltrim($item['image'], '/'))));
                return asset($encodedPath);
            }
        }

        $title = $item['title'] ?? '';
        $slug = $item['slug'] ?? \Illuminate\Support\Str::slug($title);

        $candidates = array_unique(array_filter([
            strtolower((string) preg_replace('/[^a-z0-9]/i', '', $slug)),
            strtolower((string) preg_replace('/[^a-z0-9]/i', '', $title)),
            strtolower((string) preg_replace('/[^a-z0-9]/i', '', str_replace('&', 'and', $title))),
        ]));

        foreach ($candidates as $key) {
            if (isset($applicationImageMap[$key])) {
                return asset($applicationImageMap[$key]);
            }
        }

        return null;
    };
@endphp

<section id="product-application-categories" class="relative w-full py-12 sm:py-16 lg:py-20 bg-white select-none"
    aria-label="Product Application Categories">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 sm:space-y-14 lg:space-y-16">
        @foreach ($categoryList as $category)
            @php
                $hasCarousel = $category['hasCarousel'] ?? (count($category['items']) > 3);
                $items = $category['items'] ?? [];
                $pages = count($items) > 3 ? array_chunk($items, 3) : [$items];
                $dotCount = $hasCarousel ? max(3, count($pages)) : 0;
            @endphp

            <div class="app-category-carousel" data-category-id="{{ $category['id'] }}" data-has-carousel="{{ $hasCarousel ? 'true' : 'false' }}">
                {{-- Category Heading aligned with cards --}}
                <div class="{{ $hasCarousel ? 'px-7 sm:px-10' : 'px-0 sm:px-10' }} mb-4 sm:mb-5">
                    <h3 class="font-heading font-[700] text-[20px] sm:text-[22px] lg:text-[24px] text-[#0E4174] tracking-tight">
                        {{ $category['title'] }}
                    </h3>
                </div>

                {{-- Carousel / Grid Row with Flanking Arrows --}}
                <div class="relative {{ $hasCarousel ? 'px-7 sm:px-10' : 'px-0 sm:px-10' }}">
                    @if ($hasCarousel)
                        <button type="button"
                            class="app-cat-prev absolute left-0 top-1/2 -translate-y-1/2 w-7 h-7 flex items-center justify-center text-slate-600 hover:text-[#0E4174] transition-colors cursor-pointer focus:outline-hidden"
                            aria-label="Previous {{ $category['title'] }}">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                    @endif

                    @foreach ($pages as $pageIdx => $pageItems)
                        <div class="app-cat-page {{ $pageIdx > 0 ? 'hidden ' : '' }}grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                            @foreach ($pageItems as $item)
                                @php
                                    $imgSrc = $resolveItemImage($item);
                                @endphp
                                <div class="app-cat-card bg-white rounded-[4px] border border-slate-200/90 p-2.5 sm:p-3 flex flex-col transition-shadow hover:shadow-md">
                                    <div class="w-full aspect-[16/10] bg-slate-100 overflow-hidden rounded-[2px]">
                                        @if ($imgSrc)
                                            <img src="{{ $imgSrc }}" alt="{{ $item['alt'] ?? $item['title'] }}"
                                                class="w-full h-full object-cover object-center" loading="lazy" />
                                        @else
                                            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-[11px] font-sans uppercase tracking-wider text-slate-400">
                                                {{ $item['title'] }}
                                            </div>
                                        @endif
                                    </div>
                                    <p class="mt-2.5 sm:mt-3 px-0.5 pb-0.5 font-sans font-[500] text-[13px] sm:text-[14px] text-[#1E1E1E] leading-snug">
                                        {{ $item['title'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    @if ($hasCarousel)
                        <button type="button"
                            class="app-cat-next absolute right-0 top-1/2 -translate-y-1/2 w-7 h-7 flex items-center justify-center text-slate-600 hover:text-[#0E4174] transition-colors cursor-pointer focus:outline-hidden"
                            aria-label="Next {{ $category['title'] }}">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                    @endif
                </div>

                {{-- Pagination Dots --}}
                @if ($hasCarousel && $dotCount > 0)
                    <div class="flex items-center justify-center gap-2 mt-4" aria-label="{{ $category['title'] }} pagination">
                        @for ($d = 0; $d < $dotCount; $d++)
                            <button type="button"
                                class="app-cat-dot w-1.5 h-1.5 rounded-full transition-colors cursor-pointer focus:outline-hidden {{ $d === 0 ? 'bg-slate-900' : 'bg-slate-300 hover:bg-slate-400' }}"
                                data-index="{{ $d }}"
                                aria-label="Go to {{ $category['title'] }} slide {{ $d + 1 }}"></button>
                        @endfor
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>
