<x-admin.layout :page-title="'Add Application'" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Diverse Applications' => route('admin.applications.index'), 'Add Application' => '#']">

    <div class="max-w-3xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900">Add Application</h2>
            <p class="text-sm text-gray-500 mt-0.5">
                @if(isset($product) && $product)
                    Adding to product: <span class="font-semibold text-[#0E4174]">{{ $product->name }}</span>
                @else
                    Add an application use case for any product
                @endif
            </p>
        </div>

        <form action="{{ isset($product) && $product ? route('admin.products.applications.store', $product) : route('admin.applications.store') }}"
              method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-5">

                {{-- Product Selection --}}
                <div>
                    <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Target Product <span class="text-red-500">*</span>
                    </label>
                    <select id="product_id" name="product_id" required
                            class="w-full px-4 py-2.5 border rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition {{ $errors->has('product_id') ? 'border-red-400' : 'border-gray-300' }}">
                        <option value="">-- Select Product --</option>
                        @foreach($products as $p)
                            <option value="{{ $p->id }}" {{ (old('product_id', isset($product) ? $product->id : request('product_id')) == $p->id) ? 'selected' : '' }}>
                                {{ $p->name }} ({{ $p->category }})
                            </option>
                        @endforeach
                    </select>
                    @error('product_id') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Application Preset Selection --}}
                <div class="p-4 bg-gradient-to-r from-blue-50/70 to-indigo-50/70 border border-blue-200 rounded-xl space-y-2">
                    <label for="preset_key" class="block text-xs font-semibold uppercase tracking-wider text-[#0E4174]">
                        Quick Fill: Select From Application Presets
                    </label>
                    <p class="text-xs text-gray-600">Choose a predefined application to auto-populate title, description, and photo, or select Custom.</p>
                    <select id="preset_key" name="preset_key" onchange="applyApplicationPreset(this.value)"
                            class="w-full px-4 py-2.5 border border-blue-300 rounded-lg text-sm bg-white font-medium text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#0E4174]">
                        <option value="">-- Choose Preset or type Custom below --</option>
                        @foreach($presets as $key => $preset)
                            <option value="{{ $key }}"
                                    data-title="{{ $preset['title'] }}"
                                    data-desc="{{ $preset['description'] }}"
                                    data-image="{{ $preset['image'] }}"
                                    data-alt="{{ $preset['alt'] }}">
                                {{ $preset['title'] }} — ({{ Str::limit($preset['description'], 55) }})
                            </option>
                        @endforeach
                        <option value="custom">✏️ Custom Application (enter your own details)</option>
                    </select>
                </div>

                {{-- Preset Preview Box (dynamically displayed when preset chosen) --}}
                <div id="preset_preview" class="hidden p-3.5 bg-gray-50 border border-gray-200 rounded-lg flex items-center gap-4">
                    <img id="preset_preview_img" src="" alt="Preset preview" class="w-16 h-12 object-cover rounded border" />
                    <div class="text-xs">
                        <span class="font-semibold text-gray-800 block" id="preset_preview_title"></span>
                        <span class="text-gray-500 block truncate max-w-md" id="preset_preview_desc"></span>
                    </div>
                </div>

                {{-- Application Title --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Application Title <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="e.g. Wedding Albums"
                           class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition {{ $errors->has('title') ? 'border-red-400' : 'border-gray-300' }}" />
                    @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
                    <textarea id="description" name="description" rows="3" placeholder="Brief description of this application use case…"
                              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition resize-none">{{ old('description') }}</textarea>
                </div>

                {{-- Image File Upload --}}
                <div class="bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="image_file" class="block text-sm font-medium text-gray-800">
                            Application Image <span class="text-xs text-gray-500 font-normal">(Upload from device)</span>
                        </label>
                        <button type="button" onclick="document.getElementById('image_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                    </div>
                    <input type="file" id="image_file" name="image_file" accept="image/*"
                           class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                    <p class="text-[11px] text-gray-500">Supports JPG, PNG, WEBP up to 10MB.</p>

                    <div class="pt-1">
                        <label for="image" class="block text-xs text-gray-500 mb-1">Or direct image path / preset image:</label>
                        <input type="text" id="image" name="image" value="{{ old('image') }}" placeholder="images/products/applications/wedding-albums.jpg"
                               class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="alt" class="block text-sm font-medium text-gray-700 mb-1.5">Image Alt Text</label>
                        <input type="text" id="alt" name="alt" value="{{ old('alt') }}" placeholder="Descriptive alt text for accessibility"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1.5">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                    </div>
                </div>

            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#0E4174] hover:bg-[#0b3360] text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Add Application
                </button>
                <a href="{{ isset($product) && $product ? route('admin.products.edit', $product) : route('admin.applications.index') }}"
                   class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <script>
        function applyApplicationPreset(key) {
            const selector = document.getElementById('preset_key');
            const selectedOpt = selector.options[selector.selectedIndex];

            const previewBox = document.getElementById('preset_preview');
            const previewImg = document.getElementById('preset_preview_img');
            const previewTitle = document.getElementById('preset_preview_title');
            const previewDesc = document.getElementById('preset_preview_desc');

            if (!key || key === 'custom') {
                previewBox.classList.add('hidden');
                return;
            }

            const title = selectedOpt.dataset.title;
            const desc = selectedOpt.dataset.desc;
            const image = selectedOpt.dataset.image;
            const alt = selectedOpt.dataset.alt;

            if (title) document.getElementById('title').value = title;
            if (desc) document.getElementById('description').value = desc;
            if (image) document.getElementById('image').value = image;
            if (alt) document.getElementById('alt').value = alt;

            if (image) {
                previewImg.src = '{{ asset('') }}' + image;
                previewTitle.textContent = title;
                previewDesc.textContent = desc;
                previewBox.classList.remove('hidden');
            }
        }
    </script>

</x-admin.layout>
