{{--
Product / Brand Statement Banner
Displays an atmospheric full-width banner with Polyplex signature red-to-blue glow gradient
and a bold, high-contrast narrative statement.

Customization:
<x-product-statement-banner :statement="$statement" />
--}}
@props([
    'statement' => 'NovaJet includes durable film media designed to provide tear resistance and support demanding photographic and general commercial printing applications.',
])

<section class="relative w-full py-10 sm:py-12 md:py-14 overflow-hidden select-none"
    style="background: radial-gradient(ellipse 55% 140% at 0% 50%, rgba(135, 10, 25, 0.85) 0%, rgba(4, 7, 16, 0) 70%),
               radial-gradient(ellipse 55% 140% at 100% 50%, rgba(14, 65, 116, 0.85) 0%, rgba(4, 7, 16, 0) 70%),
               #040710;"
    aria-label="Brand Overview Statement">

    {{-- Subtle Ambient Glow Blurs --}}
    <div class="absolute -top-12 -left-12 w-64 h-64 bg-red-600/20 rounded-full blur-2xl pointer-events-none"
        aria-hidden="true"></div>
    <div class="absolute -bottom-12 -right-12 w-64 h-64 bg-blue-600/25 rounded-full blur-2xl pointer-events-none"
        aria-hidden="true"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl">
            <p class="font-heading font-semibold text-white text-[17px] sm:text-[19px] md:text-[21px] lg:text-[22px] leading-snug sm:leading-[1.4] tracking-tight drop-shadow-[0_2px_8px_rgba(0,0,0,0.6)]">
                {{ $statement }}
            </p>
        </div>
    </div>
</section>
