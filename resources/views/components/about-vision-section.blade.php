{{--
About Us - Vision, Mission, Purpose & Core Values Accordion Section
Displays the company pillars with signature red outline icons, navy titles,
underlines, statements, and smooth expandable accordion drawers (one at a time).
--}}
<section id="about-pillars-section" class="relative w-full bg-white py-16 sm:py-20 lg:py-24 "
    aria-label="Our Vision, Mission, Purpose and Core Values">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-[898px] mx-auto divide-y divide-slate-200">

            {{-- 1. OUR VISION --}}
            <div class="py-8 sm:py-10 first:pt-0 last:pb-0">
                <button type="button"
                    class="about-pillar-toggle group w-full text-left focus:outline-hidden focus-visible:ring-2 focus-visible:ring-[#003570] focus-visible:ring-offset-4 rounded-sm transition-colors cursor-pointer"
                    aria-expanded="false" aria-controls="pillar-content-vision" id="pillar-btn-vision">
                    {{-- Eyebrow Row: Red Icon + Red Title + Full Underline --}}
                    <div class="inline-flex flex-col">
                        <div class="flex items-center gap-3">
                            {{-- Vision Icon --}}
                            <div class="shrink-0">
                                <img src="{{ asset('images/about-vision-icon.png') }}" alt="Our Vision"
                                    class="w-6 h-6 object-contain" loading="lazy" />
                            </div>
                            <h2
                                class="font-heading font-[600] text-[16px] tracking-[0.12em] text-[#D6001C] uppercase">
                                OUR VISION
                            </h2>
                        </div>
                        <div class="w-full h-[1px] bg-[#D6001C] mt-[12px]"></div>
                    </div>

                    {{-- Main Statement + Chevron Row --}}
                    <div class="mt-[35px] pl-9 sm:pl-12 md:pl-14 flex items-start justify-between gap-6 sm:gap-10">
                        <p
                            class="font-heading font-[600] text-[#000000] text-[20px] sm:text-[20px] md:text-[19px] lg:text-[20px] leading-snug sm:leading-relaxed max-w-3xl ">
                            To be a preferred partner for innovative and application-focused print media solutions.
                        </p>

                        {{-- Red Chevron --}}
                        <div class="shrink-0 pt-1 text-[#d6001c]">
                            <svg class="pillar-chevron w-5 h-5 transition-transform duration-300 ease-out"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                </button>

                {{-- Smooth Expandable Drawer (Paragraph) --}}
                <div id="pillar-content-vision"
                    class="about-pillar-content grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out"
                    role="region" aria-labelledby="pillar-btn-vision">
                    <div class="overflow-hidden">
                        <div class="pl-9 sm:pl-12 md:pl-14 pt-4 sm:pt-5 pb-2">
                            <p class="font-sans text-slate-700 text-[15px] sm:text-[16px] leading-relaxed max-w-3xl">
                                Our vision is rooted in the belief that leadership is built not only through scale, but
                                through innovation, technical expertise, consistent quality and the ability to create
                                meaningful value for customers across markets.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. OUR MISSION --}}
            <div class="py-8 sm:py-10">
                <button type="button"
                    class="about-pillar-toggle group w-full text-left focus:outline-hidden focus-visible:ring-2 focus-visible:ring-[#003570] focus-visible:ring-offset-4 rounded-sm transition-colors cursor-pointer"
                    aria-expanded="false" aria-controls="pillar-content-mission" id="pillar-btn-mission">
                    {{-- Eyebrow Row: Red Icon + Red Title + Full Underline --}}
                    <div class="inline-flex flex-col">
                        <div class="flex items-center gap-3">
                            {{-- Mission Icon --}}
                            <div class="shrink-0">
                                <img src="{{ asset('images/about-mission-icon.png') }}" alt="Our Mission"
                                    class="w-6 h-6 object-contain" loading="lazy" />
                            </div>
                            <h2
                                class="font-heading font-[600] text-[16px] tracking-[0.12em] text-[#D6001C] uppercase">
                                OUR MISSION
                            </h2>
                        </div>
                        <div class="w-full h-[1px] bg-[#D6001C] mt-[12px]"></div>
                    </div>

                    {{-- Main Statement + Chevron Row --}}
                    <div class="mt-[35px] pl-9 sm:pl-12 md:pl-14 flex items-start justify-between gap-6 sm:gap-10">
                        <p
                            class="font-heading font-semibold text-slate-900 text-[20px] sm:text-[20px] md:text-[19px] lg:text-[20px] leading-snug sm:leading-relaxed max-w-3xl group-hover:text-[#003570] transition-colors">
                            To deliver dependable print media, relevant product innovation and responsive support
                            through an understanding of substrates, technology and customer applications.

                        </p>

                        {{-- Red Chevron --}}
                        <div class="shrink-0 pt-1 text-[#d6001c]">
                            <svg class="pillar-chevron w-5 h-5 transition-transform duration-300 ease-out"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                </button>

                {{-- Smooth Expandable Drawer (Paragraph) --}}
                <div id="pillar-content-mission"
                    class="about-pillar-content grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out"
                    role="region" aria-labelledby="pillar-btn-mission">
                    <div class="overflow-hidden">
                        <div class="pl-9 sm:pl-12 md:pl-14 pt-4 sm:pt-5 pb-2">
                            <p class="font-sans text-slate-700 text-[15px] sm:text-[16px] leading-relaxed max-w-3xl">
                                Our mission is to bring together our strengths across the entire value chain to create
                                solutions around real-world requirements and which customers can rely on. At the same
                                time, we remain focused on responsible practices and building relationships that create
                                lasting value for our customers and vendors.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. OUR PURPOSE --}}
            <div class="py-8 sm:py-10">
                <button type="button"
                    class="about-pillar-toggle group w-full text-left focus:outline-hidden focus-visible:ring-2 focus-visible:ring-[#003570] focus-visible:ring-offset-4 rounded-sm transition-colors cursor-pointer"
                    aria-expanded="false" aria-controls="pillar-content-purpose" id="pillar-btn-purpose">
                    {{-- Eyebrow Row: Red Icon + Red Title + Full Underline --}}
                    <div class="inline-flex flex-col">
                        <div class="flex items-center gap-3">
                            {{-- Purpose Icon --}}
                            <div class="shrink-0">
                                <img src="{{ asset('images/about-purpose-icon.png') }}" alt="Our Purpose"
                                    class="w-6 h-6 object-contain" loading="lazy" />
                            </div>
                            <h2
                                class="font-heading font-[600] text-[16px] tracking-[0.12em] text-[#D6001C] uppercase">
                                OUR PURPOSE
                            </h2>
                        </div>
                        <div class="w-full h-[1px] bg-[#D6001C] mt-[12px]"></div>
                    </div>

                    {{-- Main Statement + Chevron Row --}}
                    <div class="mt-[35px] pl-9 sm:pl-12 md:pl-14 flex items-start justify-between gap-6 sm:gap-10">
                        <p
                            class="font-heading font-semibold text-slate-900 text-[20px] sm:text-[20px] md:text-[19px] lg:text-[20px] leading-snug sm:leading-relaxed max-w-3xl group-hover:text-[#003570] transition-colors">
                            To help print businesses turn ideas into valuable finished applications through the right
                            materials and knowledge.
                        </p>

                        {{-- Red Chevron --}}
                        <div class="shrink-0 pt-1 text-[#d6001c]">
                            <svg class="pillar-chevron w-5 h-5 transition-transform duration-300 ease-out"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                </button>

                {{-- Smooth Expandable Drawer (Paragraph) --}}
                <div id="pillar-content-purpose"
                    class="about-pillar-content grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out"
                    role="region" aria-labelledby="pillar-btn-purpose">
                    <div class="overflow-hidden">
                        <div class="pl-9 sm:pl-12 md:pl-14 pt-4 sm:pt-5 pb-2">
                            <p class="font-sans text-slate-700 text-[15px] sm:text-[16px] leading-relaxed max-w-3xl">
                                By combining materials science, manufacturing expertise and application knowledge, we
                                create durable print media that support creativity, communication and business growth.
                                Our focus is on responsible innovation, using resources thoughtfully and building
                                solutions that deliver value over time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4. OUR CORE VALUES --}}
            <div class="py-8 sm:py-10 first:pt-0 last:pb-0">
                <button type="button"
                    class="about-pillar-toggle group w-full text-left focus:outline-hidden focus-visible:ring-2 focus-visible:ring-[#003570] focus-visible:ring-offset-4 rounded-sm transition-colors cursor-pointer"
                    aria-expanded="false" aria-controls="pillar-content-values" id="pillar-btn-values">
                    {{-- Eyebrow Row: Red Icon + Red Title + Full Underline --}}
                    <div class="inline-flex flex-col">
                        <div class="flex items-center gap-3">
                            {{-- Core Values Icon --}}
                            <div class="shrink-0">
                                <img src="{{ asset('images/about-values-icon.png') }}" alt="Our Core Values"
                                    class="w-6 h-6 object-contain" loading="lazy" />
                            </div>
                            <h2
                                class="font-heading font-[600] text-[16px] tracking-[0.12em] text-[#D6001C] uppercase">
                                OUR CORE VALUES
                            </h2>
                        </div>
                        <div class="w-full h-[1px] bg-[#D6001C] mt-[12px]"></div>
                    </div>

                    {{-- Main Statement + Chevron Row --}}
                    <div class="mt-[35px] pl-9 sm:pl-12 md:pl-14 flex items-start justify-between gap-6 sm:gap-10">
                        <p
                            class="font-heading font-semibold text-slate-900 text-base sm:text-[20px] md:text-[19px] lg:text-[20px] leading-snug sm:leading-relaxed max-w-3xl group-hover:text-[#003570] transition-colors">
                            Our values are integral to how we build trust, embrace responsibility and create lasting
                            value for our customers and stakeholders.
                        </p>

                        {{-- Red Chevron --}}
                        <div class="shrink-0 pt-1 text-[#d6001c]">
                            <svg class="pillar-chevron w-5 h-5 transition-transform duration-300 ease-out"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                </button>

                {{-- Smooth Expandable Drawer (2-Column Core Values) --}}
                <div id="pillar-content-values"
                    class="about-pillar-content grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out"
                    role="region" aria-labelledby="pillar-btn-values">
                    <div class="overflow-hidden">
                        <div
                            class="pl-9 sm:pl-12 md:pl-14 pt-6 pb-2 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6 text-sm text-slate-700 leading-relaxed max-w-4xl">
                            {{-- Column 1 --}}
                            <div class="space-y-6">
                                <div>
                                    <span class="font-bold text-[#003570]">Customer First:</span>
                                    <span> Understanding customer needs and delivering value through responsive,
                                        reliable and tailored solutions.</span>
                                </div>
                                <div>
                                    <span class="font-bold text-[#003570]">Innovation:</span>
                                    <span> Embracing new technologies and ideas to advance print capabilities and create
                                        possibilities.</span>
                                </div>
                                <div>
                                    <span class="font-bold text-[#003570]">Integrity:</span>
                                    <span> Upholding transparency, honesty and ethical practices in every decision and
                                        business relationship.</span>
                                </div>
                            </div>

                            {{-- Column 2 --}}
                            <div class="space-y-6">
                                <div>
                                    <span class="font-bold text-[#003570]">Collaboration:</span>
                                    <span> Building stronger outcomes through shared expertise, teamwork and meaningful
                                        partnerships.</span>
                                </div>
                                <div>
                                    <span class="font-bold text-[#003570]">Excellence:</span>
                                    <span> Pursuing the highest standards in product quality, performance and customer
                                        experience.</span>
                                </div>
                                <div>
                                    <span class="font-bold text-[#003570]">Responsibility:</span>
                                    <span> Acting with accountability and purpose towards our people, partners,
                                        communities and environment.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>