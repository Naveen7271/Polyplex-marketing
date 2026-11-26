{{-- Why Polyplex DigiPrint Section --}}
<section class="relative w-full overflow-hidden bg-[#021226]">
    <div class="relative min-h-[480px] lg:min-h-[540px] flex items-center">

        {{-- Right Side Background Image & Gradient Blend --}}
        <div class="absolute inset-0 lg:left-1/3 z-0 pointer-events-none overflow-hidden">
            <img src="{{ asset('images/why-polyplex.jpg') }}" alt="Polyplex DigiPrint Print Capabilities"
                class="w-full h-full object-cover object-center lg:object-right">

            {{-- Seamless Gradient Masks: Fades image into deep navy on the left and edges --}}
            <div
                class="absolute inset-0 bg-linear-to-r from-[#021226] via-[#021226]/85 to-transparent lg:via-[#021226]/60">
            </div>
            <div class="absolute inset-0 bg-linear-to-t from-[#021226] via-transparent to-[#021226]/40"></div>
        </div>

        {{-- Left Side: Text Narrative Content Container --}}
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 lg:py-24 w-full text-white ">
            <div class="max-w-xl lg:max-w-2xl space-y-6">

                {{-- Eyebrow --}}
                <p class="font-heading text-[16px] font-[500] sm:text-sm font-semibold uppercase tracking-[0.22em] ">
                    Why Polyplex DigiPrint
                </p>

                {{-- Main Heading (Montserrat) --}}
                <h2
                    class="font-heading font-bold text-3xl sm:text-4xl lg:text-[32px] font-[700] text-white tracking-tight leading-[1.18]">
                    The science behind the substrate.<br>The understanding behind the print.
                </h2>

                {{-- Body Paragraph (Inter) --}}
                <p
                    class="font-sans text-[16px] font-[500] sm:text-base text-white leading-relaxed max-w-[550px] font-normal">
                    A great print begins before ink or toner reaches the surface. It begins with choosing the right
                    substrate, coating and finish for the application. Our approach connects material performance with
                    practical printing requirements to help customers make more informed media choices.
                </p>

                {{-- Action Button --}}
                <div class="pt-2">
                    <a href="#about"
                        class="inline-flex items-center justify-center px-6 py-2.5 rounded-xs sm:rounded-sm bg-white hover:bg-slate-100 text-[#021226] font-semibold text-sm transition-all shadow-md hover:shadow-lg focus:outline-hidden focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#021226]">
                        Know More
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>