@php
    $capabilities = [
        [
            'index' => 0,
            'id' => 'advanced-polymer',
            'title' => 'Polyester Films & Surface Coating Expertise',
            'description' => 'Materials and coating knowledge supports the development of specialised print media for different applications and finishing needs.',
            'icon' => 'layers',
            'img_a' => 'images/PolyplexDigiPrintMedia.png',
            'img_b' => 'images/PolyplexDigiPrintMedia2.jpg',
            'tag_a' => 'Polymer Synthesis &amp; Fluid Mechanics',
            'tag_b' => 'Hydrophobic Top-Coat &amp; Contact Angle',
            'placeholder_a_color' => 'from-slate-700 via-slate-800 to-slate-900',
            'placeholder_b_color' => 'from-slate-900 via-zinc-800 to-red-950',
            'never_collapse' => false,
        ],
        [
            'index' => 1,
            'id' => 'media-innovation',
            'title' => 'Print Technology Understanding',
            'description' => 'Media performance depends on the printing process. We consider the demands of print technologies and application workflows while developing and recommending products.',
            'icon' => 'nozzle',
            'img_a' => 'images/capability-2a.png',
            'img_b' => 'images/capability-2b.png',
            'tag_a' => 'High-Speed Precision Press Cylinder',
            'tag_b' => 'Pantone &amp; Extended Gamut Proofing',
            'placeholder_a_color' => 'from-amber-900 via-amber-800 to-yellow-950',
            'placeholder_b_color' => 'from-rose-900 via-red-800 to-emerald-950',
            'never_collapse' => false,
        ],
        [
            'index' => 2,
            'id' => 'application-knowledge',
            'title' => 'Application-Led Product Development',
            'description' => 'From photobooks and labels to display graphics and technical drawings, end-use requirements guide media selection and development.',
            'icon' => 'circuit-gear',
            'img_a' => 'images/capability-3a.png',
            'img_b' => 'images/capability-3b.png',
            'tag_a' => 'Technical Formulations Symposium',
            'tag_b' => 'Optical Printhead Carriage Assembly',
            'placeholder_a_color' => 'from-blue-950 via-slate-800 to-slate-900',
            'placeholder_b_color' => 'from-zinc-900 via-neutral-800 to-zinc-950',
            'never_collapse' => false,
        ],
        [
            'index' => 3,
            'id' => 'precision-manufacturing',
            'title' => 'Manufacturing & Quality Focus',
            'description' => 'We emphasise consistent product quality and controlled processes to support reliable results for customers.',
            'icon' => 'precision',
            'img_a' => 'images/capability-4a.png',
            'img_b' => 'images/capability-4b.png',
            'tag_a' => 'Fine Art Archival Inspection',
            'tag_b' => 'Commercial Waterproof Publishing',
            'placeholder_a_color' => 'from-slate-800 via-blue-950 to-indigo-950',
            'placeholder_b_color' => 'from-orange-950 via-amber-900 to-stone-900',
            'never_collapse' => false,
        ],
        [
            'index' => 4,
            'id' => 'customer-centric',
            'title' => 'Customer-Focused Solutions',
            'description' => 'Our teams help connect product selection with actual customer requirements, from print process to final application.',
            'icon' => 'handshake-lightbulb',
            'img_a' => 'images/capability-5a.png',
            'img_b' => 'images/capability-5b.png',
            'tag_a' => 'Collaborative Application Engineering',
            'tag_b' => 'Long-Term Converter Partnerships',
            'placeholder_a_color' => 'from-blue-900 via-slate-800 to-sky-950',
            'placeholder_b_color' => 'from-stone-900 via-amber-950 to-neutral-900',
            'never_collapse' => false,
        ],
        [
            'index' => 5,
            'id' => 'distribution-network',
            'title' => 'Market Reach & Support',
            'description' => 'Through established industry relationships and channels, we aim to make products, application information and customer support more accessible.',
            'icon' => 'distribution',
            'img_a' => 'images/capability-6a.png',
            'img_b' => 'images/capability-6b.png',
            'tag_a' => 'Global Logistics Hubs &amp; Fulfillment',
            'tag_b' => 'Multi-Modal Export Container Port',
            'placeholder_a_color' => 'from-amber-950 via-orange-900 to-stone-900',
            'placeholder_b_color' => 'from-teal-950 via-blue-950 to-slate-900',
            'never_collapse' => true,
        ],
    ];
