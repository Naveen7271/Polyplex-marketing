{{--
Contact Page Hero Section
Displays the signature dark atmospheric hero section with Polyplex crimson-to-blue glow gradient,
support category eyebrow, bold headline, narrative copy, and transparent underline contact form.

Customization:
<x-contact-hero-section
    eyebrow="POLYPLEX DIGIPRINT SUPPORT"
    headline="We're Here to Help"
    description="From offering expert advice to solving complex problems, we've got you covered."
/>
--}}
@props([
    'eyebrow' => 'POLYPLEX DIGIPRINT SUPPORT',
    'headline' => "We're Here to Help",
    'description' => "From offering expert advice to solving complex problems, we've got you covered.",
    'action' => null,
])

<section id="contact-hero"
    class="relative w-full py-16 sm:py-20 md:py-24 lg:py-28 overflow-hidden select-none"
    style="background:
        radial-gradient(ellipse 55% 100% at 0% 90%, rgba(139, 0, 0, 0.75) 0%, rgba(100, 0, 0, 0.45) 40%, rgba(3, 7, 18, 0) 75%),
        radial-gradient(ellipse 55% 100% at 100% 10%, rgba(14, 65, 116, 0.85) 0%, rgba(10, 48, 86, 0.5) 40%, rgba(3, 7, 18, 0) 75%),
        #030712;"
    aria-label="{{ $headline }}">

    {{-- Left Crimson Ambient Blur --}}
    <div class="absolute -left-24 bottom-0 w-[480px] h-[480px] bg-red-700/25 rounded-full blur-[110px] pointer-events-none"
        aria-hidden="true"></div>

    {{-- Right Navy Ambient Blur --}}
    <div class="absolute -right-24 top-0 w-[520px] h-[520px] bg-[#0E4174]/35 rounded-full blur-[110px] pointer-events-none"
        aria-hidden="true"></div>

    {{-- Subtle Vignette / Edge Shading --}}
    <div class="absolute inset-0 bg-gradient-to-b from-black/25 via-transparent to-black/35 pointer-events-none"
        aria-hidden="true"></div>

    {{-- Content Container --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

            {{-- Left Column: Category Eyebrow, Main Headline & Narrative Copy --}}
            <div class="lg:col-span-5 max-w-xl">
                {{-- Category Eyebrow --}}
                <span class="block text-slate-300 text-xs sm:text-[13px] font-medium tracking-[0.2em] uppercase font-sans">
                    {{ $eyebrow }}
                </span>

                {{-- Main Headline --}}
                <h1 class="mt-4 sm:mt-5 font-heading text-white font-bold text-3xl sm:text-4xl lg:text-[44px] tracking-tight leading-[1.15]">
                    {{ $headline }}
                </h1>

                {{-- Narrative Copy --}}
                @if (!empty($description))
                    <p class="mt-6 sm:mt-8 text-slate-300 font-sans text-sm sm:text-base leading-relaxed max-w-md font-light">
                        {{ $description }}
                    </p>
                @endif
            </div>

            {{-- Right Column: Embedded Underline Contact Form --}}
            <div class="lg:col-span-7 w-full">
                {{-- Flash Success Message --}}
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-sm bg-emerald-950/70 border border-emerald-500/50 text-emerald-200 text-sm flex items-center justify-between shadow-lg" role="alert">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                {{-- Validation Errors Summary --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-sm bg-red-950/70 border border-red-500/50 text-red-200 text-xs sm:text-sm shadow-lg" role="alert">
                        <p class="font-medium mb-1">Please fix the following errors:</p>
                        <ul class="list-disc list-inside space-y-0.5 text-red-300">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $action ?? (Route::has('contact.submit') ? route('contact.submit') : '#') }}"
                    method="POST"
                    class="space-y-6 sm:space-y-8"
                    id="contact-support-form">
                    @csrf

                    {{-- Top Row: Full Name, Email Address, Phone Number --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-6 lg:gap-8">

                        {{-- Field 1: Full Name --}}
                        <div class="space-y-2">
                            <label for="contact-name" class="block text-white text-sm font-medium font-sans">
                                Full Name
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="contact-name"
                                value="{{ old('name') }}"
                                placeholder="Your Name"
                                required
                                class="w-full bg-transparent border-0 border-b border-slate-500/70 text-white placeholder-slate-400 text-sm sm:text-base pb-2 pt-1 px-0 focus:outline-none focus:border-white focus:ring-0 transition-colors"
                            />
                            @error('name')
                                <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Field 2: Email Address --}}
                        <div class="space-y-2">
                            <label for="contact-email" class="block text-white text-sm font-medium font-sans">
                                Email Address
                            </label>
                            <input
                                type="email"
                                name="email"
                                id="contact-email"
                                value="{{ old('email') }}"
                                placeholder="Email Address"
                                required
                                class="w-full bg-transparent border-0 border-b border-slate-500/70 text-white placeholder-slate-400 text-sm sm:text-base pb-2 pt-1 px-0 focus:outline-none focus:border-white focus:ring-0 transition-colors"
                            />
                            @error('email')
                                <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Field 3: Phone Number --}}
                        <div class="space-y-2">
                            <label for="contact-phone" class="block text-white text-sm font-medium font-sans">
                                Phone Number
                            </label>
                            <input
                                type="tel"
                                name="phone"
                                id="contact-phone"
                                value="{{ old('phone') }}"
                                placeholder="Phone Number"
                                class="w-full bg-transparent border-0 border-b border-slate-500/70 text-white placeholder-slate-400 text-sm sm:text-base pb-2 pt-1 px-0 focus:outline-none focus:border-white focus:ring-0 transition-colors"
                            />
                            @error('phone')
                                <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- Middle Row: Message (Spanning full form width) --}}
                    <div class="space-y-2 pt-2 sm:pt-4">
                        <label for="contact-message" class="block text-white text-sm font-medium font-sans">
                            Message
                        </label>
                        <textarea
                            name="message"
                            id="contact-message"
                            rows="2"
                            placeholder="Type your message here"
                            required
                            class="w-full bg-transparent border-0 border-b border-slate-500/70 text-white placeholder-slate-400 text-sm sm:text-base pb-2 pt-1 px-0 focus:outline-none focus:border-white focus:ring-0 resize-none transition-colors"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Bottom Row: Submit Button --}}
                    <div class="pt-4 sm:pt-6">
                        <button
                            type="submit"
                            id="contact-submit-btn"
                            class="inline-flex items-center justify-center bg-white hover:bg-slate-100 text-slate-900 font-medium sm:font-semibold text-sm px-10 sm:px-14 py-3 sm:py-3.5 transition-all duration-200 shadow-sm cursor-pointer rounded-none sm:rounded-[2px] focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-950">
                            Submit
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>

