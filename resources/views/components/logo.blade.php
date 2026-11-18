{{--
    Company Logo Component
    Note: Official logo images are located in:
    - Light on dark: public/images/Polyplex Digiprint_RGB_Colour 1.png
    - Dark on light: public/images/Polyplex Digiprint_RGB_Colour 2.png
    If the file exists, it will automatically be displayed!
    Otherwise, this crisp SVG vector fallback matching Polyplex DigiPrint is shown.
--}}
@props(['light' => false])

@php
    $customLogoPath = null;
    $candidates = $light 
        ? [
            'images/Polyplex Digiprint_RGB_Colour 1.png',
            'images/Polyplex Digiprint_RGB_Colour 1.webp',
            'images/Polyplex Digiprint_RGB_Colour 1.jpg',
            'images/logo-white.svg',
            'images/logo-white.png',
            'images/logo.svg',
            'images/logo.png',
            'images/logo.webp',
            'images/logo.jpg',
        ]
        : [
            'images/Polyplex Digiprint_RGB_Colour 2.png',
            'images/Polyplex Digiprint_RGB_Colour 2.webp',
            'images/Polyplex Digiprint_RGB_Colour 2.jpg',
            'images/logo.svg',
            'images/logo.png',
            'images/logo.webp',
            'images/logo.jpg',
        ];
    foreach ($candidates as $path) {
        if (file_exists(public_path($path))) {
            $customLogoPath = asset($path);
            break;
        }
    }
@endphp

@if ($customLogoPath && (!$light || str_contains($customLogoPath, 'white') || str_contains($customLogoPath, 'Colour 1')))
    <img src="{{ $customLogoPath }}" alt="{{ config('app.name') === 'Laravel' ? 'Polyplex DigiPrint' : config('app.name', 'Polyplex DigiPrint') }}" {{ $attributes->merge(['class' => 'h-10 md:h-12 w-auto object-contain']) }}>
@else
    <div {{ $attributes->merge(['class' => 'inline-flex flex-col select-none']) }}>
        <div class="flex items-center gap-1">
            {{-- POLYPLEX Wordmark --}}
            <span class="font-heading font-black tracking-tighter text-2xl md:text-[26px] leading-none {{ $light ? 'text-white' : 'text-[#0b2b4e]' }}">
                POLYPLE<span class="{{ $light ? 'text-[#7cb342]' : 'text-[#7cb342]' }} italic inline-block transform -skew-x-6">X</span>
            </span>
        </div>
        
        <div class="flex items-center gap-1.5 mt-0.5">
            {{-- Dotted Matrix Pattern --}}
            <svg class="h-2.5 w-7 {{ $light ? 'text-white' : 'text-[#1e293b]' }}" viewBox="0 0 28 10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <circle cx="2" cy="2" r="1.2" />
                <circle cx="7" cy="2" r="1.2" />
                <circle cx="12" cy="2" r="1.2" />
                <circle cx="17" cy="2" r="1.2" />
                <circle cx="22" cy="2" r="1.2" />
                <circle cx="27" cy="2" r="1.2" />

                <circle cx="2" cy="5" r="1.2" />
                <circle cx="7" cy="5" r="1.2" />
                <circle cx="12" cy="5" r="1.2" fill="{{ $light ? '#ffffff' : '#e31b23' }}" />
                <circle cx="17" cy="5" r="1.2" fill="{{ $light ? '#ffffff' : '#e31b23' }}" />
                <circle cx="22" cy="5" r="1.2" fill="{{ $light ? '#ffffff' : '#e31b23' }}" />
                <circle cx="27" cy="5" r="1.2" fill="{{ $light ? '#ffffff' : '#e31b23' }}" />

                <circle cx="2" cy="8" r="1.2" />
                <circle cx="7" cy="8" r="1.2" />
                <circle cx="12" cy="8" r="1.2" />
                <circle cx="17" cy="8" r="1.2" />
                <circle cx="22" cy="8" r="1.2" />
                <circle cx="27" cy="8" r="1.2" />
            </svg>
            
            {{-- DIGIPRINT Wordmark --}}
            <span class="font-heading italic font-extrabold text-[13px] md:text-[14px] tracking-wide leading-none {{ $light ? 'text-white' : 'text-[#e31b23]' }}">
                DIGI<span class="{{ $light ? 'text-white' : 'text-[#1e293b]' }}">PRINT</span>
            </span>
        </div>
    </div>
@endif
