<x-layouts.app :title="'Privacy Policy | Polyplex DigiPrint - Synthetic Paper & Specialty Print Media'">
    {{-- First Section: Atmospheric Hero Header --}}
    <x-privacy-hero-section />

    {{-- Second Section: Full Privacy Policy Content (Sections 1 through 12) --}}
    <x-privacy-content-section />

    {{-- Third Section: Call to Action (Let's Build the Future Together) --}}
    <x-cta-section button-url="{{ route('contact') }}" />
</x-layouts.app>
