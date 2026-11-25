<x-admin.layout :page-title="'Edit: ' . $product->name" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Products' => route('admin.products.index'), $product->name => '#']">

    <div class="max-w-4xl space-y-8">

        {{-- Product Edit Form --}}
        <div>
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Edit Product</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Update the core product details</p>
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

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-5 mb-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Product Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                                   class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition {{ $errors->has('name') ? 'border-red-400' : 'border-gray-300' }}" />
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">Slug</label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug', $product->slug) }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                            @error('slug') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
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

                        <div class="sm:col-span-2">
                            <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1.5">Short Description / Subtitle</label>
                            <input type="text" id="short_description" name="short_description" value="{{ old('short_description', $product->short_description) }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Full Description</label>
                            <textarea id="description" name="description" rows="3"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition resize-none">{{ old('description', $product->description) }}</textarea>
                        </div>

                        {{-- Banner Image Upload & Preview --}}
                        <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-3">
                            <label class="block text-sm font-medium text-gray-800">Banner Image</label>

                            @if(!empty($product->banner_image))
                                <div class="rounded-lg overflow-hidden border border-gray-200 bg-white">
                                    <img src="{{ asset($product->banner_image) }}" alt="Banner for {{ $product->name }}" class="w-full h-32 object-cover" />
                                    <div class="p-2.5 bg-white/95 border-t border-gray-200 text-xs flex items-center justify-between gap-3">
                                        <div class="flex items-center gap-2 truncate">
                                            <span class="inline-block px-2 py-0.5 bg-blue-50 text-[#0E4174] font-semibold rounded text-[11px]">Current Banner</span>
                                            <span class="font-mono text-gray-500 text-[11px] truncate max-w-sm">{{ $product->banner_image }}</span>
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
                        <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-3">
                            <label class="block text-sm font-medium text-gray-800">Brochure Document File</label>

                            @if(!empty($product->brochure_url))
                                <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg gap-3">
                                    <div class="flex items-center gap-3 truncate flex-1">
                                        <svg class="w-6 h-6 text-red-500 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        <div class="text-xs truncate">
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

                        <div>
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
                </div>

                <div class="flex items-center gap-3">
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
            </form>
        </div>

        {{-- SECTION 1: Explore our Brands for this Product --}}
        <div class="pt-4 border-t border-gray-200">
            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                    <h3 class="text-lg font-bold text-gray-900">Explore our Brands for {{ $product->name }}</h3>
                </div>
                <p class="text-sm text-gray-500 mt-0.5">Manage which brands (e.g. NovaLife, NovaJet, Saraprint) appear in the "Explore our Brands" section on this product's page</p>
            </div>

            {{-- Currently Attached Brands Grid --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 mb-5">
                <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-3">Currently Attached Brands ({{ $product->brands->count() }})</h4>

                @if($product->brands->isEmpty())
                    <p class="text-sm text-gray-400 py-3 text-center bg-gray-50 rounded-lg">No brands currently linked to this product. Add one below.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($product->brands as $brand)
                            <div class="flex items-center justify-between p-3.5 bg-gray-50 border border-gray-200 rounded-lg group hover:border-blue-300 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-8 bg-white border border-gray-200 rounded flex items-center justify-center p-1 shrink-0">
                                        @if($brand->logo)
                                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" class="max-h-full max-w-full object-contain" />
                                        @else
                                            <span class="text-[10px] font-bold text-[#0E4174]">{{ $brand->name }}</span>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-semibold text-sm text-gray-900">{{ $brand->name }}</p>
                                        <p class="text-xs text-gray-500 line-clamp-1">{{ $brand->subtitle }}</p>
                                    </div>
                                </div>
                                <form action="{{ route('admin.products.brands.detach', [$product, $brand]) }}" method="POST"
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

            {{-- Add Brand to Product Form --}}
            <div class="bg-gradient-to-r from-blue-50/70 to-indigo-50/70 border border-blue-200/80 rounded-xl p-5">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex-1 w-full sm:w-auto">
                        <label for="brand_id" class="block text-xs font-semibold uppercase tracking-wider text-[#0E4174] mb-1.5">
                            Add a Brand to {{ $product->name }}
                        </label>
                        <form action="{{ route('admin.products.brands.attach', $product) }}" method="POST" class="flex flex-col sm:flex-row gap-2.5">
                            @csrf
                            <select id="brand_id" name="brand_id" required
                                    class="flex-1 px-4 py-2 bg-white border border-blue-300 rounded-lg text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#0E4174]">
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
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Brand
                            </button>
                        </form>
                    </div>

                    {{-- Toggle new brand form --}}
                    <div class="sm:self-end">
                        <button type="button"
                                onclick="document.getElementById('new-brand-drawer').classList.toggle('hidden')"
                                class="text-xs font-medium text-blue-700 hover:text-blue-900 underline cursor-pointer">
                            + Create a new custom brand
                        </button>
                    </div>
                </div>

                {{-- Hidden drawer to create a brand on the fly --}}
                <div id="new-brand-drawer" class="hidden mt-4 pt-4 border-t border-blue-200">
                    <p class="text-xs font-semibold text-gray-700 mb-2">Create New Brand &amp; Attach to this Product:</p>
                    <form action="{{ route('admin.products.brands.store', $product) }}" method="POST" class="grid grid-cols-1 sm:grid-cols-4 gap-2.5">
                        @csrf
                        <input type="text" name="name" required placeholder="Brand Name (e.g. NovaFilm)" class="px-3 py-1.5 bg-white border border-gray-300 rounded text-xs" />
                        <input type="text" name="subtitle" placeholder="Subtitle (e.g. Premium Film)" class="px-3 py-1.5 bg-white border border-gray-300 rounded text-xs" />
                        <input type="text" name="logo" placeholder="Logo Path (e.g. images/brands/logos/novafilm.png)" class="px-3 py-1.5 bg-white border border-gray-300 rounded text-xs" />
                        <button type="submit" class="px-4 py-1.5 bg-blue-700 hover:bg-blue-800 text-white text-xs font-semibold rounded transition-colors cursor-pointer">
                            Create &amp; Attach
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- SECTION 2: Designed for Diverse Applications --}}
        <div class="pt-4 border-t border-gray-200">
            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-purple-600"></span>
                    <h3 class="text-lg font-bold text-gray-900">Designed for Diverse Applications</h3>
                </div>
                <p class="text-sm text-gray-500 mt-0.5">Use the simple dropdown below to quickly add applications, or enter a custom one.</p>
            </div>

            {{-- Quick Add Application using Simple Dropdown --}}
            <div class="bg-gradient-to-r from-purple-50/80 to-indigo-50/80 border border-purple-200 rounded-xl p-5 mb-5 shadow-sm">
                <h4 class="text-xs font-semibold uppercase tracking-wider text-purple-900 mb-2 flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Application Using Simple Dropdown
                </h4>

                <form action="{{ route('admin.products.applications.store', $product) }}" method="POST" id="quick-app-form">
                    @csrf
                    <div class="flex flex-col sm:flex-row gap-2.5 items-stretch sm:items-center">
                        <select name="preset_key" id="preset-selector" required onchange="handlePresetChange(this.value)"
                                class="flex-1 px-4 py-2.5 bg-white border border-purple-300 rounded-lg text-sm text-gray-800 font-medium focus:outline-none focus:ring-2 focus:ring-purple-600">
                            <option value="">-- Select an Application to add from Dropdown --</option>
                            <optgroup label="Popular / Standard Applications">
                                @foreach($presetApplications as $key => $preset)
                                    <option value="{{ $key }}">{{ $preset['title'] }} — ({{ Str::limit($preset['description'], 55) }})</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Other">
                                <option value="custom">✏️ + Custom Application (Enter your own details)</option>
                            </optgroup>
                        </select>

                        <button type="submit" id="quick-add-btn"
                                class="inline-flex items-center justify-center gap-1.5 px-6 py-2.5 bg-purple-700 hover:bg-purple-800 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Application
                        </button>
                    </div>

                    {{-- Custom Application Fields (only revealed when custom is chosen) --}}
                    <div id="custom-app-fields" class="hidden mt-4 pt-4 border-t border-purple-200 space-y-3">
                        <p class="text-xs font-semibold text-purple-900">Custom Application Details:</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">Title <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="custom-title" placeholder="e.g. Luggage Tags"
                                       class="w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-purple-600" />
                            </div>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">Image Path</label>
                                <input type="text" name="image" id="custom-image" placeholder="images/products/applications/example.jpg"
                                       class="w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-sm font-mono focus:outline-none focus:ring-1 focus:ring-purple-600" />
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-xs text-gray-600 mb-1">Description</label>
                                <textarea name="description" id="custom-desc" rows="2" placeholder="Application description…"
                                          class="w-full px-3 py-1.5 bg-white border border-gray-300 rounded text-sm focus:outline-none focus:ring-1 focus:ring-purple-600 resize-none"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Applications List Table --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-5 py-3.5 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-600">Attached Applications ({{ $product->applications->count() }})</h4>
                </div>

                @if($product->applications->isEmpty())
                    <div class="text-center py-10">
                        <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <p class="text-gray-400 text-sm">No applications added yet. Use the dropdown above to add one with a single click.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-gray-50/70 border-b border-gray-200">
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Application</th>
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Description</th>
                                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Image</th>
                                    <th class="text-right px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($product->applications as $application)
                                <tr class="hover:bg-gray-50/60 transition-colors">
                                    <td class="px-5 py-3.5 text-gray-400 text-xs">{{ $loop->iteration }}</td>
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center gap-3">
                                            @if($application->image)
                                                <div class="w-10 h-10 rounded-md bg-gray-100 overflow-hidden shrink-0 border border-gray-200">
                                                    <img src="{{ asset($application->image) }}" alt="{{ $application->title }}" class="w-full h-full object-cover" />
                                                </div>
                                            @endif
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $application->title }}</p>
                                                <p class="text-xs text-gray-400 md:hidden line-clamp-1">{{ $application->description }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3.5 hidden md:table-cell text-gray-600 text-xs max-w-sm">
                                        <span class="line-clamp-2">{{ $application->description }}</span>
                                    </td>
                                    <td class="px-5 py-3.5 hidden lg:table-cell text-gray-400 font-mono text-[11px]">
                                        {{ $application->image }}
                                    </td>
                                    <td class="px-5 py-3.5 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('admin.products.applications.edit', [$product, $application]) }}"
                                               class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded transition-colors">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.products.applications.destroy', [$product, $application]) }}" method="POST"
                                                  onsubmit="return confirm('Remove application &quot;{{ addslashes($application->title) }}&quot;?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded transition-colors cursor-pointer">
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
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
        function handlePresetChange(val) {
            const customBox = document.getElementById('custom-app-fields');
            const customTitle = document.getElementById('custom-title');
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
