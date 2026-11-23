{{--
Blog & News Page - First Section Component
Displays:
1. Top Category Filter Tabs: [ BLOGS ] [ NEWS & EVENTS ] [ NEWSLETTER ]
2. Featured Blog Hero Banner (Active under BLOGS tab):
   - Open Book Flat-lay Background with Campeonato Panamericano poster
   - Left White Card with "FEATURED BLOG", Crimson Accent Line, Headline, Excerpt, and "Read More" Button
3. Featured News Hero Banner (Active under NEWS & EVENTS tab):
   - Polyplex DigiPrint Exhibition Pavilion Booth Background
   - Left White Card with "FEATURED NEWS", Crimson Accent Line, "Tamil Nadu Print & Pack 2026", "02 October 2026 – 04 October 2026", and "Read More" Button
4. Accessible Reading & Event Modals for both Featured Blog and Featured News
--}}
@props([
    'activeTab' => 'blogs',
    'blogBadge' => 'FEATURED BLOG',
    'blogTitle' => 'Coloured Paper: Do Bright Colours Affect Paper’s Recyclability?',
    'blogExcerpt' => 'Colourful paper makes packaging, labels, brochures and printed materials visually striking. But when it comes to disposal and recycling, vibrant dyes present unique chemical challenges...',
    'blogBgImage' => 'images/blog/blog-hero-bg.jpg',
    'newsBadge' => 'FEATURED NEWS',
    'newsTitle' => 'Tamil Nadu Print & Pack 2026',
    'newsDates' => '02 October 2026 – 04 October 2026',
    'newsBgImage' => 'images/blog/news-hero-bg.jpg',
])

