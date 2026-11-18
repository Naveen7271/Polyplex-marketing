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
            'quote' => 'Qorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.',
            'author' => 'Mr. Sam Jagdale',
            'company' => 'Image Photo Shop & Digital Lab, Navi Mumbai',
            'avatar' => asset('images/avatar-sam-jagdale.png'),
            'initials' => 'SJ',
        ],
        [
            'quote' => 'Rorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis.',
            'author' => 'Mr. Ramanan',
            'company' => 'Glo Color Lab, Coimbatore',
            'avatar' => asset('images/avatar-ramanan.png'),
            'initials' => 'MR',
        ],
        [
            'quote' => 'Qorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ',
            'author' => 'Mr. Sam Jagdale',
            'company' => 'Image Photo Shop & Digital Lab, Navi Mumbai',
            'avatar' => asset('images/avatar-sam-jagdale.png'),
            'initials' => 'SJ',
        ],
    ];
@endphp

<x-layouts.app :title="'Testimonials | Polyplex DigiPrint - Synthetic Paper & Specialty Print Media'">
    {{-- Testimonials Page Section --}}
    <section class="relative w-full bg-white select-none">
        {{-- Top Banner Image Area --}}
        <div class="relative w-full h-64 sm:h-72 md:h-80 lg:h-[572px] xl:h-[572px] bg-slate-900 overflow-hidden">
            <img 
                src="{{ asset('images/testimonials-banner.png') }}" 
                alt="Polyplex DigiPrint Customer Collaboration" 
                class="w-full h-full object-cover object-center"
                loading="lazy"
            />
        </div>

        {{-- White Content Area with Overlapping Circle Badge, Narrative & Vertical Testimonials List --}}
        <div class="relative bg-white pb-16 sm:pb-20 lg:pb-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                {{-- Top Row: Overlapping Circle Badge + Testimonials Narrative --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    
                    {{-- Left Column: Circular Badge overlapping Banner --}}
                    <div class="lg:col-span-5 flex justify-center lg:justify-start -mt-28 sm:-mt-36 md:-mt-44 lg:-mt-[212px] relative z-20">
                        <div class="relative w-[280px] h-[280px] min-[360px]:w-[320px] min-[360px]:h-[320px] sm:w-[380px] sm:h-[380px] md:w-[424px] md:h-[424px] max-w-full shrink-0 bg-white rounded-full shadow-2xl flex flex-col items-center justify-center p-6 min-[360px]:p-8 sm:p-10 md:p-12 text-center border border-slate-100">
                            
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

                {{-- Testimonials Vertical List --}}
                <div class="max-w-3xl mx-auto mt-14 sm:mt-18 lg:mt-24 space-y-10 sm:space-y-12">
                    @foreach ($testimonials as $testimonial)
                        <div class="space-y-5">
                            {{-- Quote --}}
                            <p class="font-sans text-[#000000] text-[15px] sm:text-[16px] font-[400] leading-relaxed">
                                &ldquo;{{ $testimonial['quote'] }}&rdquo;
                            </p>

                            {{-- Author Details --}}
                            <div class="flex items-center gap-3.5 pt-1">
                                @if ($testimonial['avatar'])
                                    <img 
                                        src="{{ $testimonial['avatar'] }}" 
                                        alt="{{ $testimonial['author'] }}" 
                                        class="w-[42px] h-[42px] rounded-[3px] object-cover shrink-0"
                                        loading="lazy"
                                    />
                                @else
                                    <div class="w-[42px] h-[42px] rounded-[3px] bg-[#0b2b4e] text-white font-heading font-bold text-xs flex items-center justify-center shrink-0">
                                        {{ $testimonial['initials'] }}
                                    </div>
                                @endif
                                <div>
                                    <h4 class="font-heading font-[600] text-[#000000] text-[15px] sm:text-[16px] leading-tight">
                                        {{ $testimonial['author'] }}
                                    </h4>
                                    <p class="font-sans text-[11px] sm:text-[12px] text-slate-500 font-normal mt-0.5">
                                        {{ $testimonial['company'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if (!$loop->last)
                            <div class="border-b border-[#E5E7EB]"></div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    {{-- Call to Action: Let's Build the Future Together --}}
    <x-cta-section />
</x-layouts.app>

