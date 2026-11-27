<x-admin.layout :page-title="'Add Product'" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Products' => route('admin.products.index'), 'Add Product' => '#']">

    <div class="max-w-5xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900">Add New Product</h2>
            <p class="text-sm text-gray-500 mt-0.5">Fields are arranged in the exact top-to-bottom sequence of the website product page</p>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-6">

                {{-- 1. HERO & CORE PRODUCT DETAILS --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-2 border-b border-gray-100">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#0E4174]"></span>
                        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">1. Hero &amp; Core Product Details</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="sm:col-span-2 min-w-0">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Product Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Non-Tear Media"
                                   class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition {{ $errors->has('name') ? 'border-red-400' : 'border-gray-300' }}" />
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="min-w-0">
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">Slug <span class="text-gray-400 font-normal">(auto-generated)</span></label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug') }}" placeholder="e.g. non-tear-media"
                                   class="w-full px-4 py-2.5 border rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition {{ $errors->has('slug') ? 'border-red-400' : 'border-gray-300' }}" />
                            @error('slug') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="min-w-0">
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

                        <div class="sm:col-span-2 min-w-0">
                            <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1.5">Short Description / Subtitle</label>
                            <input type="text" id="short_description" name="short_description" value="{{ old('short_description') }}" placeholder="Brief one-liner about the product"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition" />
                        </div>

                        <div class="sm:col-span-2 min-w-0">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Full Description</label>
                            <textarea id="description" name="description" rows="3" placeholder="Detailed product description…"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition resize-none">{{ old('description') }}</textarea>
                        </div>

                        {{-- Banner Image Upload --}}
                        <div class="sm:col-span-2 min-w-0 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-2">
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
                        <div class="sm:col-span-2 min-w-0 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-2">
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

                        <div class="min-w-0">
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
                </div>

                {{-- 2. EXPLORE OUR BRANDS --}}
                <div class="pt-5 border-t border-gray-200 space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                        <h3 class="text-sm font-bold text-[#0E4174] uppercase tracking-wider">2. Explore our Brands: Select Brands for this Product</h3>
                    </div>
                    <p class="text-xs text-gray-500">Choose which brands appear under "Explore our Brands for this Product". You can also adjust this later.</p>
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

                {{-- 3. KEY BENEFITS ("Where the Material Makes a Difference") --}}
                <div class="pt-5 border-t border-gray-200 space-y-3">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                            <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">3. Key Benefits ("Where the Material Makes a Difference")</h3>
                        </div>
                        <button type="button" id="create-add-benefit-btn"
                                class="text-xs font-semibold text-emerald-700 hover:text-emerald-900 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 px-2.5 py-1 rounded-md cursor-pointer">
                            + Add Key Benefit
                        </button>
                    </div>

                    <div class="bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-3">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div class="min-w-0">
                                <label for="benefits_overline" class="block text-xs font-medium text-gray-700 mb-1">Overline</label>
                                <input type="text" id="benefits_overline" name="benefits_overline" value="{{ old('benefits_overline', 'KEY BENEFITS') }}"
                                       placeholder="KEY BENEFITS"
                                       class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174]" />
                            </div>
                            <div class="sm:col-span-2 min-w-0">
                                <label for="benefits_title" class="block text-xs font-medium text-gray-700 mb-1">Heading</label>
                                <input type="text" id="benefits_title" name="benefits_title" value="{{ old('benefits_title') }}"
                                       placeholder="Where the Material Makes a Difference"
                                       class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174]" />
                            </div>
                            <div class="sm:col-span-3 min-w-0">
                                <label for="benefits_description" class="block text-xs font-medium text-gray-700 mb-1">Description</label>
                                <textarea id="benefits_description" name="benefits_description" rows="2"
                                          placeholder="Photobooks and albums benefit from pages designed for repeated handling..."
                                          class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] resize-none">{{ old('benefits_description') }}</textarea>
                            </div>
                        </div>

                        <div id="create-benefits-list" class="space-y-2 pt-2">
                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                                <input type="text" name="benefits[]" placeholder="e.g. Resistance to tearing compared with conventional paper..."
                                       class="flex-1 min-w-0 px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-[#0E4174]" />
                                <button type="button" onclick="this.parentElement.remove()"
                                        class="px-3 py-2 text-xs font-medium text-red-600 hover:bg-red-50 rounded-lg border border-red-200 cursor-pointer shrink-0">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 4. APPLICATION CATEGORIES & ITEMS --}}
                <div class="pt-5 border-t border-gray-200 space-y-3">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">4. Application Categories &amp; Items</h3>
                            </div>
                            <p class="text-[11px] text-gray-500 mt-0.5">Select a pre-filled category from the dropdown or add a custom category &amp; items</p>
                        </div>
                        <button type="button" id="create-add-category-btn"
                                class="text-xs font-semibold text-white bg-amber-600 hover:bg-amber-700 px-3 py-1.5 rounded-lg cursor-pointer shrink-0">
                            + Add Blank Category
                        </button>
                    </div>

                    {{-- Pre-filled Category Quick Selector --}}
                    <div class="bg-amber-50/70 border border-amber-200 rounded-xl p-3.5 flex flex-col sm:flex-row gap-2.5 items-stretch sm:items-center">
                        <select id="create-cat-preset-selector"
                                class="flex-1 min-w-0 px-3 py-2 bg-white border border-amber-300 rounded-lg text-xs font-medium text-gray-800">
                            <option value="">-- Select a Pre-filled Category (auto-fills items &amp; images) --</option>
                            @foreach($presetApplicationCategories as $key => $preset)
                                <option value="{{ $key }}">
                                    {{ $preset['title'] }} ({{ count($preset['items']) }} items: {{ collect($preset['items'])->pluck('title')->implode(', ') }})
                                </option>
                            @endforeach
                        </select>
                        <button type="button" id="create-add-preset-cat-btn"
                                class="px-4 py-2 bg-[#0E4174] hover:bg-[#0b3360] text-white text-xs font-semibold rounded-lg transition-colors cursor-pointer shrink-0">
                            + Add Pre-filled Category
                        </button>
                    </div>

                    <div id="create-categories-list" class="space-y-4">
                        <div class="create-category-block bg-amber-50/40 border border-amber-200 rounded-xl p-4 space-y-3" data-cat-index="0">
                            <div class="flex flex-wrap items-center gap-2.5">
                                <input type="text" name="application_categories[0][title]" placeholder="Category Title (e.g. Photography & Imaging)"
                                       class="flex-1 min-w-[200px] px-3 py-1.5 bg-white border border-gray-300 rounded text-sm font-medium" />
                                <label class="inline-flex items-center gap-1.5 text-xs text-gray-700 cursor-pointer shrink-0">
                                    <input type="hidden" name="application_categories[0][has_carousel]" value="0">
                                    <input type="checkbox" name="application_categories[0][has_carousel]" value="1" checked class="rounded text-amber-600">
                                    <span>Carousel</span>
                                </label>
                                <button type="button" onclick="addCategoryItemRow(this)"
                                        class="px-2.5 py-1.5 text-xs font-semibold text-[#0E4174] bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 cursor-pointer shrink-0">
                                    + Add Item
                                </button>
                                <button type="button" onclick="this.closest('.create-category-block').remove()"
                                        class="px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-50 rounded border border-red-200 cursor-pointer shrink-0">
                                    Remove
                                </button>
                            </div>

                            <div class="create-category-items space-y-2">
                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-2 items-center">
                                    <select onchange="applyCreateItemPreset(this)"
                                            class="sm:col-span-3 min-w-0 px-2 py-1.5 bg-white border border-gray-300 rounded text-[11px] text-gray-700">
                                        <option value="">-- Preset Item --</option>
                                        @foreach($presetApplicationCategories as $catPreset)
                                            <optgroup label="{{ $catPreset['title'] }}">
                                                @foreach($catPreset['items'] as $itemPreset)
                                                    <option value="{{ $itemPreset['title'] }}" data-image="{{ $itemPreset['image'] }}">{{ $itemPreset['title'] }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <input type="text" name="application_categories[0][items][0][title]" placeholder="Item Title (e.g. Photo Books)"
                                           class="create-item-title sm:col-span-3 min-w-0 px-2.5 py-1.5 bg-white border border-gray-300 rounded text-xs" />
                                    <input type="file" name="application_categories[0][items][0][image_file]" accept="image/*"
                                           class="sm:col-span-3 min-w-0 text-[11px] text-gray-600 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:bg-slate-100 bg-white border border-gray-200 rounded p-0.5" />
                                    <input type="text" name="application_categories[0][items][0][image]" placeholder="Or image path (optional)"
                                           class="create-item-image sm:col-span-2 min-w-0 px-2 py-1.5 bg-white border border-gray-300 rounded text-[11px] font-mono" />
                                    <button type="button" onclick="this.parentElement.remove()"
                                            class="sm:col-span-1 px-2 py-1.5 text-xs text-red-600 hover:bg-red-50 rounded border border-red-200 cursor-pointer">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Submit Actions Inside Card Container --}}
                <div class="pt-5 border-t border-gray-200 flex flex-wrap items-center gap-3">
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

            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const benefitsList = document.getElementById('create-benefits-list');
            const addBenefitBtn = document.getElementById('create-add-benefit-btn');
            if (addBenefitBtn && benefitsList) {
                addBenefitBtn.addEventListener('click', function () {
                    const row = document.createElement('div');
                    row.className = 'flex flex-col sm:flex-row items-stretch sm:items-center gap-2';
                    row.innerHTML = `
                        <input type="text" name="benefits[]" placeholder="e.g. Choice of product formats and finishes..."
                               class="flex-1 min-w-0 px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-[#0E4174]" />
                        <button type="button" onclick="this.parentElement.remove()"
                                class="px-3 py-2 text-xs font-medium text-red-600 hover:bg-red-50 rounded-lg border border-red-200 cursor-pointer shrink-0">
                            Remove
                        </button>
                    `;
                    benefitsList.appendChild(row);
                });
            }

            const presetCategoryData = @json($presetApplicationCategories);
            let nextCatIndex = 1;
            const categoriesList = document.getElementById('create-categories-list');
            const addCategoryBtn = document.getElementById('create-add-category-btn');
            const addPresetCatBtn = document.getElementById('create-add-preset-cat-btn');
            const presetCatSelector = document.getElementById('create-cat-preset-selector');

            function appendCategoryBlock(title = '', hasCarousel = true, items = []) {
                const idx = nextCatIndex++;
                const block = document.createElement('div');
                block.className = 'create-category-block bg-amber-50/40 border border-amber-200 rounded-xl p-4 space-y-3';
                block.setAttribute('data-cat-index', String(idx));
                block.innerHTML = `
                    <div class="flex flex-wrap items-center gap-2.5">
                        <input type="text" name="application_categories[${idx}][title]" placeholder="Category Title (e.g. Tags & Labels)"
                               class="flex-1 min-w-[200px] px-3 py-1.5 bg-white border border-gray-300 rounded text-sm font-medium" />
                        <label class="inline-flex items-center gap-1.5 text-xs text-gray-700 cursor-pointer shrink-0">
                            <input type="hidden" name="application_categories[${idx}][has_carousel]" value="0">
                            <input type="checkbox" name="application_categories[${idx}][has_carousel]" value="1" ${hasCarousel ? 'checked' : ''} class="rounded text-amber-600">
                            <span>Carousel</span>
                        </label>
                        <button type="button" onclick="addCategoryItemRow(this)"
                                class="px-2.5 py-1.5 text-xs font-semibold text-[#0E4174] bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 cursor-pointer shrink-0">
                            + Add Item
                        </button>
                        <button type="button" onclick="this.closest('.create-category-block').remove()"
                                class="px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-50 rounded border border-red-200 cursor-pointer shrink-0">
                            Remove
                        </button>
                    </div>
                    <div class="create-category-items space-y-2"></div>
                `;
                block.querySelector(`input[name="application_categories[${idx}][title]"]`).value = title;
                categoriesList.appendChild(block);

                const addItemBtn = block.querySelector('button[onclick="addCategoryItemRow(this)"]');
                if (items.length > 0) {
                    items.forEach((item) => addCategoryItemRow(addItemBtn, item.title || '', item.image || ''));
                } else {
                    addCategoryItemRow(addItemBtn);
                }
            }

            if (addCategoryBtn && categoriesList) {
                addCategoryBtn.addEventListener('click', function () {
                    appendCategoryBlock();
                });
            }

            if (addPresetCatBtn && presetCatSelector && categoriesList) {
                addPresetCatBtn.addEventListener('click', function () {
                    const key = presetCatSelector.value;
                    if (!key || !presetCategoryData[key]) return;
                    const preset = presetCategoryData[key];
                    appendCategoryBlock(preset.title, !!preset.has_carousel, preset.items || []);
                    presetCatSelector.value = '';
                });
            }
        });

        function applyCreateItemPreset(selectEl) {
            const row = selectEl.closest('.grid');
            const titleInput = row.querySelector('.create-item-title');
            const imageInput = row.querySelector('.create-item-image');
            const selected = selectEl.options[selectEl.selectedIndex];
            if (selectEl.value && selected) {
                if (titleInput) titleInput.value = selectEl.value;
                if (imageInput) imageInput.value = selected.getAttribute('data-image') || '';
            }
        }

        function addCategoryItemRow(btn, presetTitle = '', presetImage = '') {
            const block = btn.closest('.create-category-block');
            const catIdx = block.getAttribute('data-cat-index');
            const itemsContainer = block.querySelector('.create-category-items');
            const itemIdx = parseInt(block.dataset.nextItemIndex || String(itemsContainer.children.length), 10);
            block.dataset.nextItemIndex = String(itemIdx + 1);
            const firstSelect = document.querySelector('#create-categories-list select');
            const optionsHtml = firstSelect ? firstSelect.innerHTML : '<option value="">-- Preset Item --</option>';

            const row = document.createElement('div');
            row.className = 'grid grid-cols-1 sm:grid-cols-12 gap-2 items-center';
            row.innerHTML = `
                <select onchange="applyCreateItemPreset(this)"
                        class="sm:col-span-3 min-w-0 px-2 py-1.5 bg-white border border-gray-300 rounded text-[11px] text-gray-700">${optionsHtml}</select>
                <input type="text" name="application_categories[${catIdx}][items][${itemIdx}][title]" placeholder="Item Title (e.g. Photo Books)"
                       class="create-item-title sm:col-span-3 min-w-0 px-2.5 py-1.5 bg-white border border-gray-300 rounded text-xs" />
                <input type="file" name="application_categories[${catIdx}][items][${itemIdx}][image_file]" accept="image/*"
                       class="sm:col-span-3 min-w-0 text-[11px] text-gray-600 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:bg-slate-100 bg-white border border-gray-200 rounded p-0.5" />
                <input type="text" name="application_categories[${catIdx}][items][${itemIdx}][image]" placeholder="Or image path (optional)"
                       class="create-item-image sm:col-span-2 min-w-0 px-2 py-1.5 bg-white border border-gray-300 rounded text-[11px] font-mono" />
                <button type="button" onclick="this.parentElement.remove()"
                        class="sm:col-span-1 px-2 py-1.5 text-xs text-red-600 hover:bg-red-50 rounded border border-red-200 cursor-pointer">
                    &times;
                </button>
            `;
            row.querySelector('.create-item-title').value = presetTitle;
            row.querySelector('.create-item-image').value = presetImage;
            if (presetTitle) {
                row.querySelector('select').value = presetTitle;
            }
            itemsContainer.appendChild(row);
        }
    </script>

</x-admin.layout>
