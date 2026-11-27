{{--
Product Impact Banner ("Applications That Make an Impact")
Displays a full-width dark-to-blue gradient banner with an optional background image
and left-aligned white headline and narrative copy.

Customization:
Pass custom title, description, or bannerImage props:
<x-product-impact-banner :title="$title" :description="$description" :banner-image="$bannerImage" />
--}}
@props([
    'title' => 'Applications That Make an Impact',
    'description' => 'Engineered to meet varied printing requirements, our media supports diverse applications across commercial, industrial, retail and specialised environments with consistent performance and reliability.',
    'bannerImage' => null,
    'bannerAlt' => 'Applications That Make an Impact',
])

@php
    $resolvedBannerUrl = null;

    if (!empty($bannerImage)) {
        if (str_starts_with($bannerImage, 'http://') || str_starts_with($bannerImage, 'https://')) {
            $resolvedBannerUrl = $bannerImage;
        } elseif (
            file_exists(public_path($bannerImage))
            || (str_starts_with($bannerImage, 'storage/')
                && \Illuminate\Support\Facades\Storage::disk('public')->exists(\Illuminate\Support\Str::after($bannerImage, 'storage/')))
        ) {
            $resolvedBannerUrl = asset(implode('/', array_map('rawurlencode', explode('/', ltrim($bannerImage, '/')))));
        }
    }

    if ($resolvedBannerUrl === null) {
        $applicationsImageDir = public_path('images/products/applications');
        if (is_dir($applicationsImageDir)) {
            $allowedExtensions = ['png', 'jpg', 'jpeg', 'webp', 'avif', 'svg'];
            $normalizedTitle = strtolower((string) preg_replace('/[^a-z0-9]/i', '', $title));
            $candidates = array_unique(array_filter([
                $normalizedTitle,
                'applicationsimpactbanner',
            ]));

            foreach (scandir($applicationsImageDir) ?: [] as $file) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (!in_array($ext, $allowedExtensions, true)) {
                    continue;
                }
                $normalizedFile = strtolower((string) preg_replace('/[^a-z0-9]/i', '', pathinfo($file, PATHINFO_FILENAME)));
                if (in_array($normalizedFile, $candidates, true)) {
                    $resolvedBannerUrl = asset('images/products/applications/' . rawurlencode($file));
                    break;
                }
            }
        }
    }
@endphp

<section id="product-impact-banner"
    class="relative w-full min-h-[260px] sm:min-h-[280px] lg:min-h-[300px] flex items-center bg-[#061529] overflow-hidden select-none"
    aria-labelledby="product-impact-heading">

    {{-- Optional Background Image --}}
    @if ($resolvedBannerUrl)
        <img src="{{ $resolvedBannerUrl }}" alt="{{ $bannerAlt }}"
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none"
            loading="lazy" />
    @endif

    {{-- Left-to-Right Dark Navy Gradient Overlay --}}
    <div class="absolute inset-0 pointer-events-none"
        style="background: linear-gradient(90deg, rgba(2, 8, 18, 0.96) 0%, rgba(7, 29, 58, 0.90) 42%, rgba(14, 65, 116, 0.45) 72%, rgba(14, 65, 116, 0.15) 100%);"
        aria-hidden="true"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="max-w-xl">
            <h2 id="product-impact-heading"
                class="font-heading font-[700] text-[24px] sm:text-[28px] lg:text-[32px] text-white tracking-tight leading-snug">
                {{ $title }}
            </h2>

            @if (!empty($description))
                <p class="mt-3 sm:mt-4 font-sans font-normal text-[14px] sm:text-[15px] text-white/90 leading-relaxed">
                    {{ $description }}
                </p>
            @endif
        </div>
    </div>
</section>
