{{-- Footer Component matching official Polyplex DigiPrint design --}}
<footer class="relative bg-[#1e1e1e] text-slate-300 pt-16 select-none overflow-hidden">
    {{-- Floating Newsletter Subscription Card --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 sm:mb-16">
        <div class="bg-white rounded-lg p-5 sm:p-6 lg:py-6 lg:px-8 shadow-xl flex flex-col lg:flex-row items-center justify-between gap-5">
            <div>
                <h3 class="font-heading font-bold text-slate-900 text-base sm:text-lg tracking-tight">
                    Subscribe to our newsletter for the latest trends and updates!
                </h3>
            </div>
            <form action="#newsletter" method="POST" onsubmit="event.preventDefault(); alert('Thank you for subscribing to our newsletter!');" class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                <input 
                    type="email" 
                    name="email" 
                    required
                    placeholder="Email Id" 
                    class="w-full sm:w-72 md:w-80 px-4 py-2.5 rounded text-sm text-slate-900 placeholder-slate-400 border border-slate-300 focus:outline-hidden focus:border-[#0b2b4e] focus:ring-1 focus:ring-[#0b2b4e]"
                />
                <button 
                    type="submit" 
                    class="w-full sm:w-auto px-8 py-2.5 bg-[#0b2b4e] hover:bg-[#071d36] text-white font-medium text-sm rounded transition-colors shadow-xs cursor-pointer shrink-0"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>

    {{-- Main Footer Content Directory --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-12">
            
            {{-- Column 1: Brand & Socials (lg:col-span-4) --}}
            <div class="lg:col-span-4 space-y-4">
                <div>
                    <x-logo light class="h-10 w-auto" />
                </div>
                <p class="text-slate-300 text-xs sm:text-sm font-sans leading-relaxed max-w-sm pt-2">
                    Formerly known as TechNova Printrite Products Private Limited
                </p>

                {{-- Social Icons --}}
                <div class="flex items-center gap-5 pt-3 text-white">
                    {{-- LinkedIn --}}
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="hover:text-slate-300 transition-colors" aria-label="LinkedIn">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                    {{-- Instagram --}}
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="hover:text-slate-300 transition-colors" aria-label="Instagram">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    {{-- X (Twitter) --}}
                    <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="hover:text-slate-300 transition-colors" aria-label="X">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                    {{-- Facebook --}}
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="hover:text-slate-300 transition-colors" aria-label="Facebook">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                    </a>
                    {{-- YouTube --}}
                    <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="hover:text-slate-300 transition-colors" aria-label="YouTube">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Column 2: Company Links (lg:col-span-3) --}}
            <div class="lg:col-span-3">
                <h3 class="font-heading font-bold text-white text-base sm:text-lg mb-4">
                    Company
                </h3>
                <ul class="space-y-2.5 font-sans text-xs sm:text-sm text-slate-300">
                    <li><a href="#top" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Products</a></li>
                    <li><a href="#applications" class="hover:text-white transition-colors">Industries</a></li>
                    <li><a href="#news" class="hover:text-white transition-colors">Blog &amp; News</a></li>
                    <li><a href="#careers" class="hover:text-white transition-colors">Careers</a></li>
                    <li><a href="#contact" class="hover:text-white transition-colors">Contact</a></li>
                    <li><a href="#privacy" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#terms" class="hover:text-white transition-colors">Terms of use</a></li>
                </ul>
            </div>

            {{-- Column 3: Products Directory (lg:col-span-5) --}}
            <div class="lg:col-span-5">
                <h3 class="font-heading font-bold text-white text-base sm:text-lg mb-4">
                    <a href="{{ route('products') }}" class="hover:text-blue-300 transition-colors">Products</a>
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 font-sans">
                    {{-- Sub-column 1 --}}
                    <div class="space-y-3.5">
                        <div>
                            <a href="{{ route('products.show', 'non-tear-media') }}" class="font-semibold text-white text-xs underline decoration-slate-600 underline-offset-2 hover:text-blue-300 transition-colors">Non-Tear Media</a>
                            <p class="text-[11px] text-slate-400 mt-1">NovaJet | NovaLife | Saraprint</p>
                        </div>
                        <div>
                            <a href="{{ route('products.show', 'gloss-art-paper-media') }}" class="font-semibold text-white text-xs underline decoration-slate-600 underline-offset-2 hover:text-blue-300 transition-colors">Gloss Art Paper Media</a>
                            <p class="text-[11px] text-slate-400 mt-1">NovaLife</p>
                        </div>
                        <div>
                            <a href="{{ route('products.show', 'inkjet-photo-media') }}" class="font-semibold text-white text-xs underline decoration-slate-600 underline-offset-2 hover:text-blue-300 transition-colors">Inkjet Photo Media</a>
                            <p class="text-[11px] text-slate-400 mt-1">NovaJet</p>
                        </div>
                        <div>
                            <a href="{{ route('products.show', 'digital-labels') }}" class="font-semibold text-white text-xs underline decoration-slate-600 underline-offset-2 hover:text-blue-300 transition-colors">Digital Labels</a>
                            <p class="text-[11px] text-slate-400 mt-1">NovaStick</p>
                        </div>
                        <div>
                            <a href="{{ route('products.show', 'multi-purpose-labels') }}" class="font-semibold text-white text-xs underline decoration-slate-600 underline-offset-2 hover:text-blue-300 transition-colors">Multi-Purpose Labels</a>
                            <p class="text-[11px] text-slate-400 mt-1">NovaJet</p>
                        </div>
                    </div>

                    {{-- Sub-column 2 --}}
                    <div class="space-y-3.5">
                        <div>
                            <a href="{{ route('products.show', 'digital-wide-format-media') }}" class="font-semibold text-white text-xs underline decoration-slate-600 underline-offset-2 hover:text-blue-300 transition-colors">Digital Wide-Format Media</a>
                            <p class="text-[11px] text-slate-400 mt-1">NovaJet | NovaSign</p>
                        </div>
                        <div>
                            <a href="{{ route('products.show', 'reprographic-media') }}" class="font-semibold text-white text-xs underline decoration-slate-600 underline-offset-2 hover:text-blue-300 transition-colors">Reprographic Media</a>
                            <p class="text-[11px] text-slate-400 mt-1">NovaJet | NovaCad | Saraprint</p>
                        </div>
                        <div>
                            <a href="{{ route('products.show', 'polyester-offset-plates') }}" class="font-semibold text-white text-xs underline decoration-slate-600 underline-offset-2 hover:text-blue-300 transition-colors">Polyester Offset Plates</a>
                            <p class="text-[11px] text-slate-400 mt-1">NovaDom | PoliJet | Saraprint</p>
                        </div>
                        <div>
                            <a href="{{ route('products.show', 'laser-and-inkjet-positive-films') }}" class="font-semibold text-white text-xs underline decoration-slate-600 underline-offset-2 hover:text-blue-300 transition-colors">Laser &amp; Inkjet Positive Films</a>
                            <p class="text-[11px] text-slate-400 mt-1">PosiJet | NovaSharp</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Divider --}}
        <div class="border-t border-slate-700/60 pt-8 pb-6">
            {{-- Copyright Notice --}}
            <p class="text-center font-sans text-xs text-slate-300 mb-6">
                &copy; {{ date('Y') }} Polyplex DigiPrint. All rights reserved.
            </p>

            {{-- Legal Disclaimer Paragraph --}}
            <p class="text-center font-sans text-[11px] text-slate-400 leading-relaxed max-w-6xl mx-auto mb-4">
                The information, product descriptions, specifications and visuals presented on this website are provided for general informational purposes only. Product availability, features, specifications, packaging and appearance may vary by location and are subject to change without prior notice. While every effort is made to ensure that the information on this website is accurate and up to date, inadvertent errors or omissions may occur. Polyplex DigiPrint Private Limited reserves the right to correct such errors and revise or update the information at any time. Product colours, finishes and overall appearance may vary from their on-screen representation due to differences in displays, lighting, materials and production processes. Customers are advised to review physical samples and confirm technical suitability before placing an order or using a product for a specific application. All product names, logos, brands and trademarks displayed on this website are the property of Polyplex DigiPrint Private Limited or their respective owners. The use of third-party trademarks does not imply any affiliation, endorsement or sponsorship unless expressly stated. Links to third-party websites are provided for convenience only. Polyplex DigiPrint Private Limited does not control and is not responsible for the content, availability, security or privacy practices of such websites. Product selection and use remain the responsibility of the customer. Please consult the relevant product documentation or contact our team for current specifications, compatibility information and technical guidance.
            </p>

            <p class="text-center font-sans text-[11px] text-slate-400 pb-4">
                Use of this website is subject to our *Terms of Use* and *Privacy Policy*.
            </p>
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

