<x-admin.layout :page-title="'Edit Application: ' . $application->title" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Diverse Applications' => route('admin.applications.index'), $application->title => '#']">

    <div class="max-w-3xl">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-gray-900">Edit Application</h2>
                <p class="text-sm text-gray-500 mt-0.5">
                    Currently associated with: <span class="font-semibold text-[#0E4174]">{{ $application->product ? $application->product->name : 'Unassigned' }}</span>
                </p>
            </div>
            @if($application->product)
                <a href="{{ route('products.show', $application->product->slug) }}" target="_blank"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 text-[#0E4174] hover:bg-blue-100 rounded-lg text-xs font-semibold transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    View Product Page
                </a>
            @endif
        </div>

        <form action="{{ route('admin.applications.update', $application) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-5">

                {{-- Product Selection --}}
                <div>
                    <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Target Product <span class="text-red-500">*</span>
                    </label>
                    <select id="product_id" name="product_id" required
                            class="w-full px-4 py-2.5 border rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition {{ $errors->has('product_id') ? 'border-red-400' : 'border-gray-300' }}">
                        @foreach($products as $p)
                            <option value="{{ $p->id }}" {{ old('product_id', $application->product_id) == $p->id ? 'selected' : '' }}>
                                {{ $p->name }} ({{ $p->category }})
                            </option>
                        @endforeach
                    </select>
                    @error('product_id') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Title --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Application Title <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $application->title) }}" required
                           class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition {{ $errors->has('title') ? 'border-red-400' : 'border-gray-300' }}" />
                    @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
                    <textarea id="description" name="description" rows="3"
                              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition resize-none">{{ old('description', $application->description) }}</textarea>
                </div>

                {{-- Image Upload & Current Image Preview --}}
                <div class="bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-3">
                    <label class="block text-sm font-medium text-gray-800">Application Image</label>

                    @if(!empty($application->image))
                        <div class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg gap-3">
                            <div class="flex items-center gap-4 truncate">
                                <div class="w-20 h-14 bg-gray-50 border border-gray-200 rounded flex items-center justify-center p-1 shrink-0 overflow-hidden">
                                    <img src="{{ asset($application->image) }}" alt="{{ $application->alt ?? $application->title }}" class="w-full h-full object-cover rounded" />
                                </div>
                                <div class="text-xs truncate flex-1">
                                    <span class="inline-block px-2 py-0.5 bg-blue-50 text-[#0E4174] font-semibold rounded mb-1">Current Image</span>
                                    <p class="font-mono text-gray-500 truncate text-[11px]">{{ $application->image }}</p>
                                </div>
                            </div>
                            <label class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 rounded-lg border border-red-200 cursor-pointer transition-colors shrink-0">
                                <input type="checkbox" name="remove_image" value="1" class="rounded text-red-600 focus:ring-red-500">
                                <span>Remove Image</span>
                            </label>
                        </div>
                    @endif

                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label for="image_file" class="block text-xs font-medium text-gray-700">
                                {{ !empty($application->image) ? 'Upload New Image to Replace:' : 'Upload Image from Device:' }}
                            </label>
                            <button type="button" onclick="document.getElementById('image_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                        </div>
                        <input type="file" id="image_file" name="image_file" accept="image/*"
                               class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                        <p class="text-[11px] text-gray-500 mt-1">Supports JPG, PNG, WEBP up to 10MB.</p>
                    </div>

                    <div class="pt-1">
                        <label for="image" class="block text-xs text-gray-500 mb-1">Or direct image path:</label>
                        <input type="text" id="image" name="image" value="{{ old('image', $application->image) }}" placeholder="images/products/applications/wedding-albums.jpg"
                               class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="alt" class="block text-sm font-medium text-gray-700 mb-1.5">Image Alt Text</label>
                        <input type="text" id="alt" name="alt" value="{{ old('alt', $application->alt) }}" placeholder="Descriptive alt text for accessibility"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1.5">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $application->sort_order) }}" min="0"
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
                    Save Changes
                </button>
                <a href="{{ route('admin.applications.index') }}"
                   class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</x-admin.layout>
