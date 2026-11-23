<x-layouts.app :title="'Blog & News | Polyplex DigiPrint - Synthetic Paper & Specialty Print Media'">
    {{-- Unified Blog & News Hero Section with Category Filter Tabs (Blogs, News & Events, Newsletter) --}}
    <x-blog-hero-section />

    {{-- Blogs View: "MORE TO EXPLORE" 2x2 Curated Grid with Pagination --}}
    <div id="blog-explore-container" class="block transition-opacity duration-300">
        <x-blog-explore-section />
    </div>

    {{-- News & Events View: "Explore News About People and Technology" 3x2 Grid with Pagination --}}
    <div id="news-explore-container" class="hidden transition-opacity duration-300">
        <x-news-section />
    </div>

    {{-- Call to Action: Let's Build the Future Together --}}
    <x-cta-section />
</x-layouts.app>
