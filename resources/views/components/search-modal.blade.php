{{-- Search Modal Dialog --}}
<div id="search-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity duration-200" role="dialog" aria-modal="true" aria-labelledby="search-modal-title">
    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden border border-slate-100 transform transition-all duration-200">
        {{-- Search Header --}}
        <div class="p-4 sm:p-5 border-b border-slate-100 flex items-center gap-3">
            <svg class="w-5 h-5 text-slate-400 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input 
                id="search-input" 
                type="text" 
                placeholder="Search products (e.g. Non-Tear Media, Digital Labels)..." 
                class="w-full text-base sm:text-lg bg-transparent text-slate-900 placeholder:text-slate-400 focus:outline-none"
            >
            <button id="close-search-btn" type="button" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg hover:bg-slate-100 transition-colors" aria-label="Close search">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Quick Links / Suggestions --}}
        <div class="p-4 sm:p-5 bg-slate-50/50">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-3">Popular Searches</p>
            <div class="flex flex-wrap gap-2">
                @foreach (['Non-Tear Media', 'Gloss Art Paper', 'Digital Labels', 'Polyester Offset Plate', 'Wide-Format Media'] as $tag)
                    <a href="#products" class="inline-flex items-center text-xs font-medium bg-white text-slate-700 px-3 py-1.5 rounded-full border border-slate-200 hover:border-blue-500 hover:text-blue-600 transition-colors">
                        {{ $tag }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

