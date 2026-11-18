<x-layouts.app :title="'Terms of Use | Polyplex DigiPrint - Synthetic Paper & Specialty Print Media'">
    {{-- First Section: Atmospheric Hero Header --}}
    <x-terms-hero-section />

    {{-- Second Section: Full Terms of Use Content (Sections 1 through 14) --}}
    <x-terms-content-section />

    {{-- Third Section: Call to Action (Let's Build the Future Together) --}}
    <x-cta-section button-url="{{ route('contact') }}" />
</x-layouts.app>
