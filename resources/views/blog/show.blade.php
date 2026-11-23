@php
    $post = $post ?? \App\Support\BlogData::find($slug ?? 'coloured-paper-recyclability');
@endphp

<x-layouts.app :title="$post['title'] . ' | Polyplex DigiPrint'">
    <article class="w-full bg-[#FFFFFF] pt-10 sm:pt-14 lg:pt-16 pb-12 sm:pb-16 select-text" aria-labelledby="blog-main-title">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- 1. Date Eyebrow & Divider Line --}}
            <div class="mb-4">
                <span class="font-sans text-xs sm:text-[13px] font-[600] text-slate-500 uppercase tracking-widest inline-block">
                    {{ $post['date'] }}
                </span>
                <span class="block w-8 sm:w-10 h-[1.5px] bg-slate-300 mt-2" aria-hidden="true"></span>
            </div>

            {{-- 2. Main Article Title --}}
            <h1 id="blog-main-title" class="font-heading font-[700] text-[26px] sm:text-3xl md:text-[36px] lg:text-[40px] text-[#0E4174] leading-[1.2] tracking-tight mb-6 sm:mb-8">
                {{ $post['title'] }}
            </h1>

            {{-- 3. Tags & Social Actions Row (Like & Share) --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 sm:pb-8 mb-8 sm:mb-10 border-b border-slate-200">
                {{-- Left: Tag Pills --}}
                <div class="flex flex-wrap items-center gap-2" aria-label="Article Tags">
                    @foreach ($post['tags'] as $tag)
                        <span class="inline-block px-3 py-1 bg-[#E2E8F0] hover:bg-slate-300 text-slate-700 text-xs font-[500] rounded transition-colors select-none">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>

                {{-- Right: Like & Share Actions --}}
                <div class="flex items-center gap-4 text-slate-600 select-none">
                    {{-- Like Button --}}
                    <button 
                        type="button" 
                        id="blog-like-btn" 
                        class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-medium hover:text-[#0E4174] transition-colors focus:outline-hidden cursor-pointer"
                        aria-label="Like this article"
                        data-likes="{{ $post['likes_count'] }}"
                    >
                        <span>Like</span>
                        <svg class="w-4 h-4 blog-like-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.25" />
                        </svg>
                        <span id="blog-like-count" class="text-xs text-slate-500 font-semibold">{{ $post['likes_count'] }}</span>
                    </button>

                    {{-- Share Button --}}
                    <button 
                        type="button" 
                        id="blog-share-btn" 
                        class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-medium hover:text-[#0E4174] transition-colors focus:outline-hidden cursor-pointer"
                        aria-label="Share this article"
                    >
                        <span>Share</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- 4. Featured Hero Image --}}
            <div class="w-full rounded-xl sm:rounded-2xl overflow-hidden shadow-md border border-slate-200/80 mb-10 sm:mb-12 bg-slate-100">
                <img 
                    src="{{ asset($post['image']) }}" 
                    alt="{{ $post['image_alt'] }}" 
                    class="w-full h-auto object-cover max-h-[500px]"
                    loading="eager"
                    fetchpriority="high"
                />
            </div>

            {{-- 5. Intro Lead Paragraphs --}}
            @if (!empty($post['intro']))
                <div class="space-y-4 font-sans text-[15px] sm:text-[16px] text-slate-800 leading-[1.75] mb-10">
                    @foreach ($post['intro'] as $introParagraph)
                        <p>{{ $introParagraph }}</p>
                    @endforeach
                </div>
            @endif

            {{-- 6. Main Body Sections --}}
            @if (!empty($post['sections']))
                <div class="space-y-10 sm:space-y-12">
                    @foreach ($post['sections'] as $sec)
                        <section class="border-t border-slate-100 pt-8 sm:pt-10">
                            {{-- Section Heading --}}
                            <h2 class="font-heading font-[700] text-[20px] sm:text-2xl text-[#0E4174] tracking-tight leading-snug mb-4">
                                {{ $sec['heading'] }}
                            </h2>

                            {{-- Section Lead --}}
                            @if (!empty($sec['lead']))
                                <p class="font-sans text-[15px] sm:text-[16px] text-slate-800 leading-relaxed mb-4">
                                    {{ $sec['lead'] }}
                                </p>
                            @endif

                            {{-- Optional List Sub-Title --}}
                            @if (!empty($sec['list_title']))
                                <p class="font-sans text-[15px] sm:text-[16px] text-slate-800 font-medium leading-relaxed mb-3">
                                    {{ $sec['list_title'] }}
                                </p>
                            @endif

                            {{-- Bulleted Items --}}
                            @if (!empty($sec['items']))
                                <ul class="space-y-3.5 pl-5 list-disc text-slate-800 font-sans text-[15px] sm:text-[16px] leading-relaxed mb-5 marker:text-slate-400">
                                    @foreach ($sec['items'] as $item)
                                        <li>
                                            <strong class="font-semibold text-slate-900">{{ $item['term'] }}:</strong>
                                            <span>{{ $item['description'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            {{-- Section Concluding Note --}}
                            @if (!empty($sec['note']))
                                <p class="font-sans text-[15px] sm:text-[16px] text-slate-800 leading-relaxed">
                                    {{ $sec['note'] }}
                                </p>
                            @endif
                        </section>
                    @endforeach
                </div>
            @endif

            {{-- 7. Frequently Asked Questions (FAQs) --}}
            @if (!empty($post['faqs']))
                <section class="border-t border-slate-200 mt-12 sm:mt-14 pt-10 sm:pt-12" aria-labelledby="faq-section-title">
                    <h2 id="faq-section-title" class="font-heading font-[700] text-[22px] sm:text-2xl text-[#0E4174] tracking-tight leading-snug mb-8">
                        Frequently Asked Questions (FAQs)
                    </h2>

                    <div class="space-y-6">
                        @foreach ($post['faqs'] as $faq)
                            <div class="space-y-1.5">
                                <h3 class="font-heading font-[600] text-[16px] sm:text-[17px] text-[#0E4174] flex items-start gap-2">
                                    <span class="text-slate-400">&bull;</span>
                                    <span>{{ $faq['question'] }}</span>
                                </h3>
                                <p class="font-sans text-[15px] sm:text-[16px] text-slate-700 leading-relaxed pl-4">
                                    {{ $faq['answer'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            {{-- 8. Conclusion Section --}}
            @if (!empty($post['conclusion']))
                <section class="border-t border-slate-200 mt-12 sm:mt-14 pt-10 sm:pt-12" aria-labelledby="conclusion-section-title">
                    <h2 id="conclusion-section-title" class="font-heading font-[700] text-[22px] sm:text-2xl text-[#0E4174] tracking-tight leading-snug mb-5">
                        {{ $post['conclusion']['heading'] }}
                    </h2>

                    <div class="space-y-4 font-sans text-[15px] sm:text-[16px] text-slate-800 leading-[1.75]">
                        @foreach ($post['conclusion']['paragraphs'] as $para)
                            <p>{{ $para }}</p>
                        @endforeach
                    </div>
                </section>
            @endif

        </div>
    </article>

    {{-- 9. Latest Blogs Curated Section (Image 5: LATEST BLOGS 2x2 Grid with Pagination) --}}
    <x-blog-explore-section title="LATEST BLOGS" />

    {{-- 10. Call to Action Banner --}}
    <x-cta-section />

    {{-- Toast Notification for Share Link --}}
    <div id="blog-toast" class="fixed bottom-6 right-6 z-50 hidden bg-[#0E4174] text-white px-5 py-3 rounded-lg shadow-xl text-sm font-medium transition-all duration-300 transform translate-y-4">
        Link copied to clipboard!
    </div>
</x-layouts.app>

