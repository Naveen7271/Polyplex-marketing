@php
    $testimonials = [
        [
            'quote' => 'We have been using NovaLife non-tear media for the last 7 years and are impressed with the consistency of product quality and support services.',
            'author' => 'Mr. Ramanan',
            'company' => 'Glo Color Lab, Coimbatore',
            'avatar' => asset('images/avatar-ramanan.png'),
            'initials' => 'MR',
        ],
        [
            'quote' => 'NovaJet Inkjet media is exceptional in terms of colour consistency and image definition. Every sheet is perfectly cut with impeccable finish. My customers love the print quality, and that is what finally matters.',
            'author' => 'Mr. Sam Jagdale',
            'company' => 'Image Photo Shop & Digital Lab, Navi Mumbai',
            'avatar' => asset('images/avatar-sam-jagdale.png'),
            'initials' => 'SJ',
        ],
    ];
@endphp

{{-- Testimonials & Customer Trust Section --}}
<section id="testimonials"
    class="relative w-full py-14 sm:py-16 lg:py-20 overflow-hidden select-none"
    style="background: radial-gradient(ellipse 55% 85% at 0% 60%, rgba(138, 10, 26, 0.82) 0%, rgba(4, 7, 16, 0) 70%),
               radial-gradient(ellipse 55% 85% at 100% 45%, rgba(14, 65, 116, 0.85) 0%, rgba(4, 7, 16, 0) 70%),
               #04060c;"
    aria-labelledby="testimonials-heading">

    <div class="relative z-10 max-w-[1140px] mx-auto px-5 sm:px-6 lg:px-8">

        {{-- Centered Section Header --}}
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
            <p class="font-heading text-xs sm:text-[13px] font-medium uppercase tracking-[0.22em] text-white/85 mb-3">
                TESTIMONIALS
            </p>
            <h2 id="testimonials-heading"
                class="font-heading font-bold text-2xl sm:text-3xl lg:text-[34px] text-white tracking-tight leading-tight">
                Real Applications. Customer Experiences.
            </h2>
        </div>

        {{-- 2-Column Testimonial Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 lg:gap-12">
            @foreach ($testimonials as $testimonial)
                <div class="bg-[#F3F3F3] rounded-[4px] p-7 sm:p-8 lg:px-9 lg:py-8 flex flex-col justify-between shadow-lg">
                    {{-- Quote --}}
                    <p class="font-sans text-[#1E1E1E] text-[14.5px] sm:text-[15px] leading-[1.65] font-normal mb-6">
                        “{{ $testimonial['quote'] }}”
                    </p>

                    {{-- Author Details --}}
                    <div class="flex items-center gap-3.5 pt-1">
                        @if (!empty($testimonial['avatar']))
                            <img
                                src="{{ $testimonial['avatar'] }}"
                                alt="{{ $testimonial['author'] }}"
                                class="w-11 h-11 sm:w-12 sm:h-12 rounded-full object-cover shrink-0 border border-slate-200"
                                loading="lazy"
                            />
                        @else
                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-[#0E4174] text-white font-heading font-bold text-xs flex items-center justify-center shrink-0">
                                {{ $testimonial['initials'] }}
                            </div>
                        @endif
                        <div>
                            <h3 class="font-heading font-bold text-[#111111] text-[16px] sm:text-[17px] leading-snug">
                                {{ $testimonial['author'] }}
                            </h3>
                            <p class="font-sans text-[11.5px] text-slate-600 font-normal mt-0.5">
                                {{ $testimonial['company'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Centered "View More" CTA Button --}}
        <div class="mt-10 sm:mt-12 flex justify-center">
            <a
                href="{{ route('testimonials') }}"
                class="inline-flex items-center justify-center px-5 py-2.5 rounded-[3px] bg-white hover:bg-slate-100 text-[#0E4174] font-sans font-semibold text-sm sm:text-[15px] transition-colors shadow-md focus:outline-hidden focus:ring-2 focus:ring-white/60 focus:ring-offset-2 focus:ring-offset-[#04060c]"
            >
                View More
            </a>
        </div>

    </div>
</section>

