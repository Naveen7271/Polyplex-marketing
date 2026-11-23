@php
    $article = $article ?? \App\Support\NewsData::find($slug ?? 'tamil-nadu-print-and-pack-2026');
@endphp

<x-layouts.app :title="$article['title'] . ' | Polyplex DigiPrint'">
    <article class="w-full bg-[#FFFFFF] pt-10 sm:pt-14 lg:pt-16 pb-12 sm:pb-16 select-text" aria-labelledby="news-main-title">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- 1. Date Eyebrow & Horizontal Divider Line --}}
            <div class="mb-4">
                <span class="font-sans text-xs sm:text-[13px] font-[600] text-slate-500 uppercase tracking-widest inline-block">
                    {{ $article['date'] }}
                </span>
                <span class="block w-8 sm:w-10 h-[1.5px] bg-slate-300 mt-2" aria-hidden="true"></span>
            </div>

            {{-- 2. Main News Article Headline --}}
            <h1 id="news-main-title" class="font-heading font-[700] text-[26px] sm:text-3xl md:text-[36px] lg:text-[40px] text-[#0E4174] leading-[1.2] tracking-tight mb-6 sm:mb-8">
                {{ $article['title'] }}
            </h1>

            {{-- 3. Tag Pills & Social Actions Row (Like & Share) --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 sm:pb-8 mb-8 sm:mb-10 border-b border-slate-200">
                {{-- Left: Tag Pills --}}
                <div class="flex flex-wrap items-center gap-2" aria-label="News Tags">
                    @foreach ($article['tags'] as $tag)
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
                        id="news-like-btn" 
                        class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-medium hover:text-[#0E4174] transition-colors focus:outline-hidden cursor-pointer"
                        aria-label="Like this news item"
                        data-likes="{{ $article['likes_count'] }}"
                    >
                        <span>Like</span>
                        <svg class="w-4 h-4 news-like-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.25" />
                        </svg>
                        <span id="news-like-count" class="text-xs text-slate-500 font-semibold">{{ $article['likes_count'] }}</span>
                    </button>

                    {{-- Share Button --}}
                    <button 
                        type="button" 
                        id="news-share-btn" 
                        class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-medium hover:text-[#0E4174] transition-colors focus:outline-hidden cursor-pointer"
                        aria-label="Share this news item"
                    >
                        <span>Share</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- 4. Featured News Pavilion Booth Image --}}
            <div class="w-full rounded-xl sm:rounded-2xl overflow-hidden shadow-md border border-slate-200/80 mb-10 sm:mb-12 bg-slate-100">
                <img 
                    src="{{ asset($article['image']) }}" 
                    alt="{{ $article['image_alt'] }}" 
                    class="w-full h-auto object-cover max-h-[520px]"
                    loading="eager"
                    fetchpriority="high"
                />
            </div>

            {{-- 5. Content Sections --}}
            @if (!empty($article['sections']))
                <div class="space-y-8 sm:space-y-10">
                    @foreach ($article['sections'] as $section)
                        <section>
                            <h2 class="font-heading font-[700] text-[20px] sm:text-2xl text-[#0E4174] tracking-tight leading-snug mb-3.5">
                                {{ $section['heading'] }}
                            </h2>

                            {{-- Paragraphs --}}
                            @if (!empty($section['paragraphs']))
                                <div class="space-y-4 font-sans text-[15px] sm:text-[16px] text-slate-800 leading-[1.75]">
                                    @foreach ($section['paragraphs'] as $p)
                                        <p>{{ $p }}</p>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Event Details List --}}
                            @if (!empty($section['details']))
                                <ul class="space-y-2 font-sans text-[15px] sm:text-[16px] text-slate-800 leading-relaxed pl-1">
                                    @foreach ($section['details'] as $key => $val)
                                        <li class="flex items-start gap-2">
                                            <span class="text-slate-400 select-none">&bull;</span>
                                            <span><strong class="font-semibold text-slate-900">{{ $key }}:</strong> {{ $val }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </section>
                    @endforeach
                </div>
            @endif

        </div>
    </article>

    {{-- 6. Explore News About People and Technology (Image 2: 3x2 Grid with Pagination) --}}
    <x-news-section />

    {{-- 7. Call to Action Banner --}}
    <x-cta-section />

    {{-- Toast Notification for Share Link --}}
    <div id="news-toast" class="fixed bottom-6 right-6 z-50 hidden bg-[#0E4174] text-white px-5 py-3 rounded-lg shadow-xl text-sm font-medium transition-all duration-300 transform translate-y-4">
        Link copied to clipboard!
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Like Button Interactivity
            const likeBtn = document.getElementById('news-like-btn');
            const likeCount = document.getElementById('news-like-count');
            const likeIcon = document.querySelector('.news-like-icon');

            if (likeBtn && likeCount) {
                let count = parseInt(likeBtn.getAttribute('data-likes') || '0', 10);
                let isLiked = false;

                likeBtn.addEventListener('click', function () {
                    isLiked = !isLiked;
                    count += isLiked ? 1 : -1;
                    likeCount.textContent = count;

                    if (isLiked) {
                        likeBtn.classList.add('text-[#0E4174]', 'font-bold');
                        if (likeIcon) {
                            likeIcon.setAttribute('fill', 'currentColor');
                        }
                    } else {
                        likeBtn.classList.remove('text-[#0E4174]', 'font-bold');
                        if (likeIcon) {
                            likeIcon.setAttribute('fill', 'none');
                        }
                    }
                });
            }

            // Share Button Interactivity
            const shareBtn = document.getElementById('news-share-btn');
            const toast = document.getElementById('news-toast');

            if (shareBtn) {
                shareBtn.addEventListener('click', function () {
                    const currentUrl = window.location.href;

                    if (navigator.clipboard && navigator.clipboard.writeText) {
                        navigator.clipboard.writeText(currentUrl).then(showToast).catch(fallbackShare);
                    } else {
                        fallbackShare();
                    }

                    function fallbackShare() {
                        const tempInput = document.createElement('input');
                        tempInput.value = currentUrl;
                        document.body.appendChild(tempInput);
                        tempInput.select();
                        document.execCommand('copy');
                        document.body.removeChild(tempInput);
                        showToast();
                    }

                    function showToast() {
                        if (toast) {
                            toast.classList.remove('hidden', 'translate-y-4');
                            setTimeout(function () {
                                toast.classList.add('translate-y-4');
                                setTimeout(function () {
                                    toast.classList.add('hidden');
                                }, 300);
                            }, 3000);
                        }
                    }
                });
            }
        });
    </script>
    @endpush
</x-layouts.app>

