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
                    {{-- Eyebrow Row: Red Icon + Navy Title + Blue Underline --}}
                    <div class="flex items-center gap-3">
                        {{-- Vision Icon (Viewfinder Scanner + Eye) --}}
                        <div class="shrink-0 text-[#d6001c]">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 8.25V5.25A1.5 1.5 0 0 1 5.25 3.75h3M15 3.75h3.75a1.5 1.5 0 0 1 1.5 1.5v3M20.25 15.75v3a1.5 1.5 0 0 1-1.5 1.5H15M8.25 20.25H5.25a1.5 1.5 0 0 1-1.5-1.5v-3" />
                                <circle cx="12" cy="12" r="2.75" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 12c1.333-2.667 3.333-4 5-4s3.667 1.333 5 4c-1.333 2.667-3.333 4-5 4s-3.667-1.333-5-4z" />
                            </svg>
                        </div>
                        <div>
                            <h2
                                class="font-heading font-[500] text-[16px] tracking-[.12em] sm:text-sm tracking-widest  text-[#0E4174] uppercase">
                                OUR VISION
                            </h2>
                            <div class="w-[43px] h-[1px] bg-[#0E4174] mt-[12px]"></div>
                        </div>
                    </div>

                    {{-- Main Statement + Chevron Row --}}
                    <div class="mt-[35px] pl-9 sm:pl-12 md:pl-14 flex items-start justify-between gap-6 sm:gap-10">
                        <p
                            class="font-heading font-[600] text-[#000000] text-[20px] sm:text-[20px] md:text-[19px] lg:text-[20px] leading-snug sm:leading-relaxed max-w-3xl ">
                            To be a globally trusted and technology-driven leader in digital print substrates,
                            recognised for quality, innovation and value creation across diverse applications.
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
                    {{-- Eyebrow Row: Red Icon + Navy Title + Blue Underline --}}
                    <div class="flex items-center gap-3">
                        {{-- Mission Icon (Target / Bullseye) --}}
                        <div class="shrink-0 text-[#d6001c]">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                                <circle cx="12" cy="12" r="9" />
                                <circle cx="12" cy="12" r="5.25" />
                                <circle cx="12" cy="12" r="1.75" fill="currentColor" stroke="none" />
                            </svg>
                        </div>
                        <div>
                            <h2
                                class="font-heading font-[500] text-[16px] tracking-[.12em] sm:text-sm tracking-widest  text-[#0E4174] uppercase">
                                OUR MISSION
                            </h2>
                            <div class="w-[43px] h-[1px] bg-[#0E4174] mt-[12px]"></div>
                        </div>
                    </div>

                    {{-- Main Statement + Chevron Row --}}
                    <div class="mt-[35px] pl-9 sm:pl-12 md:pl-14 flex items-start justify-between gap-6 sm:gap-10">
                        <p
                            class="font-heading font-semibold text-slate-900 text-[20px] sm:text-[20px] md:text-[19px] lg:text-[20px] leading-snug sm:leading-relaxed max-w-3xl group-hover:text-[#003570] transition-colors">
                            To deliver high-performance print media solutions that enable our customers to Create,
                            Communicate and Connect — while building a sustainable and profitable business together.
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
                    {{-- Eyebrow Row: Red Icon + Navy Title + Blue Underline --}}
                    <div class="flex items-center gap-3">
                        {{-- Purpose Icon (Brain & Innovation Network) --}}
                        <div class="shrink-0 text-[#d6001c]">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.5 4a3.5 3.5 0 0 0-3.5 3.5c0 .5.1 1 .3 1.4A3.5 3.5 0 0 0 4 12c0 1.2.6 2.3 1.5 2.9A3.5 3.5 0 0 0 8 18.5c.5 0 1-.1 1.5-.3V4zM14.5 4a3.5 3.5 0 0 1 3.5 3.5c0 .5-.1 1-.3 1.4A3.5 3.5 0 0 1 20 12c0 1.2-.6 2.3-1.5 2.9A3.5 3.5 0 0 1 16 18.5c-.5 0-1-.1-1.5-.3V4z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.5 8.5H12m-2.5 3.5H12m-2.5 3.5H12m2.5-7H12m2.5 3.5H12m2.5 3.5H12" />
                            </svg>
                        </div>
                        <div>
                            <h2
                                class="font-heading font-[500] text-[16px] tracking-[.12em] sm:text-sm tracking-widest  text-[#003570] uppercase">
                                OUR PURPOSE
                            </h2>
                            <div class="w-[43px] h-[1px] bg-[#0E4174] mt-[12px]"></div>

                        </div>
                    </div>

                    {{-- Main Statement + Chevron Row --}}
                    <div class="mt-[35px] pl-9 sm:pl-12 md:pl-14 flex items-start justify-between gap-6 sm:gap-10">
                        <p
                            class="font-heading font-semibold text-slate-900 text-[20px] sm:text-[20px] md:text-[19px] lg:text-[20px] leading-snug sm:leading-relaxed max-w-3xl group-hover:text-[#003570] transition-colors">
                            To shape the future of print with lasting solutions, made in India for the world, with
                            sustainability at their core.
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
                    {{-- Eyebrow Row: Red Icon + Navy Title + Blue Underline --}}
                    <div class="flex items-center gap-3">
                        {{-- Core Values Icon (Handshake / Trust) --}}
                        <div class="shrink-0 text-[#d6001c]">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 11.5 4 14.5l3.5 3.5 3.5-3.5M17 11.5l3 3-3.5 3.5-3.5-3.5" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m6.5 11 3-3a2.121 2.121 0 0 1 3 0l.5.5a2.121 2.121 0 0 0 3 0l1.5-1.5a2.121 2.121 0 0 1 3 0l1 1" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11 14.5 2 2 2-2" />
                            </svg>
                        </div>
                        <div>
                            <h2
                                class="font-heading font-[500] text-[16px] tracking-[.12em] sm:text-sm tracking-widest  text-[#0E4174] uppercase">
                                OUR CORE VALUES
                            </h2>
                            <div class="w-[43px] h-[1px] bg-[#0E4174] mt-[12px]"></div>
                        </div>
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