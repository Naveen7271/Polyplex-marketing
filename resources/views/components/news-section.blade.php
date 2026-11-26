@php
    $newsItems = [
        [
            'id' => 1,
            'slug' => 'tamil-nadu-print-and-pack-2026',
            'date' => 'OCT 26',
            'title' => 'Tamil Nadu Print & Pack 2026',
            'excerpt' => 'Connecting with the Printing & Packaging Industry',
            'image' => 'images/news-1-tamil-nadu.png',
            'alt' => 'Tamil Nadu Print & Pack 2026 exhibition booth crowd',
        ],
        [
            'id' => 2,
            'slug' => 'loupe-india-2026-toray',
            'date' => 'OCT 26',
            'title' => 'Loupe India 2026 – Toray',
            'excerpt' => 'Connecting with the Printing Industry',
            'image' => 'images/news-2-loupe-toray.png',
            'alt' => 'Loupe India 2026 Toray trade show floor',
        ],
        [
            'id' => 3,
            'slug' => 'loupe-india-2026-asahi',
            'date' => 'OCT 26',
            'title' => 'Loupe India 2026 – Asahi',
            'excerpt' => 'Connecting with the Printing Industry',
            'image' => 'images/news-3-loupe-asahi.png',
            'alt' => 'Loupe India 2026 Asahi discussion booth',
        ],
        [
            'id' => 4,
            'slug' => 'digital-yatra-2026-delhi',
            'date' => 'SEPT 26',
            'title' => 'Digital Yatra 2026, Delhi',
            'excerpt' => 'Bringing Digital Printing Professionals Together',
            'image' => 'images/news-4-digital-yatra-delhi.png',
            'alt' => 'Digital Yatra 2026 Delhi presenter with microphone',
        ],
        [
            'id' => 5,
            'slug' => 'media-expo-2026',
            'date' => 'SEPT 26',
            'title' => 'Media Expo 2026',
            'excerpt' => 'Connecting with the Media & Printing Industry',
            'image' => 'images/news-5-media-expo.png',
            'alt' => 'Media Expo 2026 attendee crowd',
        ],
        [
            'id' => 6,
            'slug' => 'digital-yatra-2026-kolhapur',
            'date' => 'AUG 26',
            'title' => 'Digital Yatra 2026, Kolhapur',
            'excerpt' => 'TechNova Imaging Systems organised Digital Yatra 2026 in Kolhapur to highlight innovations.',
            'image' => 'images/news-6-digital-yatra-kolhapur.png',
            'alt' => 'Digital Yatra 2026 Kolhapur Nikon pavilion display',
        ],
        [
            'id' => 7,
            'slug' => 'printpack-india-summit-2026',
            'date' => 'AUG 12',
            'title' => 'PrintPack India Summit 2026',
            'excerpt' => 'Highlighting Next-Gen Substrates for High-Speed Commercial Presses',
            'image' => 'images/news-1-tamil-nadu.jpg',
            'alt' => 'PrintPack India Summit industry session',
        ],
        [
            'id' => 8,
            'slug' => 'packaging-innovations-forum-mumbai',
            'date' => 'JULY 18',
            'title' => 'Packaging Innovations Forum, Mumbai',
            'excerpt' => 'Showcasing Sustainable Non-Tear Synthetic Media Alternatives',
            'image' => 'images/news-2-loupe-toray.jpg',
            'alt' => 'Packaging Innovations Forum showcase',
        ],
        [
            'id' => 9,
            'slug' => 'digital-label-expo-asia',
            'date' => 'JUN 24',
            'title' => 'Digital Label Expo Asia',
            'excerpt' => 'Demonstrating Self-Adhesive Films for Modern Digital Label Presses',
            'image' => 'images/news-3-loupe-asahi.jpg',
            'alt' => 'Digital Label Expo presentation',
        ],
    ];

    $newsPages = array_chunk($newsItems, 3);
@endphp

