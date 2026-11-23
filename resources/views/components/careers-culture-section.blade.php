{{--
Careers Culture & Expectations Section (Second Section of Careers Page)
Based on Polyplex DigiPrint Design:
1. Full-width Video Banner with facility backdrop:
- "Discover how our people describe Polyplex DigiPrint."
- "Watch Video" button with modal popup
2. Overlapping Crimson Red Stat Card:
- 09 Manufacturing Locations
- 02 R&D Facilities
- 12 Distribution & Convention Centres
3. "What You Can Expect at Polyplex DigiPrint" 3-column features:
- Opportunities to Grow
- Freedom to Contribute
- A Culture of Collaboration
--}}
@props([
    'bgImage' => 'images/careers/careers-facility.png',
    'videoHeadline' => 'Discover how our people describe Polyplex DigiPrint.',
    'videoButtonText' => 'Watch Video',
    'videoUrl' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1',
    'stats' => [
        [
            'number' => '09',
            'label' => 'Manufacturing Locations',
        ],
        [
            'number' => '02',
            'label' => 'R&D Facilities',
        ],
        [
            'number' => '12',
            'label' => 'Distribution & Convention Centres',
        ],
    ],
    'sectionTitle' => 'What You Can Expect at Polyplex DigiPrint',
    'expectations' => [
        [
            'icon' => 'lightbulb',
            'title' => 'Opportunities to Grow',
            'description' => 'Take on meaningful responsibilities, expand your capabilities and gain valuable hands-on experience in an environment that encourages curiosity and continuous learning. With every new challenge, you can strengthen your skills, explore your potential and build a rewarding long-term career with confidence.',
        ],
        [
            'icon' => 'chart',
            'title' => 'Freedom to Contribute',
            'description' => 'Bring your ideas, creativity and expertise to work every day in an environment that welcomes fresh thinking. You can solve meaningful challenges, improve the way we work and contribute to solutions that create lasting value for our customers, teams and business.',
        ],
        [
            'icon' => 'collaboration',
            'title' => 'A Culture of Collaboration',
            'description' => 'Work alongside supportive colleagues in an environment that values teamwork, open communication and different perspectives. By sharing knowledge, learning from one another and working towards common goals, you can turn individual strengths into collective progress and build lasting success with confidence.',
        ],
    ],
])

