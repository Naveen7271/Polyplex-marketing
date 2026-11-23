{{--
Careers Hero Section (First Section of Careers Page)
Based on Polyplex DigiPrint Design:
- Tag: CAREERS with underline accent
- Main Headline: "Make your mark." with vertical bar accent
- Right Content: Sub-headline, narrative description, and "View Open Positions" CTA button
- Bottom Row: 5 Image slots (with images/careers/team-*.jpg)
--}}
@props([
    'tag' => 'CAREERS',
    'headline' => 'Make your mark.',
    'subheadline' => "Build what's next in print with Polyplex DigiPrint.",
    'description' => 'Bring your ideas, ambition and expertise to a workplace where innovation thrives, teamwork matters and every opportunity helps you build a meaningful and rewarding career',
    'buttonText' => 'View Open Positions',
    'buttonUrl' => '#open-positions',
    'images' => [
        'images/careers/team-1.jpg',
        'images/careers/team-2.jpg',
        'images/careers/team-3.jpg',
        'images/careers/team-4.jpg',
        'images/careers/team-5.jpg',
    ],
])

@php
    $defaultImages = [
        'images/careers/team-1.jpg',
        'images/careers/team-2.jpg',
        'images/careers/team-3.jpg',
        'images/careers/team-4.jpg',
        'images/careers/team-5.jpg',
    ];

    $imageSlots = [
        $images[0] ?? $defaultImages[0],
        $images[1] ?? $defaultImages[1],
        $images[2] ?? $defaultImages[2],
        $images[3] ?? $defaultImages[3],
        $images[4] ?? $defaultImages[4],
    ];
@endphp

