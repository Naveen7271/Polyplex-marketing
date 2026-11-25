<x-admin.layout :page-title="'Edit Brand: ' . $brand->name" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Brands' => route('admin.brands.index'), $brand->name => '#']">

    <div class="max-w-4xl space-y-8">

        {{-- Brand Edit Form --}}
        <div>
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Edit Brand</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Manage brand profile and dedicated page content for <span class="font-semibold text-[#0E4174]">{{ $brand->name }}</span></p>
                </div>
                <div class="flex items-center gap-3">
                    @if($brand->logo)
                        <div class="w-16 h-10 bg-white border border-gray-200 rounded p-1 flex items-center justify-center shadow-xs">
                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" class="max-h-full max-w-full object-contain" />
                        </div>
                    @endif
                    <a href="{{ url('/' . $brand->slug) }}" target="_blank"
                       class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 text-[#0E4174] hover:bg-blue-100 rounded-lg text-xs font-semibold transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        View Brand Page
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.brands.update', $brand) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Card 1: Brand Profile Information --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-5">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-700">1. Brand Profile &amp; Identity</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Brand Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name', $brand->name) }}" required
                                   class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition {{ $errors->has('name') ? 'border-red-400' : 'border-gray-300' }}" />
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">Slug</label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug', $brand->slug) }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                            @error('slug') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1.5">Subtitle / Tagline</label>
                            <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $brand->subtitle) }}" placeholder="e.g. Premium Non-tear Media"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                        </div>

                        {{-- Logo Upload with Preview --}}
                        <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-3">
                            <label class="block text-sm font-medium text-gray-800">Brand Logo Image</label>

                            @if(!empty($brand->logo))
                                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg gap-3">
                                    <div class="flex items-center gap-4 truncate">
                                        <div class="w-20 h-14 bg-gray-50 border border-gray-200 rounded flex items-center justify-center p-1.5 shrink-0">
                                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" class="max-h-full max-w-full object-contain" />
                                        </div>
                                        <div class="text-xs truncate flex-1">
                                            <span class="inline-block px-2 py-0.5 bg-blue-50 text-[#0E4174] font-semibold rounded mb-1">Current Logo</span>
                                            <p class="font-mono text-gray-500 truncate text-[11px]">{{ $brand->logo }}</p>
                                        </div>
                                    </div>
                                    <label class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 rounded-lg border border-red-200 cursor-pointer transition-colors shrink-0">
                                        <input type="checkbox" name="remove_logo" value="1" class="rounded text-red-600 focus:ring-red-500">
                                        <span>Remove Logo</span>
                                    </label>
                                </div>
                            @endif

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <label for="logo_file" class="block text-xs font-medium text-gray-700">
                                        {{ !empty($brand->logo) ? 'Upload New Logo to Replace:' : 'Upload Logo from Device:' }}
                                    </label>
                                    <button type="button" onclick="document.getElementById('logo_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                                </div>
                                <input type="file" id="logo_file" name="logo_file" accept="image/*"
                                       class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                                <p class="text-[11px] text-gray-500 mt-1">Supports PNG, JPG, WEBP, SVG up to 10MB.</p>
                            </div>

                            <div class="pt-1">
                                <label for="logo" class="block text-xs text-gray-500 mb-1">Or direct logo path:</label>
                                <input type="text" id="logo" name="logo" value="{{ old('logo', $brand->logo) }}" placeholder="images/brands/logos/novalife.png"
                                       class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="url" class="block text-sm font-medium text-gray-700 mb-1.5">Target Link / URL</label>
                            <input type="text" id="url" name="url" value="{{ old('url', $brand->url) }}" placeholder="/{{ $brand->slug }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                            <p class="mt-1 text-xs text-gray-500">Destination link for this brand (defaults to <code>/{{ $brand->slug }}</code>).</p>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="alt" class="block text-sm font-medium text-gray-700 mb-1.5">Logo Alt Text</label>
                            <input type="text" id="alt" name="alt" value="{{ old('alt', $brand->alt) }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                        </div>
                    </div>
                </div>

                {{-- Card 2: Dedicated Brand Page Content (Hero & Narrative) --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-5">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-[#0E4174]">2. Brand Page Content (Hero &amp; Narrative)</h3>
                    <p class="text-xs text-gray-500">Customize the content shown when visitors view this brand's dedicated page (e.g. <code>/{{ $brand->slug }}</code>).</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        {{-- Hero Banner Upload with Preview --}}
                        <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-3">
                            <label class="block text-sm font-medium text-gray-800">Page Hero Banner Image</label>

                            @if(!empty($brand->banner))
                                <div class="rounded-lg overflow-hidden border border-gray-200 bg-white relative">
                                    <img src="{{ asset($brand->banner) }}" alt="Hero banner for {{ $brand->name }}" class="w-full h-32 object-cover" />
                                    <div class="p-2.5 bg-white/95 border-t border-gray-200 text-xs flex items-center justify-between gap-3">
                                        <div class="flex items-center gap-2 truncate">
                                            <span class="inline-block px-2 py-0.5 bg-blue-50 text-[#0E4174] font-semibold rounded text-[11px]">Current Banner</span>
                                            <span class="font-mono text-gray-500 text-[11px] truncate max-w-sm">{{ $brand->banner }}</span>
                                        </div>
                                        <label class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 rounded-lg border border-red-200 cursor-pointer transition-colors shrink-0">
                                            <input type="checkbox" name="remove_banner" value="1" class="rounded text-red-600 focus:ring-red-500">
                                            <span>Remove Banner</span>
                                        </label>
                                    </div>
                                </div>
                            @endif

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <label for="banner_file" class="block text-xs font-medium text-gray-700">
                                        {{ !empty($brand->banner) ? 'Upload New Banner to Replace:' : 'Upload Banner from Device:' }}
                                    </label>
                                    <button type="button" onclick="document.getElementById('banner_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                                </div>
                                <input type="file" id="banner_file" name="banner_file" accept="image/*"
                                       class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                                <p class="text-[11px] text-gray-500 mt-1">Supports PNG, JPG, WEBP up to 10MB.</p>
                            </div>

                            <div class="pt-1">
                                <label for="banner" class="block text-xs text-gray-500 mb-1">Or banner image path:</label>
                                <input type="text" id="banner" name="banner" value="{{ old('banner', $brand->banner) }}" placeholder="images/products/banner-non-tear.jpg"
                                       class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                            </div>
                        </div>

                        {{-- Brochure Upload with Link --}}
                        <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-3">
                            <label class="block text-sm font-medium text-gray-800">Brochure Document File</label>

                            @if(!empty($brand->brochure_url))
                                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg gap-3">
                                    <div class="flex items-center gap-3 truncate flex-1">
                                        <svg class="w-6 h-6 text-red-500 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        <div class="text-xs truncate">
                                            <span class="inline-block px-2 py-0.5 bg-blue-50 text-[#0E4174] font-semibold rounded mb-1">Current Brochure File</span>
                                            <a href="{{ asset($brand->brochure_url) }}" target="_blank" class="font-mono text-blue-600 hover:underline block truncate text-[11px]">
                                                {{ $brand->brochure_url }} &rarr;
                                            </a>
                                        </div>
                                    </div>
                                    <label class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 rounded-lg border border-red-200 cursor-pointer transition-colors shrink-0">
                                        <input type="checkbox" name="remove_brochure" value="1" class="rounded text-red-600 focus:ring-red-500">
                                        <span>Remove Brochure</span>
                                    </label>
                                </div>
                            @endif

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <label for="brochure_file" class="block text-xs font-medium text-gray-700">
                                        {{ !empty($brand->brochure_url) ? 'Upload New Brochure File to Replace:' : 'Upload Brochure File:' }}
                                    </label>
                                    <button type="button" onclick="document.getElementById('brochure_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                                </div>
                                <input type="file" id="brochure_file" name="brochure_file" accept=".pdf,.doc,.docx,.zip"
                                       class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                                <p class="text-[11px] text-gray-500 mt-1">Supports PDF, DOC, DOCX up to 20MB.</p>
                            </div>

                            <div class="pt-1">
                                <label for="brochure_url" class="block text-xs text-gray-500 mb-1">Or external brochure link:</label>
                                <input type="text" id="brochure_url" name="brochure_url" value="{{ old('brochure_url', $brand->brochure_url) }}" placeholder="#download-brochure"
                                       class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="badge_description" class="block text-sm font-medium text-gray-700 mb-1.5">Badge Summary Description</label>
                            <textarea id="badge_description" name="badge_description" rows="2" placeholder="Brief summary under the badge logo on hero banner…"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition resize-none">{{ old('badge_description', $brand->badge_description) }}</textarea>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="paragraphs" class="block text-sm font-medium text-gray-700 mb-1.5">Narrative Paragraphs (separate with double Enter)</label>
                            <textarea id="paragraphs" name="paragraphs" rows="3" placeholder="Detailed brand overview paragraphs…"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition resize-none">{{ old('paragraphs', $brand->paragraphs) }}</textarea>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="statement" class="block text-sm font-medium text-gray-700 mb-1.5">Callout Statement Banner Text</label>
                            <input type="text" id="statement" name="statement" value="{{ old('statement', $brand->statement) }}" placeholder="e.g. NovaLife synthetic paper blends the high visual reproduction..."
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="compatibility_headline" class="block text-sm font-medium text-gray-700 mb-1.5">Compatibility Section Headline</label>
                            <input type="text" id="compatibility_headline" name="compatibility_headline" value="{{ old('compatibility_headline', $brand->compatibility_headline) }}" placeholder="e.g. NovaJet supports multiple digital printing technologies, providing flexibility across different production environments."
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                            <p class="text-xs text-gray-500 mt-1">Introductory headline displayed above the compatibility technology cards on the public brand page.</p>
                        </div>
                    </div>
                </div>

                {{-- Card 3: Products Association --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-4">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-700">3. Featured Under Products</h3>
                    <p class="text-xs text-gray-500">Select which products should display {{ $brand->name }} in their "Explore our Brands" section:</p>

                    @php
                        $attachedProductIds = $brand->products->pluck('id')->toArray();
                    @endphp
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        @foreach($products as $p)
                            <label class="flex items-center gap-2.5 p-2.5 border rounded-lg hover:bg-blue-50/50 cursor-pointer text-xs transition-colors {{ in_array($p->id, $attachedProductIds) ? 'border-blue-400 bg-blue-50/40 font-semibold text-[#0E4174]' : 'border-gray-200 text-gray-800' }}">
                                <input type="checkbox" name="product_ids[]" value="{{ $p->id }}"
                                       {{ in_array($p->id, $attachedProductIds) ? 'checked' : '' }}
                                       class="rounded text-[#0E4174] focus:ring-[#0E4174]" />
                                <span>{{ $p->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#0E4174] hover:bg-[#0b3360] text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Brand Settings
                    </button>
                    <a href="{{ route('admin.brands.index') }}"
                       class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
                        Back to Brands
                    </a>
                </div>
            </form>
        </div>

        {{-- SECTION 4: Brand Features (Dynamic FEATURES for NovaJet, NovaLife, etc.) --}}
        <div class="pt-4 border-t border-gray-200">
            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                    <h3 class="text-lg font-bold text-gray-900">Brand Features (FEATURES Section)</h3>
                </div>
                <p class="text-sm text-gray-500 mt-0.5">Features displayed in the "FEATURES" grid on the {{ $brand->name }} page. You can add common preset features from the dropdown or create brand-specific custom features.</p>
            </div>

            {{-- Quick Add Feature via Dropdown --}}
            <div class="bg-gradient-to-r from-emerald-50/80 to-teal-50/80 border border-emerald-200 rounded-xl p-5 mb-5 shadow-sm">
                <h4 class="text-xs font-semibold uppercase tracking-wider text-emerald-900 mb-2 flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Feature Using Dropdown
                </h4>

                <form action="{{ route('admin.brands.features.store', $brand) }}" method="POST" id="feature-form">
                    @csrf
                    <div class="flex flex-col sm:row gap-2.5 items-stretch sm:items-center">
                        <select name="preset_key" id="feature-preset-selector" required onchange="handleFeaturePresetChange(this.value)"
                                class="flex-1 px-4 py-2.5 bg-white border border-emerald-300 rounded-lg text-sm text-gray-800 font-medium focus:outline-none focus:ring-2 focus:ring-emerald-600">
                            <option value="">-- Select a Common Feature to Add from Dropdown --</option>
                            <optgroup label="Common / Standard Features">
                                @foreach($presetFeatures as $key => $preset)
                                    <option value="{{ $key }}">{{ $preset['title'] }} — ({{ Str::limit($preset['description'], 50) }})</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Custom">
                                <option value="custom">✏️ + Custom Feature (Enter title & description)</option>
                            </optgroup>
                        </select>

                        <button type="submit"
                                class="inline-flex items-center justify-center gap-1.5 px-6 py-2.5 bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Feature
                        </button>
                    </div>

                    {{-- Custom Feature Inputs (Hidden until 'custom' chosen) --}}
                    <div id="custom-feature-fields" class="hidden mt-4 pt-4 border-t border-emerald-200 space-y-3">
                        <p class="text-xs font-semibold text-emerald-900">Custom Feature Details:</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div class="sm:col-span-2">
                                <label class="block text-xs text-gray-600 mb-1">Feature Title <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="custom-feature-title" placeholder="e.g. Unmatched Tear Resistance"
                                       class="w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-emerald-600" />
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-xs text-gray-600 mb-1">Description</label>
                                <textarea name="description" id="custom-feature-desc" rows="2" placeholder="Feature description for this brand…"
                                          class="w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-emerald-600 resize-none"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Features Table --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-5 py-3.5 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-600">Attached Features ({{ $brand->features->count() }})</h4>
                </div>

                @if($brand->features->isEmpty())
                    <div class="text-center py-10">
                        <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-400 text-sm">No features currently added for {{ $brand->name }}. Use the dropdown above to add features.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-gray-50/70 border-b border-gray-200">
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="text-right px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($brand->features as $feature)
                                <tr class="hover:bg-gray-50/60 transition-colors">
                                    <td class="px-5 py-3.5 text-gray-400 text-xs">{{ $loop->iteration }}</td>
                                    <td class="px-5 py-3.5 font-semibold text-gray-900 whitespace-nowrap">{{ $feature->title }}</td>
                                    <td class="px-5 py-3.5 text-gray-600 text-xs">
                                        {{ $feature->description }}
                                    </td>
                                    <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                        <form action="{{ route('admin.brands.features.destroy', [$brand, $feature]) }}" method="POST"
                                              onsubmit="return confirm('Remove feature &quot;{{ addslashes($feature->title) }}&quot;?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded transition-colors cursor-pointer">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        {{-- SECTION 5: Brand Compatibility (Dynamic COMPATIBILITY for NovaJet, NovaDom, etc.) --}}
        <div class="pt-6 border-t border-gray-200">
            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                    <h3 class="text-lg font-bold text-gray-900">Brand Compatibility (COMPATIBILITY Section)</h3>
                </div>
                <p class="text-sm text-gray-500 mt-0.5">Printing technologies compatible with {{ $brand->name }} (e.g. HP Indigo, Dry Toner, Inkjet, Laser Imaging, Offset Printing). You can add common presets from the dropdown or add custom technologies with image uploads.</p>
            </div>

            {{-- Quick Add Compatibility via Dropdown or Custom --}}
            <div class="bg-gradient-to-r from-blue-50/80 to-indigo-50/80 border border-blue-200 rounded-xl p-5 mb-5 shadow-sm">
                <h4 class="text-xs font-semibold uppercase tracking-wider text-blue-900 mb-2 flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Compatibility Technology
                </h4>

                <form action="{{ route('admin.brands.compatibilities.store', $brand) }}" method="POST" enctype="multipart/form-data" id="compatibility-form">
                    @csrf
                    <div class="flex flex-col sm:flex-row gap-2.5 items-stretch sm:items-center">
                        <select name="preset_key" id="compatibility-preset-selector" required onchange="handleCompatibilityPresetChange(this.value)"
                                class="flex-1 px-4 py-2.5 bg-white border border-blue-300 rounded-lg text-sm text-gray-800 font-medium focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <option value="">-- Select a Common Compatibility from Dropdown --</option>
                            <optgroup label="Standard Printing Technologies">
                                @foreach($presetCompatibilities as $key => $preset)
                                    <option value="{{ $key }}">{{ $preset['title'] }} — ({{ Str::limit($preset['description'], 50) }})</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Custom">
                                <option value="custom">✏️ + Custom Printing Technology (Upload image & enter details)</option>
                            </optgroup>
                        </select>

                        <button type="submit"
                                class="inline-flex items-center justify-center gap-1.5 px-6 py-2.5 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Technology
                        </button>
                    </div>

                    {{-- Custom Compatibility Inputs (Hidden until 'custom' chosen) --}}
                    <div id="custom-compatibility-fields" class="hidden mt-4 pt-4 border-t border-blue-200 space-y-3">
                        <p class="text-xs font-semibold text-blue-900">Custom Technology Details:</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div class="sm:col-span-2">
                                <label class="block text-xs text-gray-600 mb-1">Technology Title <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="custom-compatibility-title" placeholder="e.g. UV-Curable Inkjet"
                                       class="w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-600" />
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-xs text-gray-600 mb-1">Description</label>
                                <textarea name="description" id="custom-compatibility-desc" rows="2" placeholder="Compatibility details for this technology…"
                                          class="w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-blue-600 resize-none"></textarea>
                            </div>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">Upload Card Image</label>
                                <input type="file" name="image_file" accept="image/*"
                                       class="w-full text-xs text-gray-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer border border-gray-300 rounded p-1 bg-white" />
                                <p class="text-[11px] text-gray-500 mt-0.5">Supports PNG, JPG, WEBP.</p>
                            </div>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">Or Direct Image Path</label>
                                <input type="text" name="image" placeholder="images/products/technologies/uv-curable.png"
                                       class="w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-xs font-mono focus:outline-none focus:ring-1 focus:ring-blue-600" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Compatibilities Table --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
                <div class="px-5 py-3.5 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-600">Attached Printing Technologies ({{ $brand->compatibilities->count() }})</h4>
                </div>

                @if($brand->compatibilities->isEmpty())
                    <div class="text-center py-10">
                        <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <p class="text-gray-400 text-sm">No compatibility technologies currently attached for {{ $brand->name }}. Use the dropdown above to add compatibility technologies (e.g. HP Indigo, Dry Toner, Inkjet).</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-gray-50/70 border-b border-gray-200">
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Image</th>
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Technology</th>
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="text-right px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($brand->compatibilities as $compatibility)
                                <tr class="hover:bg-gray-50/60 transition-colors">
                                    <td class="px-5 py-3.5 text-gray-400 text-xs">{{ $loop->iteration }}</td>
                                    <td class="px-5 py-3.5 whitespace-nowrap">
                                        @if(!empty($compatibility->image))
                                            <img src="{{ (str_starts_with($compatibility->image, 'http://') || str_starts_with($compatibility->image, 'https://')) ? $compatibility->image : asset($compatibility->image) }}"
                                                 alt="{{ $compatibility->title }}"
                                                 class="w-12 h-10 object-cover rounded-md border border-gray-200 bg-gray-50 shadow-xs" />
                                        @else
                                            <span class="w-12 h-10 flex items-center justify-center bg-gray-100 rounded-md text-[10px] text-gray-400 border border-gray-200">No img</span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-3.5 font-semibold text-gray-900 whitespace-nowrap">{{ $compatibility->title }}</td>
                                    <td class="px-5 py-3.5 text-gray-600 text-xs max-w-md">
                                        {{ $compatibility->description }}
                                    </td>
                                    <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                        <form action="{{ route('admin.brands.compatibilities.destroy', [$brand, $compatibility]) }}" method="POST"
                                              onsubmit="return confirm('Remove compatibility &quot;{{ addslashes($compatibility->title) }}&quot;?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded transition-colors cursor-pointer">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <script>
        function handleFeaturePresetChange(val) {
            const customBox = document.getElementById('custom-feature-fields');
            const customTitle = document.getElementById('custom-feature-title');
            if (val === 'custom') {
                customBox.classList.remove('hidden');
                customTitle.setAttribute('required', 'required');
                customTitle.focus();
            } else {
                customBox.classList.add('hidden');
                customTitle.removeAttribute('required');
            }
        }

        function handleCompatibilityPresetChange(val) {
            const customBox = document.getElementById('custom-compatibility-fields');
            const customTitle = document.getElementById('custom-compatibility-title');
            if (val === 'custom') {
                customBox.classList.remove('hidden');
                customTitle.setAttribute('required', 'required');
                customTitle.focus();
            } else {
                customBox.classList.add('hidden');
                customTitle.removeAttribute('required');
            }
        }
    </script>

</x-admin.layout>
