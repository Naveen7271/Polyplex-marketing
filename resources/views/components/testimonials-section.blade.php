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
<section id="testimonials" class="relative w-full bg-white select-none">
    {{-- Top Banner Image Area --}}
    <div class="relative w-full h-64 sm:h-72 md:h-80 lg:h-[572px] xl:h-[572px] bg-slate-900 overflow-hidden">
        <img 
            src="{{ asset('images/testimonials-banner.png') }}" 
            alt="Polyplex DigiPrint Customer Collaboration" 
            class="w-full h-full object-cover object-center"
            loading="lazy"
        />
    </div>

    {{-- White Content Area with Overlapping Circle Badge, Narrative, Cards & Button --}}
    <div class="relative bg-white pb-16 sm:pb-20 lg:pb-24 border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Top Row: Overlapping Circle Badge + Testimonials Narrative --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                {{-- Left Column: Circular Badge overlapping Banner --}}
                <div class="lg:col-span-5 flex justify-center lg:justify-start -mt-28 sm:-mt-36 md:-mt-44 lg:-mt-[212px] relative z-20">
                    <div class="relative w-[320px] h-[320px] sm:w-[380px] sm:h-[380px] md:w-[424px] md:h-[424px] shrink-0 bg-white rounded-full shadow-2xl flex flex-col items-center justify-center p-8 sm:p-10 md:p-12 text-center border border-slate-100">
                        
                        {{-- Red Side Borders / Arcs --}}
                        <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 424 424" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            {{-- Left Red Border Arc --}}
                            <path d="M 127 39.84 A 192 192 0 0 0 127 384.16 L 127 363.83 A 174 174 0 0 1 127 60.17 Z" fill="#d6001c" />
                            
                            {{-- Right Red Border Arc --}}
                            <path d="M 297 39.84 A 192 192 0 0 1 297 384.16 L 297 363.83 A 174 174 0 0 0 297 60.17 Z" fill="#d6001c" />
                        </svg>

                        {{-- Inner White Circle Card Content --}}
                        <h3 class="relative z-10 font-heading font-[600] text-[22px] sm:text-2xl md:text-[26px] text-[#0E4174] leading-snug max-w-[280px]">
                            Trusted by Customers.<br>
                            Proven in Applications.
                        </h3>
                    </div>
                </div>

                {{-- Right Column: Narrative Copy --}}
                <div class="lg:col-span-7 pt-2 lg:pt-8 text-center lg:text-left">
                    <p class="font-heading font-[50] text-[16px] sm:text-sm text-[#0E4174] tracking-[0.2em] uppercase mb-[20px]">
                        TESTIMONIALS
                    </p>
                    <p class="font-sans text-[#000000] text-[16px] font-[500] sm:text-base lg:text-[16px] leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Customer experiences highlight the consistency, quality and support associated with our media solutions.
                    </p>
                </div>

            </div>

            {{-- Second Row: 2 Testimonial Cards --}}
            <div class="grid grid-cols-1 max-h-[219px] md:grid-cols-2 gap-6 lg:gap-[63px] mt-[41px] sm:mt-12 lg:mt-[41px]">
                @foreach ($testimonials as $testimonial)
                    <div class="bg-[#F3F3F3] border-[0.3px] border-slate-300 rounded-[5px] p-6 sm:p-8 flex flex-col justify-between hover:border-slate-300 hover:shadow-xs transition-all">
                        {{-- Quote --}}
                        <p class="font-sans text-[#00000] max-w-[463px] text-[16px] font-[500] sm:text-sm md:text-[14.5px] leading-relaxed mb-6">
                            "{{ $testimonial['quote'] }}"
                        </p>

                        {{-- Author Details --}}
                        <div class="flex items-center gap-3.5 pt-2">
                            @if ($testimonial['avatar'])
                                <img 
                                    src="{{ $testimonial['avatar'] }}" 
                                    alt="{{ $testimonial['author'] }}" 
                                    class="w-[44px] h-[44px] sm:w-10 sm:h-10 rounded-[3px] object-cover shrink-0"
                                    loading="lazy"
                                />
                            @else
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xs bg-[#0b2b4e] text-white font-heading font-bold text-xs flex items-center justify-center shrink-0">
                                    {{ $testimonial['initials'] }}
                                </div>
                            @endif
                            <div>
                                <h4 class="font-heading  font-[600] text-[#000000] text-[20px] leading-tight">
                                    {{ $testimonial['author'] }}
                                </h4>
                                <p class="font-sans text-[11px] font-[500] mt-0.1">
                                    {{ $testimonial['company'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Third Row: Centered "View More" CTA Button --}}
            <div class="mt-10 sm:mt-12 lg:mt-14 flex justify-center">
                <a 
                    href="{{ route('testimonials') }}" 
                    class="inline-flex items-center justify-center py-[10px] px-[20px] rounded-xs bg-[#003570] hover:bg-[#071d36] text-white font-[500] text-[16px] transition-colors shadow-xs focus:outline-hidden focus:ring-2 focus:ring-[#0b2b4e] focus:ring-offset-2"
                >
                    View More
                </a>
            </div>

        </div>
    </div>
</section>