<section id="careers-hero" class="relative w-full bg-[#F3F3F3] pt-14 sm:pt-16 md:pt-20 lg:pt-24 pb-14 sm:pb-16 md:pb-20 select-none overflow-hidden" aria-label="Careers at Polyplex DigiPrint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Top Section: Two-Column Split (Tag & Headline on Left, Subtitle & CTA on Right) --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start mb-12 sm:mb-16 md:mb-20">
            
            {{-- Left Column: CAREERS Tag + "Make your mark." Headline --}}
            <div class="lg:col-span-7 xl:col-span-7">
                {{-- CAREERS Tag with Horizontal Underline Accent --}}
                <div class="inline-block mb-6 sm:mb-8">
                    <span class="block text-xs sm:text-[13px] font-semibold text-slate-700 tracking-[0.2em] uppercase font-sans">
                        {{ $tag }}
                    </span>
                    <div class="w-10 sm:w-11 h-[2px] bg-slate-500 mt-2" aria-hidden="true"></div>
                </div>

                {{-- Headline with Vertical Bar Accent --}}
                <h1 class="font-heading font-[400] text-4xl sm:text-5xl md:text-6xl lg:text-[68px] xl:text-[76px] text-slate-900 tracking-tight leading-[1.08] flex items-center flex-wrap">
                    <span>{{ $headline }}</span>
                    <span class="inline-block w-[2px] sm:w-[2.5px] h-[0.88em] bg-slate-900 ml-2 sm:ml-3 self-center" aria-hidden="true"></span>
                </h1>
            </div>

            {{-- Right Column: Subtitle, Narrative Copy, and CTA Button --}}
            <div class="lg:col-span-5 xl:col-span-5 lg:pt-4">
                {{-- Subtitle --}}
                <h2 class="font-heading font-[600] text-base sm:text-lg md:text-[19px] lg:text-[20px] text-slate-900 leading-snug">
                    {{ $subheadline }}
                </h2>

                {{-- Narrative Paragraph --}}
                <p class="font-sans text-sm sm:text-[15px] text-slate-700 leading-relaxed mt-3.5 mb-7 sm:mb-8 max-w-xl">
                    {{ $description }}
                </p>

                {{-- Action Button --}}
                <div>
                    <a href="{{ $buttonUrl }}"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-xs bg-[#003570] hover:bg-[#071d36] text-white font-medium text-sm transition-colors duration-200 shadow-xs focus:outline-hidden focus:ring-2 focus:ring-[#003570] focus:ring-offset-2">
                        {{ $buttonText }}
                    </a>
                </div>
            </div>

        </div>

        {{-- Bottom Section: Row of 5 Team Images --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3.5 sm:gap-4 md:gap-5 lg:gap-6">
            
            {{-- Slot 1 --}}
            <div class="group relative aspect-[4/5] w-full overflow-hidden rounded-xs bg-slate-200/80 border border-slate-300/60 shadow-xs transition-all duration-300 hover:shadow-md">
                @if(!empty($imageSlots[0]))
                    <img src="{{ asset($imageSlots[0]) }}" alt="Polyplex Careers - Team Collaboration" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                @else
                    <div class="flex h-full w-full flex-col items-center justify-center p-4 text-center bg-gradient-to-b from-slate-200/50 to-slate-200/80">
                        <svg class="w-8 h-8 sm:w-9 sm:h-9 text-slate-400/80 mb-2 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Image 1</span>
                    </div>
                @endif
            </div>

            {{-- Slot 2 --}}
            <div class="group relative aspect-[4/5] w-full overflow-hidden rounded-xs bg-slate-200/80 border border-slate-300/60 shadow-xs transition-all duration-300 hover:shadow-md">
                @if(!empty($imageSlots[1]))
                    <img src="{{ asset($imageSlots[1]) }}" alt="Polyplex Careers - Teamwork & Unity" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                @else
                    <div class="flex h-full w-full flex-col items-center justify-center p-4 text-center bg-gradient-to-b from-slate-200/50 to-slate-200/80">
                        <svg class="w-8 h-8 sm:w-9 sm:h-9 text-slate-400/80 mb-2 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Image 2</span>
                    </div>
                @endif
            </div>

            {{-- Slot 3 --}}
            <div class="group relative aspect-[4/5] w-full overflow-hidden rounded-xs bg-slate-200/80 border border-slate-300/60 shadow-xs transition-all duration-300 hover:shadow-md">
                @if(!empty($imageSlots[2]))
                    <img src="{{ asset($imageSlots[2]) }}" alt="Polyplex Careers - Hands Joined Together" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                @else
                    <div class="flex h-full w-full flex-col items-center justify-center p-4 text-center bg-gradient-to-b from-slate-200/50 to-slate-200/80">
                        <svg class="w-8 h-8 sm:w-9 sm:h-9 text-slate-400/80 mb-2 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Image 3</span>
                    </div>
                @endif
            </div>

            {{-- Slot 4 --}}
            <div class="group relative aspect-[4/5] w-full overflow-hidden rounded-xs bg-slate-200/80 border border-slate-300/60 shadow-xs transition-all duration-300 hover:shadow-md">
                @if(!empty($imageSlots[3]))
                    <img src="{{ asset($imageSlots[3]) }}" alt="Polyplex Careers - Colleagues Discussing Ideas" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                @else
                    <div class="flex h-full w-full flex-col items-center justify-center p-4 text-center bg-gradient-to-b from-slate-200/50 to-slate-200/80">
                        <svg class="w-8 h-8 sm:w-9 sm:h-9 text-slate-400/80 mb-2 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Image 4</span>
                    </div>
                @endif
            </div>

            {{-- Slot 5 --}}
            <div class="group relative aspect-[4/5] w-full overflow-hidden rounded-xs bg-slate-200/80 border border-slate-300/60 shadow-xs transition-all duration-300 hover:shadow-md">
                @if(!empty($imageSlots[4]))
                    <img src="{{ asset($imageSlots[4]) }}" alt="Polyplex Careers - Digital Workspace" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                @else
                    <div class="flex h-full w-full flex-col items-center justify-center p-4 text-center bg-gradient-to-b from-slate-200/50 to-slate-200/80">
                        <svg class="w-8 h-8 sm:w-9 sm:h-9 text-slate-400/80 mb-2 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Image 5</span>
                    </div>
                @endif
            </div>

        </div>

    </div>
</section>
