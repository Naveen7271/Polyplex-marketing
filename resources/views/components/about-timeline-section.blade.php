{{-- Timeline / Legacy Section --}}
<section id="about-timeline-section" class="w-full bg-[#F3F3F3]">
    {{-- Section Header --}}
    <div class="px-4 py-[40px] text-center sm:py-14">
        <h2 class="font-heading text-[32px] font-[700] text-[#0E4174] sm:text-4xl">
            A Legacy Takes Time to Build
        </h2>
        <p class="mt-[16px] mx-auto max-w-[898px] font-heading text-[20px] font-[500] text-[#000000] sm:text-lg">
            Our story is built on the journeys of Polyplex and TechNova and the formation of Polyplex DigiPrint. Explore
            the milestones that shaped the partnership and its product portfolio.
        </p>
    </div>

    {{-- Timeline Graphic Banner --}}
    <section class="timeline" id="timeline" tabindex="0" aria-roledescription="carousel" aria-label="Our journey">
        <div class="timeline__bg" aria-hidden="true">
            <img src="{{ asset('images/time.png') }}" alt=""
                class="h-full w-full object-cover object-center pointer-events-none" loading="eager" />
        </div>
        <div class="timeline__dots" aria-hidden="true"></div>
        <div class="timeline__overlay" aria-hidden="true"></div>

        {{-- Rotating dial: ticks, arc, dots and year labels are built by app.js --}}
        <div class="dial" aria-hidden="true">
            <svg class="dial__svg" viewBox="-700 -700 1400 1400"></svg>
            <div class="dial__labels"></div>
        </div>

        <div class="timeline__content">
            <p class="counter" aria-live="polite">
                <span class="counter__current"><span class="counter__num">1</span></span>
                <span class="counter__sep">/</span>
                <span class="counter__total">7</span>
            </p>

            <div class="slides">
                <article class="slide" data-year="1970s">
                    <h2 class="slide__title">TechNova's Beginnings</h2>
                    <p class="slide__body">Founded in 1971, TechNova introduced India's first micro-grained aluminium
                        offset plates and deep-etch chemicals. Electro-grained and anodised plates, along with wipe-on
                        chemistry, followed, establishing its foundation in print and imaging.</p>
                </article>

                <article class="slide" data-year="1980s">
                    <h2 class="slide__title">Expanding Possibilities, Going Green</h2>
                    <p class="slide__body">TechNova expanded into textile drafting films, screen-making emulsions and
                        laser plotter media. Its eco-friendly, VOC-free chemicals helped pioneer the Go Green movement
                        in India's print industry.</p>
                </article>

                <article class="slide" data-year="1984">
                    <h2 class="slide__title">Polyplex Takes Shape</h2>
                    <p class="slide__body">Polyplex began with a single-line PET film facility in Khatima, producing
                        4,000 tonnes annually. Within a decade, capacity reached 20,000 tonnes, supported by expansion
                        into PET resin production.</p>
                </article>

                <article class="slide" data-year="1996">
                    <h2 class="slide__title">Recognition for GATF</h2>
                    <p class="slide__body">Recognition from innovation marked a milestone in TechNova's commitment to
                        advancing print technology through continuous innovation.</p>
                </article>

                <article class="slide" data-year="2000s">
                    <h2 class="slide__title">Advancing Digital Print and Building a Global Footprint</h2>
                    <p class="slide__body">TechNova expanded into thermal and violet CTP plates, digital printing
                        systems and inkjet media. Alliances with Konica Minolta, HP Indigo, Esko and MGI strengthened a
                        portfolio serving customers in over 60 countries. Polyplex expanded into Thailand in 2003,
                        Turkey in 2005, the US by 2013 and Indonesia by 2017, bringing film and resin manufacturing
                        closer to markets across Asia, Europe and the Americas.</p>
                </article>

                <article class="slide" data-year="2010s">
                    <h2 class="slide__title">Introducing SaraPrint</h2>
                    <p class="slide__body">SaraPrint combined print quality, durability and versatility, opening new
                        possibilities for labels, graphics and product communication.</p>
                </article>

                <article class="slide" data-year="2026">
                    <h2 class="slide__title">Uniting for a Brighter Future</h2>
                    <p class="slide__body">TechNova and Polyplex formed a joint venture, combining a comprehensive
                        portfolio of print, imaging and film solutions with global manufacturing expertise. Together,
                        they opened new possibilities for innovation, growth and a brighter shared future.</p>
                </article>
            </div>
        </div>
    </section>
</section>