<section id="blog-hero-section" class="w-full bg-[#FBFBFB] pt-8 sm:pt-10 md:pt-12 pb-10 sm:pb-14 select-none" aria-label="Blog and News Portal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- 1. Category Filter Navigation Tabs --}}
        <div class="flex items-center gap-2.5 sm:gap-3.5 mb-6 sm:mb-8" role="tablist" aria-label="Blog and News categories">
            {{-- Blogs Tab --}}
            <button 
                type="button" 
                id="blog-tab-blogs" 
                role="tab" 
                aria-selected="true" 
                aria-controls="blog-panel-blogs"
                data-tab="blogs"
                class="blog-category-tab px-5 sm:px-7 py-2 sm:py-2.5 rounded text-xs sm:text-[13px] font-[600] tracking-wider uppercase transition-all duration-200 cursor-pointer bg-[#0E4174] text-white shadow-xs focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:ring-offset-2"
            >
                BLOGS
            </button>

            {{-- News & Events Tab --}}
            <button 
                type="button" 
                id="blog-tab-news" 
                role="tab" 
                aria-selected="false" 
                aria-controls="blog-panel-news"
                data-tab="news"
                class="blog-category-tab px-5 sm:px-7 py-2 sm:py-2.5 rounded text-xs sm:text-[13px] font-[600] tracking-wider uppercase transition-all duration-200 cursor-pointer bg-[#DFDFE7] hover:bg-[#d0dbe6] text-[#0E4174] focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:ring-offset-2"
            >
                NEWS &amp; EVENTS
            </button>

            {{-- Newsletter Tab --}}
            <button 
                type="button" 
                id="blog-tab-newsletter" 
                role="tab" 
                aria-selected="false" 
                aria-controls="blog-panel-newsletter"
                data-tab="newsletter"
                class="blog-category-tab px-5 sm:px-7 py-2 sm:py-2.5 rounded text-xs sm:text-[13px] font-[600] tracking-wider uppercase transition-all duration-200 cursor-pointer bg-[#DFDFE7] hover:bg-[#d0dbe6] text-[#0E4174] focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:ring-offset-2"
            >
                NEWSLETTER
            </button>
        </div>

        {{-- 2. Tab Panel 1: Blogs (Featured Blog Hero Banner) --}}
        <div id="blog-panel-blogs" role="tabpanel" aria-labelledby="blog-tab-blogs" class="block transition-opacity duration-300">
            <div class="relative w-full rounded-xl sm:rounded-2xl overflow-hidden min-h-[460px] sm:min-h-[480px] lg:h-[480px] xl:h-[500px] flex items-center shadow-lg border border-slate-200/60 bg-slate-100">

                {{-- Background Image: Flat-lay Open Art Book & Desk Setup --}}
                <div class="absolute inset-0 z-0">
                    <img 
                        src="{{ asset($blogBgImage) }}" 
                        alt="Featured Blog - {{ $blogTitle }}" 
                        class="w-full h-full object-cover object-right md:object-[80%_center] lg:object-right pointer-events-none"
                        loading="eager"
                        fetchpriority="high"
                    />
                    {{-- Subtle mobile contrast overlay --}}
                    <div class="md:hidden absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent pointer-events-none" aria-hidden="true"></div>
                </div>

                {{-- Left Overlaid Card Container --}}
                <div class="relative z-10 w-full p-4 sm:p-6 md:p-8 lg:p-10 xl:p-12">
                    <article class="bg-white rounded-xl sm:rounded-2xl shadow-xl lg:shadow-2xl border border-slate-100/90 p-6 sm:p-8 lg:p-10 max-w-full sm:max-w-lg lg:max-w-[530px] xl:max-w-[560px] transform transition-transform duration-300">
                        
                        {{-- Eyebrow & Crimson Accent Line --}}
                        <div class="mb-3 sm:mb-4">
                            <span class="text-[#D6001C] font-heading font-[700] text-[12px] sm:text-[13px] tracking-[0.2em] uppercase inline-block">
                                {{ $blogBadge }}
                            </span>
                            <span class="block w-9 sm:w-10 h-[2px] bg-[#D6001C] mt-1.5" aria-hidden="true"></span>
                        </div>

                        {{-- Main Headline --}}
                        <h2 class="font-heading font-[700] text-[20px] sm:text-2xl md:text-[26px] lg:text-[28px] xl:text-[30px] text-[#0E4174] leading-[1.25] tracking-tight">
                            {{ $blogTitle }}
                        </h2>

                        {{-- Excerpt --}}
                        <p class="font-sans text-[13px] sm:text-[14px] lg:text-[15px] text-[#555555] font-normal leading-relaxed mt-3.5 sm:mt-4 mb-6 sm:mb-7">
                            {{ $blogExcerpt }}
                        </p>

                        {{-- CTA Button: "Read More" --}}
                        <div>
                            <a 
                                href="{{ route('blog.show', 'coloured-paper-recyclability') }}" 
                                id="btn-read-more-blog"
                                class="inline-flex items-center justify-center px-6 sm:px-7 py-2.5 bg-[#0E4174] hover:bg-[#092f55] active:bg-[#072442] text-white text-[13px] sm:text-sm font-[600] rounded transition-all duration-150 shadow-xs cursor-pointer focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:ring-offset-2"
                            >
                                Read More
                            </a>
                        </div>
                    </article>
                </div>

            </div>
        </div>

        {{-- 3. Tab Panel 2: News & Events (Featured News Hero Banner) --}}
        <div id="blog-panel-news" role="tabpanel" aria-labelledby="blog-tab-news" class="hidden transition-opacity duration-300">
            <div class="relative w-full rounded-xl sm:rounded-2xl overflow-hidden min-h-[460px] sm:min-h-[480px] lg:h-[480px] xl:h-[500px] flex items-center shadow-lg border border-slate-200/60 bg-slate-900">

                {{-- Background Image: Polyplex DigiPrint Exhibition Pavilion Booth --}}
                <div class="absolute inset-0 z-0">
                    <img 
                        src="{{ asset($newsBgImage) }}" 
                        alt="Featured News - {{ $newsTitle }}" 
                        class="w-full h-full object-cover object-center md:object-[65%_center] lg:object-center pointer-events-none"
                        loading="lazy"
                    />
                    {{-- Soft vignette to balance text contrast on the left --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-black/40 via-transparent to-black/20 pointer-events-none" aria-hidden="true"></div>
                    <div class="md:hidden absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent pointer-events-none" aria-hidden="true"></div>
                </div>

                {{-- Left Overlaid Card Container --}}
                <div class="relative z-10 w-full p-4 sm:p-6 md:p-8 lg:p-10 xl:p-12">
                    <article class="bg-white rounded-xl sm:rounded-2xl shadow-xl lg:shadow-2xl border border-slate-100/90 p-6 sm:p-8 lg:p-10 max-w-full sm:max-w-lg lg:max-w-[530px] xl:max-w-[560px] transform transition-transform duration-300">
                        
                        {{-- Eyebrow & Crimson Accent Line --}}
                        <div class="mb-3 sm:mb-4">
                            <span class="text-[#D6001C] font-heading font-[700] text-[12px] sm:text-[13px] tracking-[0.2em] uppercase inline-block">
                                {{ $newsBadge }}
                            </span>
                            <span class="block w-9 sm:w-10 h-[2px] bg-[#D6001C] mt-1.5" aria-hidden="true"></span>
                        </div>

                        {{-- Main Headline --}}
                        <h2 class="font-heading font-[700] text-[20px] sm:text-2xl md:text-[26px] lg:text-[28px] xl:text-[30px] text-[#0E4174] leading-[1.25] tracking-tight">
                            {{ $newsTitle }}
                        </h2>

                        {{-- Date Range Subtitle --}}
                        <p class="font-sans text-[13px] sm:text-[14px] lg:text-[15px] text-[#555555] font-normal leading-relaxed mt-3.5 sm:mt-4 mb-6 sm:mb-7">
                            {{ $newsDates }}
                        </p>

                        {{-- CTA Button: "Read More" --}}
                        <div>
                            <a 
                                href="{{ route('news.show', 'tamil-nadu-print-and-pack-2026') }}"
                                id="btn-read-more-news"
                                class="inline-flex items-center justify-center px-6 sm:px-7 py-2.5 bg-[#0E4174] hover:bg-[#092f55] active:bg-[#072442] text-white text-[13px] sm:text-sm font-[600] rounded transition-all duration-150 shadow-xs cursor-pointer focus:outline-hidden focus:ring-2 focus:ring-[#0E4174] focus:ring-offset-2"
                            >
                                Read More
                            </a>
                        </div>
                    </article>
                </div>

            </div>
        </div>

    </div>
</section>