@endphp

{{-- Capabilities Sticky Stacking Scroll Section --}}
<section 
    id="capabilities-scroll-section" 
    class="relative w-full bg-white border-b border-slate-200"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-6 pb-24 sm:pb-36 lg:pb-48">
        
        {{-- Cards Container: Cards stack and cover each other as user scrolls --}}
        <div id="capabilities-cards-list" class="relative w-full">
            @foreach ($capabilities as $cap)
                @php
                    // Resolve Image A: check defined img_a first, then fall back to capability-Xa.*
                    $customImgA = null;
                    if (!empty($cap['img_a']) && file_exists(public_path($cap['img_a']))) {
                        $customImgA = asset($cap['img_a']);
                    } else {
                        foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                            $candidate = "images/capability-".($cap['index'] + 1)."a.{$ext}";
                            if (file_exists(public_path($candidate))) {
                                $customImgA = asset($candidate);
                                break;
                            }
                        }
                    }

                    // Resolve Image B: check defined img_b first, then fall back to capability-Xb.*
                    $customImgB = null;
                    if (!empty($cap['img_b']) && file_exists(public_path($cap['img_b']))) {
                        $customImgB = asset($cap['img_b']);
                    } else {
                        foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                            $candidate = "images/capability-".($cap['index'] + 1)."b.{$ext}";
                            if (file_exists(public_path($candidate))) {
                                $customImgB = asset($candidate);
                                break;
                            }
                        }
                    }
                @endphp

                {{-- Sticky Capability Card: Entire card sticks and subsequent cards slide OVER it --}}
                <div 
                    class="capability-card sticky w-full bg-white {{ $cap['index'] > 0 ? 'border-t border-slate-200' : '' }}"
                    data-index="{{ $cap['index'] }}"
                    data-never-collapse="{{ $cap['never_collapse'] ? 'true' : 'false' }}"
                    style="top: {{ 80 + ($cap['index'] * 72) }}px; z-index: {{ 10 + $cap['index'] }};"
                >
                    {{-- Header Row --}}
                    <div 
                        class="capability-header bg-white py-3 sm:py-3.5 cursor-pointer flex flex-col sm:flex-row items-start gap-3 sm:gap-5 group transition-colors select-none"
                        data-index="{{ $cap['index'] }}"
                        tabindex="0"
                        role="button"
                        aria-expanded="true"
                    >
                        {{-- Icon Container --}}
                        <div class="shrink-0 mt-0.5 w-9 h-9 sm:w-11 sm:h-11 rounded-lg flex items-center justify-center text-[#e31b23] group-hover:scale-105 transition-transform">
                            @if ($cap['icon'] === 'layers')
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 36 36" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="4" y="9" width="18" height="19" rx="1.5" />
                                    <rect x="9" y="5" width="18" height="19" rx="1.5" />
                                    <rect x="14" y="1" width="18" height="19" rx="1.5" />
                                    <path d="M6 15l14 0 M6 20l14 0 M6 24l14 0" stroke-width="1.2" stroke-dasharray="2 2" />
                                </svg>
                            @elseif ($cap['icon'] === 'nozzle')
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 36 36" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 8h26v4H5z" />
                                    <path d="M13 12l-2 8h14l-2-8" />
                                    <circle cx="18" cy="25" r="1.8" fill="currentColor" />
                                    <path d="M7 30h22" />
                                </svg>
                            @elseif ($cap['icon'] === 'circuit-gear')
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 36 36" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 7a5 5 0 0 0-5 5v2a5 5 0 0 0 5 5" />
                                    <circle cx="12" cy="13" r="2.5" />
                                    <path d="M17 10h12M17 15h7M24 15v8h7M17 21h5v4h7" />
                                    <circle cx="29" cy="10" r="1.5" fill="currentColor" />
                                    <circle cx="31" cy="23" r="1.5" fill="currentColor" />
                                    <circle cx="29" cy="25" r="1.5" fill="currentColor" />
                                </svg>
                            @elseif ($cap['icon'] === 'precision')
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 36 36" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="18" cy="18" r="4.5" />
                                    <path d="M3 18h10.5M22.5 18H33M18 3v10.5M18 22.5V33" />
                                    <path d="M5 13v10M31 13v10" />
                                </svg>
                            @elseif ($cap['icon'] === 'handshake-lightbulb')
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 36 36" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 4a5.5 5.5 0 0 1 5.5 5.5c0 2.2-1.3 3.8-2.3 5V17h-6.4v-2.5C13.8 13.3 12.5 11.7 12.5 9.5A5.5 5.5 0 0 1 18 4z" />
                                    <path d="M15 17h6M16 19.5h4" />
                                    <path d="M6 25c4-2 7 0 12 2s8 0 12-2" />
                                    <path d="M8 28c3-1 6 0 10 2s7 0 10-2" />
                                </svg>
                            @elseif ($cap['icon'] === 'distribution')
                                <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 36 36" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="18" r="3.2" />
                                    <circle cx="27" cy="8" r="2.8" />
                                    <circle cx="28" cy="18" r="2.8" />
                                    <circle cx="27" cy="28" r="2.8" />
                                    <path d="M12.2 16.8L24.2 9.2M12.2 18h13M12.2 19.2l12 7.6" />
                                </svg>
                            @endif
                        </div>

                        {{-- Text Container --}}
                        <div class="grow">
                            <h3 class="font-heading  text-base sm:text-lg lg:text-[28px] font-[600] text-[#0E4174] tracking-tight leading-snug ">
                                {{ $cap['title'] }}
                            </h3>
                            <p class="font-sans text-[16px] font-[500] sm:text-[16px] text-[#000000] mt-0.5 max-w-[729px] leading-relaxed">
                                {{ $cap['description'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Images Container: Remains stationary inside the sticky card; next card slides over it --}}
                    <div 
                        class="capability-images bg-white pt-2 pb-6 sm:pb-8"
                        data-index="{{ $cap['index'] }}"
                    >
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            
                            {{-- Image A --}}
                            <div class="relative w-full max-w-[546px] h-[200px] min-[400px]:h-[240px] sm:h-[282px] overflow-hidden shadow-xs bg-slate-100 group">
                                @if ($customImgA)
                                    <img src="{{ $customImgA }}" alt="{{ $cap['title'] }} specimen 1" width="546" height="282" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-linear-to-tr {{ $cap['placeholder_a_color'] }} flex flex-col justify-end p-4 text-white">
                                        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                                        <span class="text-xs font-semibold uppercase tracking-wider text-white/70">Polyplex DigiPrint Media</span>
                                        <p class="font-heading font-bold text-sm sm:text-base text-white">{!! $cap['tag_a'] !!}</p>
                                    </div>
                                @endif
                            </div>

                            {{-- Image B --}}
                            <div class="relative w-full max-w-[546px] h-[200px] min-[400px]:h-[240px] sm:h-[282px] overflow-hidden shadow-xs bg-slate-100 group">
                                @if ($customImgB)
                                    <img src="{{ $customImgB }}" alt="{{ $cap['title'] }} specimen 2" width="546" height="282" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-linear-to-tr {{ $cap['placeholder_b_color'] }} flex flex-col justify-end p-4 text-white">
                                        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                                        <span class="text-xs font-semibold uppercase tracking-wider text-white/70">Application Technology</span>
                                        <p class="font-heading font-bold text-sm sm:text-base text-white">{!! $cap['tag_b'] !!}</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