<section id="careers-culture-section" class="relative w-full bg-[#F3F3F3]"
    aria-label="Workplace Culture and Expectations">

    {{-- 1. Video Feature Banner with Manufacturing Facility Backdrop --}}
    <div class="relative w-full h-[521px] lg:h-[521px] overflow-hidden select-none flex items-center justify-center">
        {{-- Background Image --}}
        <img src="{{ asset($bgImage) }}" alt="Polyplex DigiPrint Facility"
            class="absolute inset-0 w-full h-full object-cover object-center" loading="lazy" />

        {{-- Dark Semi-transparent Overlay for Readability --}}
        <div class="absolute inset-0 bg-black/45 md:bg-black/40"></div>

        {{-- Centered Content --}}
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center -translate-y-6 sm:-translate-y-8">
            {{-- Headline --}}
            <h2
                class="font-heading font-[700] text-2xl sm:text-3xl md:text-4xl lg:text-[40px] text-white tracking-tight leading-snug sm:leading-tight drop-shadow-[0_2px_10px_rgba(0,0,0,0.6)]">
                Discover how our people describe<br class="hidden sm:inline"> Polyplex DigiPrint.
            </h2>

            {{-- Watch Video Button --}}
            <div class="mt-6 sm:mt-7">
                <button type="button" id="careers-open-video-btn"
                    class="inline-flex items-center justify-center px-5 sm:px-6 py-2 sm:py-2.5 rounded-xs sm:rounded-sm bg-white hover:bg-slate-100 text-slate-900 font-medium text-xs sm:text-sm tracking-wide shadow-md transition-colors duration-200 cursor-pointer focus:outline-hidden focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-black/50"
                    aria-label="Watch video about how our people describe Polyplex DigiPrint">
                    <svg class="w-3.5 h-3.5 text-slate-900 mr-2 -ml-0.5 fill-current" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                    <span>{{ $videoButtonText }}</span>
                </button>
            </div>
        </div>
    </div>

    {{-- 2. Overlapping Crimson Red Stat Card --}}
    <div class="relative z-20 max-w-4xl lg:max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 sm:-mt-20 md:-mt-24">
        <div
            class="bg-[#D80018] rounded-xl sm:rounded-2xl shadow-xl shadow-red-950/20 py-6 sm:py-8 px-4 sm:px-8 transition-transform duration-300">
            <div class="grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-white/25">
                @foreach($stats as $idx => $stat)
                    <div class="text-center py-4 sm:py-0 px-2 sm:px-4">
                        {{-- Stat Number --}}
                        <div
                            class="font-heading font-bold text-4xl sm:text-5xl lg:text-[54px] text-white leading-none tracking-tight">
                            {{ $stat['number'] }}
                        </div>
                        {{-- Stat Label --}}
                        <p
                            class="font-sans text-xs sm:text-sm md:text-[14.5px] font-medium text-white/95 mt-2 sm:mt-2.5 leading-snug">
                            {{ $stat['label'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- 3. What You Can Expect at Polyplex DigiPrint --}}
    <div class="w-full pt-16 sm:pt-20 md:pt-24 pb-16 sm:pb-20 md:pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section Title --}}
            <h2
                class="font-heading font-[700] text-2xl sm:text-3xl lg:text-[32px] text-[#0E4174] tracking-tight text-center mb-12 sm:mb-16">
                {{ $sectionTitle }}
            </h2>

            {{-- 3-Column Features Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10 lg:gap-12">
                @foreach($expectations as $item)
                    <div class="flex flex-col">
                        {{-- Header: Icon + Title inline --}}
                        <div class="flex items-center gap-2.5 sm:gap-3 mb-3.5 sm:mb-4">
                            @if(($item['icon'] ?? '') === 'lightbulb')
                                {{-- Lightbulb / Idea Icon --}}
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#D80018] shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 18v-2m-3 2h6m-5.5 2h5M9.663 17h4.674M12 3a7 7 0 0 0-4.95 11.95c.77.77 1.287 1.625 1.54 2.05h6.82c.253-.425.77-1.28 1.54-2.05A7 7 0 0 0 12 3z" />
                                </svg>
                            @elseif(($item['icon'] ?? '') === 'chart')
                                {{-- Ascending Bar Chart Icon --}}
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#D80018] shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                                </svg>
                            @else
                                {{-- Collaboration / Teamwork Icon --}}
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#D80018] shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            @endif

                            <h3
                                class="font-heading font-bold text-lg sm:text-[19px] lg:text-[20px] text-[#0E4174] leading-snug">
                                {{ $item['title'] }}
                            </h3>
                        </div>

                        {{-- Body Copy --}}
                        <p class="font-sans text-sm sm:text-[14.5px] leading-relaxed text-[#2D3748]">
                            {{ $item['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Video Modal Dialog --}}
    <div id="careers-video-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/80 backdrop-blur-xs transition-opacity duration-300"
        role="dialog" aria-modal="true" aria-labelledby="careers-video-modal-title">

        <div
            class="relative w-full max-w-4xl bg-slate-950 rounded-xl overflow-hidden shadow-2xl border border-slate-800">
            {{-- Modal Header --}}
            <div class="flex items-center justify-between px-5 py-3.5 border-b border-slate-800 bg-slate-900/80">
                <h3 id="careers-video-modal-title" class="font-heading font-semibold text-white text-sm sm:text-base">
                    Discover how our people describe Polyplex DigiPrint
                </h3>
                <button type="button" id="careers-close-video-btn"
                    class="text-slate-400 hover:text-white p-1 rounded-md transition-colors focus:outline-hidden"
                    aria-label="Close video player">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Responsive 16:9 Video Container --}}
            <div class="relative aspect-video w-full bg-black">
                <iframe id="careers-video-iframe" class="w-full h-full" src="" data-src="{{ $videoUrl }}"
                    title="Polyplex DigiPrint Culture Video" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openBtn = document.getElementById('careers-open-video-btn');
        const closeBtn = document.getElementById('careers-close-video-btn');
        const modal = document.getElementById('careers-video-modal');
        const iframe = document.getElementById('careers-video-iframe');

        if (!openBtn || !closeBtn || !modal || !iframe) {
            return;
        }

        const videoSrc = iframe.getAttribute('data-src') || '';

        function openModal() {
            iframe.src = videoSrc;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            iframe.src = '';
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        openBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);

        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>