{{-- News & Technology Section --}}
<section id="news" class="relative w-full py-16 sm:py-20 lg:py-[64px] bg-[#F3F3F3] select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Title: Montserrat Bold Centered --}}
        <!-- <div class="text-center max-w-4xl mx-auto mb-10 sm:mb-12 lg:mb-14">
            <h2 class="font-heading font-[700] text-[32px] sm:text-3xl lg:text-[32px] text-[#0E4174] tracking-tight leading-tight">
                Latest from Polyplex DigiPrint
            </h2>
        </div> -->

        {{-- Paginated 3x1 Grids of News Cards (3 per page) --}}
        @foreach ($newsPages as $pageIndex => $pageItems)
            <div
                id="news-grid-page-{{ $pageIndex + 1 }}"
                class="{{ $pageIndex > 0 ? 'hidden ' : '' }}grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[21px] lg:gap-[21px] justify-items-center sm:justify-items-stretch"
            >
                @foreach ($pageItems as $item)
                    @php
                        $imgSrc = null;
                        if (file_exists(public_path($item['image']))) {
                            $imgSrc = asset($item['image']);
                        }
                    @endphp
                    <article class="bg-white w-full max-w-[400px] sm:max-w-none min-h-[463px] rounded-xl shadow-xs border border-slate-200/70 p-3 sm:p-3.5 flex flex-col justify-between hover:shadow-md transition-shadow group">
                        <div>
                            {{-- Card Thumbnail Image --}}
                            <div class="w-full h-[220px] min-[400px]:h-[250px] sm:h-[280px] lg:h-[290px] rounded-lg overflow-hidden bg-slate-100 mb-3.5 relative">
                                @if ($imgSrc)
                                    <img 
                                        src="{{ $imgSrc }}" 
                                        alt="{{ $item['alt'] }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        loading="lazy"
                                    />
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-slate-200 to-slate-300 flex items-center justify-center">
                                        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">News Image</span>
                                    </div>
                                @endif
                            </div>

                            {{-- Date --}}
                            <p class="font-sans text-[12px] font-[500] text-[#0E4174] tracking-[0.12em] mb-1.5">
                                {{ $item['date'] }}
                            </p>

                            {{-- Title --}}
                            <h3 class="font-heading font-[600] text-[18px] sm:text-[16px] text-[#0E4174] leading-snug mb-1.5 line-clamp-1 group-hover:text-blue-900 transition-colors">
                                {{ $item['title'] }}
                            </h3>

                            {{-- Excerpt --}}
                            <p class="font-sans text-[13px] font-[400] text-[#353535] leading-relaxed line-clamp-2">
                                {{ $item['excerpt'] }}
                            </p>
                        </div>

                        {{-- Read More Link --}}
                        <div class="pt-2 mt-auto">
                            <a 
                                href="{{ route('news.show', $item['slug']) }}" 
                                class="font-sans text-[14px] font-[600] text-[#D6001C] hover:text-[#c8102e] inline-flex items-center gap-1.5 transition-colors"
                            >
                                <span>Read More</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endforeach

        {{-- Pagination Prev Arrow, Dots & Next Arrow --}}
        <div class="flex items-center justify-center gap-2 mt-10 sm:mt-12" aria-label="News pagination">
            <button 
                id="news-prev-btn" 
                type="button" 
                class="w-7 h-7 sm:w-8 sm:h-8 rounded-full border border-slate-300 hover:border-[#0b2b4e] text-slate-600 hover:text-[#0b2b4e] flex items-center justify-center transition-colors mr-3 cursor-pointer focus:outline-hidden"
                aria-label="Previous news items"
            >
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>

            <div class="flex items-center gap-2">
                <button 
                    id="news-dot-1" 
                    type="button" 
                    class="w-2 h-2 rounded-full bg-[#0b2b4e] transition-all cursor-pointer focus:outline-hidden"
                    aria-label="Go to news page 1"
                ></button>
                <button 
                    id="news-dot-2" 
                    type="button" 
                    class="w-1.5 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer focus:outline-hidden"
                    aria-label="Go to news page 2"
                ></button>
                <button 
                    id="news-dot-3" 
                    type="button" 
                    class="w-1.5 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer focus:outline-hidden"
                    aria-label="Go to news page 3"
                ></button>
            </div>

            <button 
                id="news-next-btn" 
                type="button" 
                class="w-7 h-7 sm:w-8 sm:h-8 rounded-full border border-slate-300 hover:border-[#0b2b4e] text-slate-600 hover:text-[#0b2b4e] flex items-center justify-center transition-colors ml-3 cursor-pointer focus:outline-hidden"
                aria-label="Next news items"
            >
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>

    </div>
</section>

