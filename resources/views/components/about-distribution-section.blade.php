{{-- Geographic Distribution Section --}}
<section id="about-distribution-section" class="w-full bg-white pt-[82px] pb-[36px] sm:pt-20 lg:pt-[82px]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Header: Section Title (Left) & World/India Toggle (Right) --}}
        <div class="mb-[35px] flex flex-col gap-6 sm:mb-[35px] sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-heading text-[32px] font-[600] text-[#1E1E1E] sm:text-3xl lg:text-[32px]">
                Our Geographic Distribution
            </h2>

            {{-- Toggle Button Group --}}
            <div class="inline-flex items-center gap-3" role="tablist" aria-label="Geographic distribution view">
                <button type="button" id="geo-toggle-world"
                    class="geo-toggle-btn rounded-md bg-[#0e4175] px-7 py-2.5 font-sans text-sm font-medium text-white shadow-xs transition-all duration-200"
                    data-target="world" role="tab" aria-selected="true">
                    World
                </button>
                <button type="button" id="geo-toggle-india"
                    class="geo-toggle-btn rounded-md border border-slate-300 bg-white px-7 py-2.5 font-sans text-sm font-medium text-slate-800 transition-all duration-200 "
                    data-target="india" role="tab" aria-selected="false">
                    India
                </button>
            </div>
        </div>

        {{-- Map Stage Container --}}
        <div
            class="relative flex max-h-[593px] w-full items-center justify-center overflow-hidden sm:min-h-[500px] lg:max-h-[593px]">
            {{-- World View --}}
            <div id="geo-view-world" class="geo-view relative w-full transition-opacity duration-300">
                <img src="{{ asset('images/about-distribution-world.png') }}"
                    alt="Rooted Locally. Respected Globally. Global footprint spanning over 60 countries. India: Our Manufacturing Hub."
                    class="pointer-events-none block h-auto max-h-[540px] w-full  select-none object-contain"
                    loading="lazy" />
            </div>

            {{-- India View --}}
            <div id="geo-view-india"
                class="geo-view relative hidden w-full items-center justify-center transition-opacity duration-300">
                <img src="{{ asset('images/about-distribution-india.png') }}"
                    alt="National Scale. Regional Strength. India: Our Manufacturing Hub. We're present across India, with more than 700 regional partners."
                    class="pointer-events-none block h-auto max-h-[540px] w-full  select-none object-contain"
                    loading="lazy" />
            </div>
        </div>
    </div>
</section>