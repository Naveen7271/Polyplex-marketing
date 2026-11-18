{{--
Contact Page Details & Corporate Office Location Section
Displays 4 contact info cards (Email, Phone, Corporate Office Address, Registered Address)
with navy icon badges, followed by the Corporate Office Location map view.

Customization:
<x-contact-details-section map-image="images/contact-corporate-location.png"
    google-maps-url="https://maps.google.com/?q=Plot+No.+C2,+M.I.D.C.+Taloja,+District+Raigad,+Maharashtra+410208,+India" />
--}}
@props([
    'mapImage' => 'images/contact-corporate-location.png',
    'googleMapsUrl' => 'https://maps.google.com/?q=Plot+No.+C2,+M.I.D.C.+Taloja,+District+Raigad,+Maharashtra+410208,+India',
])

<section id="contact-details-section" class="relative w-full bg-white py-16 sm:py-20 lg:py-24 select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Top Grid: 4 Contact Information Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10 items-start">

            {{-- Card 1: Email --}}
            <div class="flex flex-col items-start space-y-3">
                {{-- Navy Square Icon Badge --}}
                <div
                    class="w-10 h-10 rounded-md bg-[#0E4174] flex items-center justify-center text-white shrink-0 shadow-xs">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>

                {{-- Title --}}
                <h3 class="font-sans font-medium text-[#0E4174] text-[17px]">
                    Email
                </h3>

                {{-- Content --}}
                <a href="mailto:corp@technovaprintrite.com"
                    class="font-sans text-slate-800 hover:text-[#0E4174] text-sm sm:text-[14px] leading-relaxed transition-colors break-all">
                    corp@technovaprintrite.com
                </a>
            </div>

            {{-- Card 2: Phone --}}
            <div class="flex flex-col items-start space-y-3">
                {{-- Navy Square Icon Badge --}}
                <div
                    class="w-10 h-10 rounded-md bg-[#0E4174] flex items-center justify-center text-white shrink-0 shadow-xs">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                </div>

                {{-- Title --}}
                <h3 class="font-sans font-medium text-[#0E4174] text-[17px]">
                    Phone
                </h3>

                {{-- Content --}}
                <div
                    class="space-y-1 font-sans text-slate-900 font-medium sm:font-semibold text-sm sm:text-[14px] leading-relaxed">
                    <div>
                        <a href="tel:+918879792658" class="hover:text-[#0E4174] transition-colors">
                            +91-8879792658
                        </a>
                    </div>
                    <div>
                        <a href="tel:+918879792659" class="hover:text-[#0E4174] transition-colors">
                            +91-8879792659
                        </a>
                    </div>
                </div>
            </div>

            {{-- Card 3: Corporate Office Address --}}
            <div class="flex flex-col items-start space-y-3">
                {{-- Navy Square Icon Badge --}}
                <div
                    class="w-10 h-10 rounded-md bg-[#0E4174] flex items-center justify-center text-white shrink-0 shadow-xs">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>

                {{-- Title --}}
                <h3 class="font-sans font-medium text-[#0E4174] text-[17px]">
                    Corporate Office Address
                </h3>

                {{-- Content --}}
                <address class="not-italic font-sans text-slate-800 text-sm sm:text-[14px] leading-relaxed">
                    Plot No. C2, M.I.D.C. Taloja,<br>
                    District Raigad, Maharashtra<br>
                    410208, India
                </address>
            </div>

            {{-- Card 4: Registered Address --}}
            <div class="flex flex-col items-start space-y-3">
                {{-- Navy Square Icon Badge --}}
                <div
                    class="w-10 h-10 rounded-md bg-[#0E4174] flex items-center justify-center text-white shrink-0 shadow-xs">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                </div>

                {{-- Title --}}
                <h3 class="font-sans font-medium text-[#0E4174] text-[17px]">
                    Registered Address
                </h3>

                {{-- Content --}}
                <address class="not-italic font-sans text-slate-800 text-sm sm:text-[14px] leading-relaxed">
                    F-5, 1st Floor, Laxmi Woollen Mills Estate,<br>
                    Dr. E. Moses Road, Shakti Mill Lane, Mahalaxmi,<br>
                    Mumbai, Maharashtra 400011, India
                </address>
            </div>

        </div>

        {{-- Bottom Section: Corporate Office Location & Map --}}
        <div class="mt-14 sm:mt-16 lg:mt-20">

            {{-- Heading --}}
            <h2 class="font-heading font-semibold text-slate-900 text-lg sm:text-xl tracking-tight mb-5 sm:mb-6">
                Corporate Office Location
            </h2>

            {{-- Map Container with Interactive Link to Google Maps --}}
            <div
                class="relative w-full rounded-md sm:rounded-lg overflow-hidden border border-slate-200/90 shadow-xs group bg-slate-100">
                <img src="{{ asset($mapImage) }}"
                    alt="Corporate Office Location - Polyplex DigiPrint, Plot No. C2, M.I.D.C. Taloja, Maharashtra"
                    class="w-full h-auto min-h-[260px] sm:min-h-[340px] md:min-h-[420px] object-cover object-center transition-transform duration-300 group-hover:scale-[1.01]"
                    loading="lazy" />

                {{-- Optional View in Google Maps Floating Action Badge --}}
                @if (!empty($googleMapsUrl))
                    <div class="absolute bottom-4 right-4 z-10">
                        <!-- <a href="{{ $googleMapsUrl }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center space-x-2 bg-white/95 hover:bg-white text-slate-800 hover:text-[#0E4174] text-xs sm:text-sm font-medium px-3.5 py-2 rounded-md shadow-md border border-slate-200/80 backdrop-blur-xs transition-colors">
                                <svg class="w-4 h-4 text-[#0E4174]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                                <span>Open in Google Maps</span>
                            </a> -->
                    </div>
                @endif
            </div>

        </div>

    </div>
</section>