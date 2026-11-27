<x-admin.layout :page-title="'Edit: ' . $product->name" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Products' => route('admin.products.index'), $product->name => '#']">

    <div class="max-w-5xl space-y-8">

        {{-- 1. HERO & CORE PRODUCT DETAILS --}}
        <div>
            <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">1. Hero &amp; Core Product Details</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Update the top hero banner, title, description, brochure, and visibility</p>
                </div>
                <a href="{{ route('products.show', $product->slug) }}" target="_blank"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 text-[#0E4174] hover:bg-blue-100 rounded-lg text-xs font-semibold transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    View on Website
                </a>
            </div>

            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="sm:col-span-2 min-w-0">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Product Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                                   class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition {{ $errors->has('name') ? 'border-red-400' : 'border-gray-300' }}" />
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="min-w-0">
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">Slug</label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug', $product->slug) }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                            @error('slug') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="min-w-0">
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Category <span class="text-xs text-gray-400 font-normal">(Optional — defaults to Product Name)</span>
                            </label>
                            <input type="text" id="category" name="category" value="{{ old('category', $product->category) }}" placeholder="Leave blank to use Product Name" list="category_list"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                            <datalist id="category_list">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}"></option>
                                @endforeach
                            </datalist>
                        </div>

                        <div class="sm:col-span-2 min-w-0">
                            <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1.5">Short Description / Subtitle</label>
                            <input type="text" id="short_description" name="short_description" value="{{ old('short_description', $product->short_description) }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                        </div>

                        <div class="sm:col-span-2 min-w-0">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Full Description</label>
                            <textarea id="description" name="description" rows="3"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition resize-none">{{ old('description', $product->description) }}</textarea>
                        </div>

                        {{-- Banner Image Upload & Preview --}}
                        <div class="sm:col-span-2 min-w-0 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-3">
                            <label class="block text-sm font-medium text-gray-800">Banner Image</label>

                            @if(!empty($product->banner_image))
                                <div class="rounded-lg overflow-hidden border border-gray-200 bg-white">
                                    <img src="{{ asset($product->banner_image) }}" alt="Banner for {{ $product->name }}" class="w-full h-32 object-cover" />
                                    <div class="p-2.5 bg-white/95 border-t border-gray-200 text-xs flex flex-wrap items-center justify-between gap-3">
                                        <div class="flex items-center gap-2 min-w-0 flex-1">
                                            <span class="inline-block px-2 py-0.5 bg-blue-50 text-[#0E4174] font-semibold rounded text-[11px] shrink-0">Current Banner</span>
                                            <span class="font-mono text-gray-500 text-[11px] truncate">{{ $product->banner_image }}</span>
                                        </div>
                                        <label class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 rounded-lg border border-red-200 cursor-pointer transition-colors shrink-0">
                                            <input type="checkbox" name="remove_banner_image" value="1" class="rounded text-red-600 focus:ring-red-500">
                                            <span>Remove Banner</span>
                                        </label>
                                    </div>
                                </div>
                            @endif

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <label for="banner_image_file" class="block text-xs font-medium text-gray-700">
                                        {{ !empty($product->banner_image) ? 'Upload New Banner to Replace:' : 'Upload Banner Image from Device:' }}
                                    </label>
                                    <button type="button" onclick="document.getElementById('banner_image_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                                </div>
                                <input type="file" id="banner_image_file" name="banner_image_file" accept="image/*"
                                       class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                                <p class="text-[11px] text-gray-500 mt-1">Supports JPG, PNG, WEBP up to 10MB.</p>
                            </div>

                            <div class="pt-1">
                                <label for="banner_image" class="block text-xs text-gray-500 mb-1">Or direct banner image path:</label>
                                <input type="text" id="banner_image" name="banner_image" value="{{ old('banner_image', $product->banner_image) }}" placeholder="images/products/banner-non-tear.jpg"
                                       class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                            </div>
                        </div>

                        {{-- Brochure File Upload & Preview --}}
                        <div class="sm:col-span-2 min-w-0 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-3">
                            <label class="block text-sm font-medium text-gray-800">Brochure Document File</label>

                            @if(!empty($product->brochure_url))
                                <div class="flex flex-wrap items-center justify-between p-3 bg-white border border-gray-200 rounded-lg gap-3">
                                    <div class="flex items-center gap-3 min-w-0 flex-1">
                                        <svg class="w-6 h-6 text-red-500 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        <div class="text-xs min-w-0 flex-1">
                                            <span class="inline-block px-2 py-0.5 bg-blue-50 text-[#0E4174] font-semibold rounded mb-1">Current Brochure File</span>
                                            <a href="{{ asset($product->brochure_url) }}" target="_blank" class="font-mono text-blue-600 hover:underline block truncate text-[11px]">
                                                {{ $product->brochure_url }} &rarr;
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
                                        {{ !empty($product->brochure_url) ? 'Upload New Brochure File to Replace:' : 'Upload Brochure File:' }}
                                    </label>
                                    <button type="button" onclick="document.getElementById('brochure_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                                </div>
                                <input type="file" id="brochure_file" name="brochure_file" accept=".pdf,.doc,.docx,.zip"
                                       class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                                <p class="text-[11px] text-gray-500 mt-1">Supports PDF, DOC, DOCX up to 20MB.</p>
                            </div>

                            <div class="pt-1">
                                <label for="brochure_url" class="block text-xs text-gray-500 mb-1">Or brochure URL / link:</label>
                                <input type="text" id="brochure_url" name="brochure_url" value="{{ old('brochure_url', $product->brochure_url) }}" placeholder="#download-brochure"
                                       class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                            </div>
                        </div>

                        <div class="min-w-0">
                            <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1.5">Sort Order</label>
                            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $product->sort_order) }}" min="0"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                        </div>

                        <div class="flex items-center gap-3 pt-1">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                                       class="sr-only peer">
                                <div class="w-10 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-[#0E4174] rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0E4174]"></div>
                            </label>
                            <label for="is_active" class="text-sm font-medium text-gray-700 cursor-pointer">Active on Website</label>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200 flex flex-wrap items-center gap-3">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#0E4174] hover:bg-[#0b3360] text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            Save Product Details
                        </button>
                        <a href="{{ route('admin.products.index') }}"
                           class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
                            Back to List
                        </a>
                    </div>
                </div>
            </form>
        </div>

        {{-- 2. EXPLORE OUR BRANDS --}}
        <div class="pt-4 border-t border-gray-200">
            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                    <h3 class="text-lg font-bold text-gray-900">2. Explore our Brands for {{ $product->name }}</h3>
                </div>
                <p class="text-sm text-gray-500 mt-0.5">Manage which brands (e.g. NovaLife, NovaJet, Saraprint) appear in the "Explore our Brands" section</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-5">
                <div>
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-3">Currently Attached Brands ({{ $product->brands->count() }})</h4>

                    @if($product->brands->isEmpty())
                        <p class="text-sm text-gray-400 py-3 text-center bg-gray-50 rounded-lg">No brands currently linked to this product. Add one below.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($product->brands as $brand)
                                <div class="flex items-center justify-between gap-2 p-3.5 bg-gray-50 border border-gray-200 rounded-lg hover:border-blue-300 transition-colors min-w-0">
                                    <div class="flex items-center gap-3 min-w-0 flex-1">
                                        <div class="w-12 h-8 bg-white border border-gray-200 rounded flex items-center justify-center p-1 shrink-0">
                                            @if($brand->logo)
                                                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" class="max-h-full max-w-full object-contain" />
                                            @else
                                                <span class="text-[10px] font-bold text-[#0E4174]">{{ $brand->name }}</span>
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-semibold text-sm text-gray-900 truncate">{{ $brand->name }}</p>
                                            <p class="text-xs text-gray-500 line-clamp-1">{{ $brand->subtitle }}</p>
                                        </div>
                                    </div>
                                    <form action="{{ route('admin.products.brands.detach', [$product, $brand]) }}" method="POST" class="shrink-0"
                                          onsubmit="return confirm('Remove &quot;{{ addslashes($brand->name) }}&quot; from {{ addslashes($product->name) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-md transition-colors cursor-pointer"
                                                title="Remove brand from this product">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="bg-blue-50/70 border border-blue-200/80 rounded-xl p-4 space-y-3">
                    <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-4">
                        <div class="flex-1 w-full min-w-0">
                            <label for="brand_id" class="block text-xs font-semibold uppercase tracking-wider text-[#0E4174] mb-1.5">
                                Add a Brand to {{ $product->name }}
                            </label>
                            <form action="{{ route('admin.products.brands.attach', $product) }}" method="POST" class="flex flex-col sm:flex-row gap-2.5">
                                @csrf
                                <select id="brand_id" name="brand_id" required
                                        class="flex-1 min-w-0 px-4 py-2 bg-white border border-blue-300 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#0E4174]">
                                    <option value="">-- Choose a Brand from the list --</option>
                                    @php
                                        $attachedBrandIds = $product->brands->pluck('id')->toArray();
                                    @endphp
                                    @foreach($allBrands as $b)
                                        <option value="{{ $b->id }}" {{ in_array($b->id, $attachedBrandIds) ? 'disabled' : '' }}>
                                            {{ $b->name }} ({{ $b->subtitle }}) {{ in_array($b->id, $attachedBrandIds) ? '— [Already Added]' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                        class="inline-flex items-center justify-center gap-1.5 px-5 py-2 bg-[#0E4174] hover:bg-[#0b3360] text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer shrink-0">
                                    + Add Brand
                                </button>
                            </form>
                        </div>

                        <button type="button"
                                onclick="document.getElementById('new-brand-drawer').classList.toggle('hidden')"
                                class="text-xs font-medium text-blue-700 hover:text-blue-900 underline cursor-pointer shrink-0">
                            + Create a new custom brand
                        </button>
                    </div>

                    <div id="new-brand-drawer" class="hidden pt-3 border-t border-blue-200">
                        <p class="text-xs font-semibold text-gray-700 mb-2">Create New Brand &amp; Attach to this Product:</p>
                        <form action="{{ route('admin.products.brands.store', $product) }}" method="POST" class="grid grid-cols-1 sm:grid-cols-4 gap-2.5">
                            @csrf
                            <input type="text" name="name" required placeholder="Brand Name (e.g. NovaFilm)" class="px-3 py-1.5 bg-white border border-gray-300 rounded text-xs min-w-0" />
                            <input type="text" name="subtitle" placeholder="Subtitle (e.g. Premium Film)" class="px-3 py-1.5 bg-white border border-gray-300 rounded text-xs min-w-0" />
                            <input type="text" name="logo" placeholder="Logo Path (e.g. images/brands/logos/novafilm.png)" class="px-3 py-1.5 bg-white border border-gray-300 rounded text-xs min-w-0" />
                            <button type="submit" class="px-4 py-1.5 bg-blue-700 hover:bg-blue-800 text-white text-xs font-semibold rounded transition-colors cursor-pointer">
                                Create &amp; Attach
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. KEY BENEFITS ("Where the Material Makes a Difference") --}}
        <div class="pt-4 border-t border-gray-200" id="admin-key-benefits">
            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                    <h3 class="text-lg font-bold text-gray-900">3. Key Benefits ("Where the Material Makes a Difference")</h3>
                </div>
                <p class="text-sm text-gray-500 mt-0.5">Configure the heading, overline, description, and individual benefit points</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-6">
                {{-- Header Form --}}
                <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_section" value="benefits_header" />

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="min-w-0">
                            <label for="benefits_overline" class="block text-xs font-medium text-gray-700 mb-1">Overline</label>
                            <input type="text" id="benefits_overline" name="benefits_overline"
                                   value="{{ old('benefits_overline', $product->benefits_overline) }}"
                                   placeholder="KEY BENEFITS"
                                   class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174]" />
                        </div>
                        <div class="sm:col-span-2 min-w-0">
                            <label for="benefits_title" class="block text-xs font-medium text-gray-700 mb-1">Heading</label>
                            <input type="text" id="benefits_title" name="benefits_title"
                                   value="{{ old('benefits_title', $product->benefits_title) }}"
                                   placeholder="Where the Material Makes a Difference"
                                   class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174]" />
                        </div>
                        <div class="sm:col-span-3 min-w-0">
                            <label for="benefits_description" class="block text-xs font-medium text-gray-700 mb-1">Description</label>
                            <textarea id="benefits_description" name="benefits_description" rows="2"
                                      placeholder="Photobooks and albums benefit from pages designed for repeated handling..."
                                      class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] resize-none">{{ old('benefits_description', $product->benefits_description) }}</textarea>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2 bg-[#0E4174] hover:bg-[#0b3360] text-white text-xs font-semibold rounded-lg shadow-sm transition-colors cursor-pointer">
                            Save Benefits Header
                        </button>
                    </div>
                </form>

                {{-- Add New Benefit --}}
                <div class="pt-5 border-t border-gray-200 space-y-4">
                    <div class="bg-emerald-50/70 border border-emerald-200 rounded-xl p-4">
                        <form action="{{ route('admin.products.benefits.store', $product) }}" method="POST" class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-end">
                            @csrf
                            <div class="flex-1 min-w-0">
                                <label for="new_benefit_content" class="block text-xs font-semibold uppercase tracking-wider text-emerald-900 mb-1.5">
                                    Add Key Benefit <span class="text-red-500">*</span>
                                </label>
                                <textarea id="new_benefit_content" name="content" rows="2" required
                                          placeholder="e.g. Resistance to tearing compared with conventional paper, subject to the selected grade."
                                          class="w-full px-3.5 py-2 bg-white border border-emerald-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600 resize-none"></textarea>
                            </div>
                            <div class="w-full sm:w-24">
                                <label for="new_benefit_sort" class="block text-xs font-medium text-emerald-900 mb-1.5">Order</label>
                                <input type="number" id="new_benefit_sort" name="sort_order" value="{{ $product->benefits->count() + 1 }}" min="0"
                                       class="w-full px-3 py-2 bg-white border border-emerald-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-600" />
                            </div>
                            <button type="submit"
                                    class="inline-flex items-center justify-center gap-1.5 px-5 py-2.5 bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer shrink-0">
                                + Add Benefit
                            </button>
                        </form>
                    </div>

                    {{-- Existing Benefits List --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden">
                        <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                            <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-600">Configured Benefits ({{ $product->benefits->count() }})</h4>
                        </div>

                        @if($product->benefits->isEmpty())
                            <p class="text-sm text-gray-400 py-6 text-center">No key benefits configured yet for this product.</p>
                        @else
                            <div class="divide-y divide-gray-100">
                                @foreach($product->benefits as $benefit)
                                    <div class="p-3.5 flex flex-col sm:flex-row sm:items-center gap-2.5">
                                        <form action="{{ route('admin.products.benefits.update', [$product, $benefit]) }}" method="POST"
                                              class="flex-1 min-w-0 flex flex-col sm:flex-row gap-2 items-stretch sm:items-center">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="sort_order" value="{{ $benefit->sort_order }}" min="0"
                                                   class="w-full sm:w-16 px-2.5 py-2 border border-gray-300 rounded-lg text-xs text-center shrink-0"
                                                   title="Sort order" />
                                            <input type="text" name="content" value="{{ $benefit->content }}" required
                                                   class="flex-1 min-w-0 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-[#0E4174]" />
                                            <button type="submit"
                                                    class="px-3.5 py-2 bg-[#0E4174] hover:bg-[#0b3360] text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer shrink-0">
                                                Save
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.products.benefits.destroy', [$product, $benefit]) }}" method="POST" class="shrink-0"
                                              onsubmit="return confirm('Remove this benefit?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="w-full sm:w-auto px-3 py-2 text-xs font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg border border-red-200 transition-colors cursor-pointer">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- 4. APPLICATION CATEGORIES & ITEMS ("Photography & Imaging" -> "Photo Books") --}}
        <div class="pt-4 border-t border-gray-200" id="admin-application-categories">
            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                    <h3 class="text-lg font-bold text-gray-900">4. Application Categories &amp; Products for {{ $product->name }}</h3>
                </div>
                <p class="text-sm text-gray-500 mt-0.5">Add categories (e.g. Photography &amp; Imaging) and application items with images under each category (e.g. Photo Books)</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-6">
                {{-- Add New Application Category (Preset / Copy / Custom) --}}
                <div class="bg-amber-50/70 border border-amber-200 rounded-xl p-4 space-y-3">
                    <form action="{{ route('admin.products.application-categories.store', $product) }}" method="POST" id="app-cat-preset-form" class="space-y-3">
                        @csrf
                        <div class="flex flex-col sm:flex-row gap-2.5 items-stretch sm:items-end">
                            <div class="flex-1 min-w-0">
                                <label for="cat-preset-selector" class="block text-xs font-semibold uppercase tracking-wider text-amber-900 mb-1.5">
                                    Add Category Using Preset or Existing Product
                                </label>
                                <select name="preset_key" id="cat-preset-selector" required onchange="handleCategoryPresetChange(this.value)"
                                        class="w-full px-3.5 py-2 bg-white border border-amber-300 rounded-lg text-sm text-gray-800 font-medium focus:outline-none focus:ring-2 focus:ring-amber-600">
                                    <option value="">-- Select Pre-filled Category or Custom --</option>
                                    <optgroup label="Standard Categories (Pre-filled with Items &amp; Images)">
                                        @foreach($presetApplicationCategories as $key => $preset)
                                            <option value="{{ $key }}">
                                                {{ $preset['title'] }} ({{ count($preset['items']) }} items: {{ collect($preset['items'])->pluck('title')->implode(', ') }})
                                            </option>
                                        @endforeach
                                    </optgroup>
                                    @if($existingApplicationCategories->isNotEmpty())
                                        <optgroup label="Copy from Another Product">
                                            @foreach($existingApplicationCategories as $existingCat)
                                                <option value="existing:{{ $existingCat->id }}">
                                                    {{ $existingCat->product?->name ?? 'Product' }} &rarr; {{ $existingCat->title }} ({{ $existingCat->items->count() }} items)
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                    <optgroup label="Other">
                                        <option value="custom">+ Custom Category (Enter your own title)</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="w-full sm:w-24 min-w-0">
                                <label for="new_cat_sort" class="block text-xs font-medium text-amber-900 mb-1.5">Order</label>
                                <input type="number" id="new_cat_sort" name="sort_order" value="{{ $product->applicationCategories->count() + 1 }}" min="0"
                                       class="w-full px-3 py-2 bg-white border border-amber-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-600" />
                            </div>
                            <button type="submit"
                                    class="inline-flex items-center justify-center gap-1.5 px-5 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer shrink-0">
                                + Add Category
                            </button>
                        </div>

                        <div id="custom-cat-fields" class="hidden pt-3 border-t border-amber-200 grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
                            <div class="sm:col-span-9 min-w-0">
                                <label for="new_cat_title" class="block text-xs font-medium text-amber-900 mb-1">Custom Category Title <span class="text-red-500">*</span></label>
                                <input type="text" id="new_cat_title" name="title" placeholder="e.g. Photography & Imaging"
                                       class="w-full px-3.5 py-2 bg-white border border-amber-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-600" />
                            </div>
                            <div class="sm:col-span-3 flex items-center sm:pt-5">
                                <label class="inline-flex items-center gap-2 text-xs font-medium text-amber-900 cursor-pointer">
                                    <input type="hidden" name="has_carousel" value="0">
                                    <input type="checkbox" name="has_carousel" value="1" checked class="rounded text-amber-600 focus:ring-amber-500">
                                    <span>Enable Carousel</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Existing Categories & Nested Items --}}
                @if($product->applicationCategories->isEmpty())
                    <p class="text-sm text-gray-400 py-6 text-center bg-gray-50 rounded-lg">
                        No application categories added for {{ $product->name }} yet. Create a category above to start adding application items.
                    </p>
                @else
                    <div class="space-y-5">
                        @foreach($product->applicationCategories as $category)
                            <div class="rounded-xl border border-gray-200 overflow-hidden">
                                {{-- Category Header + Inline Edit/Delete --}}
                                <div class="px-4 py-3.5 bg-gray-50 border-b border-gray-200 flex flex-col lg:flex-row lg:items-center justify-between gap-3">
                                    <form action="{{ route('admin.products.application-categories.update', [$product, $category]) }}" method="POST"
                                          class="flex-1 min-w-0 flex flex-wrap items-center gap-2.5">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="sort_order" value="{{ $category->sort_order }}" min="0"
                                               class="w-16 px-2.5 py-1.5 bg-white border border-gray-300 rounded-md text-xs text-center shrink-0" title="Sort order" />
                                        <input type="text" name="title" value="{{ $category->title }}" required
                                               class="flex-1 min-w-[180px] px-3 py-1.5 bg-white border border-gray-300 rounded-md text-sm font-semibold text-gray-900" />
                                        <label class="inline-flex items-center gap-1.5 text-xs text-gray-700 cursor-pointer px-1 shrink-0">
                                            <input type="hidden" name="has_carousel" value="0">
                                            <input type="checkbox" name="has_carousel" value="1" {{ $category->has_carousel ? 'checked' : '' }}
                                                   class="rounded text-[#0E4174] focus:ring-[#0E4174]">
                                            <span>Carousel</span>
                                        </label>
                                        <button type="submit"
                                                class="px-3 py-1.5 bg-[#0E4174] hover:bg-[#0b3360] text-white text-xs font-semibold rounded-md transition-colors cursor-pointer shrink-0">
                                            Save Category
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.products.application-categories.destroy', [$product, $category]) }}" method="POST" class="shrink-0"
                                          onsubmit="return confirm('Delete category &quot;{{ addslashes($category->title) }}&quot; and all its items?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1.5 text-xs font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded-md border border-red-200 transition-colors cursor-pointer">
                                            Delete Category
                                        </button>
                                    </form>
                                </div>

                                {{-- Category Items List --}}
                                <div class="p-4 space-y-4">
                                    @if($category->items->isEmpty())
                                        <p class="text-xs text-gray-400 text-center py-2">No items in this category yet. Add one below.</p>
                                    @else
                                        <div class="divide-y divide-gray-100 border border-gray-100 rounded-lg">
                                            @foreach($category->items as $item)
                                                <div class="p-3 flex flex-col lg:flex-row lg:items-center gap-3">
                                                    <div class="w-16 h-11 rounded bg-gray-100 border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                                                        @if($item->image)
                                                            @php
                                                                $thumbSrc = str_starts_with($item->image, 'http')
                                                                    ? $item->image
                                                                    : asset(implode('/', array_map('rawurlencode', explode('/', ltrim($item->image, '/')))));
                                                            @endphp
                                                            <img src="{{ $thumbSrc }}" alt="{{ $item->alt ?? $item->title }}" class="w-full h-full object-cover" />
                                                        @else
                                                            <span class="text-[10px] text-gray-400">No img</span>
                                                        @endif
                                                    </div>

                                                    <form action="{{ route('admin.products.application-categories.items.update', [$product, $category, $item]) }}"
                                                          method="POST" enctype="multipart/form-data"
                                                          class="flex-1 min-w-0 grid grid-cols-1 sm:grid-cols-12 gap-2 items-center">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="sm:col-span-1 min-w-0">
                                                            <input type="number" name="sort_order" value="{{ $item->sort_order }}" min="0"
                                                                   class="w-full px-2 py-1.5 border border-gray-300 rounded text-xs text-center" title="Order" />
                                                        </div>
                                                        <div class="sm:col-span-3 min-w-0">
                                                            <input type="text" name="title" value="{{ $item->title }}" required placeholder="Item Title"
                                                                   class="w-full px-2.5 py-1.5 border border-gray-300 rounded text-xs font-medium" />
                                                        </div>
                                                        <div class="sm:col-span-3 min-w-0">
                                                            <input type="text" name="image" value="{{ $item->image }}" placeholder="Image path (optional)"
                                                                   class="w-full px-2.5 py-1.5 border border-gray-300 rounded text-[11px] font-mono" />
                                                        </div>
                                                        <div class="sm:col-span-3 min-w-0">
                                                            <input type="file" name="image_file" accept="image/*"
                                                                   class="w-full min-w-0 text-[11px] text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:bg-slate-100 file:text-slate-700 cursor-pointer" />
                                                        </div>
                                                        <div class="sm:col-span-2 flex items-center justify-end">
                                                            <button type="submit"
                                                                    class="w-full sm:w-auto px-3 py-1.5 bg-[#0E4174] hover:bg-[#0b3360] text-white text-xs font-semibold rounded transition-colors cursor-pointer">
                                                                Save
                                                            </button>
                                                        </div>
                                                    </form>

                                                    <form action="{{ route('admin.products.application-categories.items.destroy', [$product, $category, $item]) }}"
                                                          method="POST" class="shrink-0"
                                                          onsubmit="return confirm('Remove &quot;{{ addslashes($item->title) }}&quot;?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="w-full lg:w-auto px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-50 rounded border border-red-200 transition-colors cursor-pointer">
                                                            Remove
                                                        </button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    {{-- Add Item to this Category (Preset Dropdown or Custom) --}}
                                    <form action="{{ route('admin.products.application-categories.items.store', [$product, $category]) }}"
                                          method="POST" enctype="multipart/form-data"
                                          class="pt-3 border-t border-gray-100 space-y-2.5">
                                        @csrf
                                        <div class="grid grid-cols-1 sm:grid-cols-12 gap-2.5 items-end">
                                            <div class="sm:col-span-5 min-w-0">
                                                <label class="block text-[11px] font-medium text-gray-600 mb-1">Add Item from Preset or Custom</label>
                                                <select name="preset_key" onchange="handleCategoryItemPresetChange(this)"
                                                        class="w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-xs font-medium text-gray-800">
                                                    <option value="custom">+ Custom Item (Enter title &amp; image below)</option>
                                                    @foreach($presetApplicationCategories as $catPreset)
                                                        <optgroup label="{{ $catPreset['title'] }}">
                                                            @foreach($catPreset['items'] as $itemPreset)
                                                                @php
                                                                    $itemSlug = \Illuminate\Support\Str::slug($itemPreset['title']);
                                                                @endphp
                                                                <option value="{{ $itemSlug }}"
                                                                        data-title="{{ $itemPreset['title'] }}"
                                                                        data-image="{{ $itemPreset['image'] }}">
                                                                    {{ $itemPreset['title'] }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="sm:col-span-3 min-w-0">
                                                <label class="block text-[11px] font-medium text-gray-600 mb-1">Item Title <span class="text-red-500">*</span></label>
                                                <input type="text" name="title" required placeholder="e.g. Photo Books"
                                                       class="cat-item-title-input w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-xs" />
                                            </div>
                                            <div class="sm:col-span-2 min-w-0">
                                                <label class="block text-[11px] font-medium text-gray-600 mb-1">Image Path</label>
                                                <input type="text" name="image" placeholder="images/products/applications/..."
                                                       class="cat-item-image-input w-full px-2.5 py-1.5 bg-white border border-gray-300 rounded text-[11px] font-mono" />
                                            </div>
                                            <div class="sm:col-span-2">
                                                <button type="submit"
                                                        class="w-full px-3 py-1.5 bg-slate-800 hover:bg-slate-900 text-white text-xs font-semibold rounded transition-colors cursor-pointer">
                                                    + Add Item
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap items-center gap-2">
                                            <label class="text-[11px] text-gray-500 shrink-0">Or upload custom image file:</label>
                                            <input type="file" name="image_file" accept="image/*"
                                                   class="flex-1 min-w-0 text-[11px] text-gray-600 file:mr-2 file:py-1 file:px-2.5 file:rounded file:border-0 file:text-[11px] file:bg-blue-50 file:text-[#0E4174] border border-gray-200 rounded p-0.5 cursor-pointer" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>

    <script>
        function handleCategoryPresetChange(val) {
            const customBox = document.getElementById('custom-cat-fields');
            const customTitle = document.getElementById('new_cat_title');
            if (!customBox || !customTitle) return;
            if (val === 'custom') {
                customBox.classList.remove('hidden');
                customTitle.setAttribute('required', 'required');
                customTitle.focus();
            } else {
                customBox.classList.add('hidden');
                customTitle.removeAttribute('required');
            }
        }

        function handleCategoryItemPresetChange(selectEl) {
            const form = selectEl.closest('form');
            const titleInput = form.querySelector('.cat-item-title-input');
            const imageInput = form.querySelector('.cat-item-image-input');
            const selected = selectEl.options[selectEl.selectedIndex];

            if (selectEl.value !== 'custom' && selected) {
                if (titleInput) {
                    titleInput.value = selected.getAttribute('data-title') || '';
                }
                if (imageInput) {
                    imageInput.value = selected.getAttribute('data-image') || '';
                }
            } else {
                if (titleInput) {
                    titleInput.value = '';
                }
                if (imageInput) {
                    imageInput.value = '';
                }
            }
        }
    </script>

</x-admin.layout>
