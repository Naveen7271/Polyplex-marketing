<x-admin.layout :page-title="'Add Product'" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Products' => route('admin.products.index'), 'Add Product' => '#']">

    <div class="max-w-3xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900">Add New Product</h2>
            <p class="text-sm text-gray-500 mt-0.5">Fill in the details below to create a new product</p>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-5">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Product Name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Non-Tear Media"
                               class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition {{ $errors->has('name') ? 'border-red-400' : 'border-gray-300' }}" />
                        @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">Slug <span class="text-gray-400 font-normal">(auto-generated)</span></label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" placeholder="e.g. non-tear-media"
                               class="w-full px-4 py-2.5 border rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition {{ $errors->has('slug') ? 'border-red-400' : 'border-gray-300' }}" />
                        @error('slug') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Category <span class="text-xs text-gray-400 font-normal">(Optional — defaults to Product Name)</span>
                        </label>
                        <input type="text" id="category" name="category" value="{{ old('category') }}" placeholder="Leave blank to use Product Name" list="category_list"
                               class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition {{ $errors->has('category') ? 'border-red-400' : 'border-gray-300' }}" />
                        <datalist id="category_list">
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}"></option>
                            @endforeach
                        </datalist>
                        @error('category') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1.5">Short Description</label>
                        <input type="text" id="short_description" name="short_description" value="{{ old('short_description') }}" placeholder="Brief one-liner about the product"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Full Description</label>
                        <textarea id="description" name="description" rows="3" placeholder="Detailed product description…"
                                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition resize-none">{{ old('description') }}</textarea>
                    </div>

                    {{-- Banner Image Upload --}}
                    <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="banner_image_file" class="block text-sm font-medium text-gray-800">
                                Banner Image <span class="text-xs text-gray-500 font-normal">(Upload from device)</span>
                            </label>
                            <button type="button" onclick="document.getElementById('banner_image_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                        </div>
                        <input type="file" id="banner_image_file" name="banner_image_file" accept="image/*"
                               class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                        <p class="text-[11px] text-gray-500">Header hero banner for product detail page. Supports JPG, PNG, WEBP up to 10MB.</p>
                        <div class="pt-1">
                            <label for="banner_image" class="block text-xs text-gray-500 mb-1">Or existing image path (optional):</label>
                            <input type="text" id="banner_image" name="banner_image" value="{{ old('banner_image') }}" placeholder="images/products/banner-non-tear.jpg"
                                   class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                        </div>
                    </div>

                    {{-- Brochure File Upload --}}
                    <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="brochure_file" class="block text-sm font-medium text-gray-800">
                                Brochure Document File <span class="text-xs text-gray-500 font-normal">(Upload PDF / Doc)</span>
                            </label>
                            <button type="button" onclick="document.getElementById('brochure_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                        </div>
                        <input type="file" id="brochure_file" name="brochure_file" accept=".pdf,.doc,.docx,.zip"
                               class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                        <p class="text-[11px] text-gray-500">Downloadable brochure for this product. Supports PDF, DOC, DOCX up to 20MB.</p>
                        <div class="pt-1">
                            <label for="brochure_url" class="block text-xs text-gray-500 mb-1">Or external brochure link (optional):</label>
                            <input type="text" id="brochure_url" name="brochure_url" value="{{ old('brochure_url') }}" placeholder="#download-brochure or https://..."
                                   class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                        </div>
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1.5">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition" />
                    </div>

                    <div class="flex items-center gap-3 pt-1">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}
                                   class="sr-only peer">
                            <div class="w-10 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-[#0E4174] rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0E4174]"></div>
                        </label>
                        <label for="is_active" class="text-sm font-medium text-gray-700 cursor-pointer">Active (visible on website)</label>
                    </div>
                </div>

                {{-- Brands Multi-Select Pill Checkboxes --}}
                <div class="pt-4 border-t border-gray-200">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-[#0E4174] mb-2">
                        Explore our Brands: Select Brands for this Product
                    </label>
                    <p class="text-xs text-gray-500 mb-3">Choose which brands appear under "Explore our Brands for this Product". You can also adjust this later.</p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5">
                        @foreach($allBrands as $b)
                            <label class="flex items-center gap-2 p-2.5 border border-gray-200 rounded-lg hover:bg-blue-50/50 cursor-pointer text-xs font-medium text-gray-800 transition-colors">
                                <input type="checkbox" name="brand_ids[]" value="{{ $b->id }}"
                                       class="rounded text-[#0E4174] focus:ring-[#0E4174]" />
                                <span>{{ $b->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Preset Applications Selector --}}
                <div class="pt-4 border-t border-gray-200">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-purple-900 mb-2">
                        Designed for Diverse Applications: Select Initial Applications
                    </label>
                    <p class="text-xs text-gray-500 mb-3">Pick applications to attach immediately, or add more with the simple dropdown on the edit page.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        @foreach(array_slice($presetApplications, 0, 8, true) as $key => $preset)
                            <label class="flex items-center gap-2 p-2 border border-purple-100 bg-purple-50/30 rounded hover:bg-purple-50 cursor-pointer text-xs text-gray-800 transition-colors">
                                <input type="checkbox" name="initial_application_presets[]" value="{{ $key }}"
                                       class="rounded text-purple-700 focus:ring-purple-600" />
                                <span class="font-medium">{{ $preset['title'] }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#0E4174] hover:bg-[#0b3360] text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Create Product &amp; Continue
                </button>
                <a href="{{ route('admin.products.index') }}"
                   class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</x-admin.layout>
