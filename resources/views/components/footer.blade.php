{{-- Footer Component matching official Polyplex DigiPrint design --}}
<footer class="relative bg-[#1B1B1B] text-slate-300 pt-14 sm:pt-16 select-none overflow-hidden">

    {{-- Main Footer Content Directory --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-12 sm:pb-14">

            {{-- Column 1: Brand, Description, Socials & Copyright (lg:col-span-5) --}}
            <div class="sm:col-span-2 lg:col-span-5 flex flex-col justify-between space-y-8">
                <div class="space-y-4">
                    <div>
                        <a href="{{ url('/') }}" class="inline-block" aria-label="Polyplex DigiPrint">
                            <img src="{{ asset('images/Polyplex Digiprint_RGB_Colour 1.png') }}" alt="Polyplex DigiPrint"
                                class="h-10 w-auto object-contain">
                        </a>
                    </div>

                    <p class="text-[#F3F3F3] font-sans font-normal text-[14px] sm:text-[15px] leading-snug max-w-[290px] pt-1">
                        Formerly known as TechNova Printrite Products Private Limited
                    </p>

                    <p class="text-[#C8C8C8] font-sans font-normal text-[11.5px] sm:text-[12px] leading-[1.6] max-w-[300px]">
                        Polyplex DigiPrint brings together materials expertise and print-industry know-how to develop
                        and supply application-focused print media. Explore our products or connect with our team for
                        product-specific guidance.
                    </p>

                    {{-- Social Icons --}}
                    <div class="flex items-center gap-5 pt-2 text-white">
                        {{-- LinkedIn --}}
                        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"
                            class="hover:text-slate-300 transition-colors" aria-label="LinkedIn">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                        {{-- Instagram --}}
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                            class="hover:text-slate-300 transition-colors" aria-label="Instagram">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        {{-- X (Twitter) --}}
                        <a href="https://x.com" target="_blank" rel="noopener noreferrer"
                            class="hover:text-slate-300 transition-colors" aria-label="X">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>
                        {{-- Facebook --}}
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer"
                            class="hover:text-slate-300 transition-colors" aria-label="Facebook">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                        {{-- YouTube --}}
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer"
                            class="hover:text-slate-300 transition-colors" aria-label="YouTube">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Copyright & Legal Line --}}
                <div class="pt-4 lg:pt-8 space-y-1.5">
                    <p class="font-sans text-[12px] text-[#E5E5E5]">
                        &copy; {{ date('Y') }} Polyplex DigiPrint. All rights reserved.
                    </p>
                    <p class="font-sans text-[11px] text-[#A3A3A3]">
                        Use of this website is subject to our
                        <a href="{{ route('terms-of-use') }}" class="hover:text-white transition-colors">*Terms of Use*</a>
                        and
                        <a href="{{ route('privacy-policy') }}" class="hover:text-white transition-colors">*Privacy Policy*</a>.
                    </p>
                </div>
            </div>

            {{-- Column 2: Company Links (lg:col-span-2) --}}
            <div class="lg:col-span-2">
                <h3 class="font-heading font-bold text-white text-[16px] sm:text-[17px] mb-5">
                    Company
                </h3>
                <ul class="space-y-3 font-sans text-[13px] sm:text-[13.5px] font-normal text-[#E5E5E5]">
                    <li><a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Products</a></li>
                    <li><a href="{{ route('industries') }}" class="hover:text-white transition-colors">Industries</a></li>
                    <li><a href="{{ route('blog') }}" class="hover:text-white transition-colors">Insights &amp; News</a></li>
                    <li><a href="{{ route('careers') }}" class="hover:text-white transition-colors">Careers</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="{{ route('privacy-policy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-of-use') }}" class="hover:text-white transition-colors">Terms of use</a></li>
                </ul>
            </div>

            {{-- Column 3: Products Links (lg:col-span-3) --}}
            <div class="lg:col-span-3">
                <h3 class="font-heading font-bold text-white text-[16px] sm:text-[17px] mb-5">
                    <a href="{{ route('products') }}" class="hover:text-blue-300 transition-colors">Products</a>
                </h3>
                <ul class="space-y-3 font-sans text-[12.5px] sm:text-[13px] font-normal text-[#E5E5E5]">
                    <li><a href="{{ route('products.show', 'non-tear-media') }}" class="hover:text-white transition-colors">Non-Tear Media</a></li>
                    <li><a href="{{ route('products.show', 'gloss-art-paper-media') }}" class="hover:text-white transition-colors">Gloss Art Paper Media</a></li>
                    <li><a href="{{ route('products.show', 'inkjet-photo-media') }}" class="hover:text-white transition-colors">Inkjet Photo Media</a></li>
                    <li><a href="{{ route('products.show', 'digital-labels') }}" class="hover:text-white transition-colors">Digital Labels</a></li>
                    <li><a href="{{ route('products.show', 'multi-purpose-labels') }}" class="hover:text-white transition-colors">Multi-Purpose Labels</a></li>
                    <li><a href="{{ route('products.show', 'digital-wide-format-media') }}" class="hover:text-white transition-colors">Digital Wide-Format Media</a></li>
                    <li><a href="{{ route('products.show', 'reprographic-media') }}" class="hover:text-white transition-colors">Reprographic Media</a></li>
                    <li><a href="{{ route('products.show', 'polyester-offset-plates') }}" class="hover:text-white transition-colors">Polyester Offset Plates</a></li>
                    <li><a href="{{ route('products.show', 'laser-and-inkjet-positive-films') }}" class="hover:text-white transition-colors">Laser &amp; Inkjet Positive Films</a></li>
                </ul>
            </div>

            {{-- Column 4: Brands Links (lg:col-span-2) --}}
            <div class="lg:col-span-2">
                <h3 class="font-heading font-bold text-white text-[16px] sm:text-[17px] mb-5">
                    Brands
                </h3>
                <ul class="space-y-2.5 font-sans text-[12.5px] sm:text-[13px] font-normal text-[#E5E5E5]">
                    <li><a href="{{ route('products.saraprint') }}" class="hover:text-white transition-colors">Saraprint</a></li>
                    <li><a href="{{ route('products.novalife') }}" class="hover:text-white transition-colors">NovaLife</a></li>
                    <li><a href="{{ route('products.novacad') }}" class="hover:text-white transition-colors">NovaCad</a></li>
                    <li><a href="{{ route('products.novadom') }}" class="hover:text-white transition-colors">NovaDom</a></li>
                    <li><a href="{{ route('products.novajet') }}" class="hover:text-white transition-colors">NovaJet MPL</a></li>
                    <li><a href="{{ route('products.novajet') }}" class="hover:text-white transition-colors">NovaJet</a></li>
                    <li><a href="{{ route('products.novasharp') }}" class="hover:text-white transition-colors">NovaSharp</a></li>
                    <li><a href="{{ route('products.novastick') }}" class="hover:text-white transition-colors">NovaStick</a></li>
                    <li><a href="{{ route('products.polijet') }}" class="hover:text-white transition-colors">PoliJet</a></li>
                    <li><a href="{{ route('products.novasign') }}" class="hover:text-white transition-colors">NovaSign</a></li>
                    <li><a href="{{ route('products.posijet') }}" class="hover:text-white transition-colors">PosiJet</a></li>
                    <li><a href="{{ route('products.novatrace') }}" class="hover:text-white transition-colors">NovaTrace</a></li>
                </ul>
            </div>

        </div>
    </div>

    {{-- Bottom Brand Color Stripe Bar (CMYK/Brand Spectrum) --}}
    <div class="w-full h-2 flex" aria-hidden="true">
        <div class="w-1/4 h-full bg-[#0e4175]"></div>
        <div class="w-1/4 h-full bg-[#d6001c]"></div>
        <div class="w-1/4 h-full bg-[#78aa00]"></div>
        <div class="w-1/4 h-full bg-[#3d3935]"></div>
    </div>
</footer>