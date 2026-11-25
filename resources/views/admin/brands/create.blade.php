<x-admin.layout :page-title="'Add Brand'" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Brands' => route('admin.brands.index'), 'Add Brand' => '#']">

    <div class="max-w-2xl">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900">Add New Brand</h2>
            <p class="text-sm text-gray-500 mt-0.5">Create a brand in the Polyplex portfolio</p>
        </div>

        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Brand Name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. NovaLife"
                               class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition {{ $errors->has('name') ? 'border-red-400' : 'border-gray-300' }}" />
                        @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">Slug <span class="text-gray-400 font-normal">(auto-generated)</span></label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" placeholder="e.g. novalife"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                        @error('slug') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1.5">Subtitle / Tagline</label>
                        <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" placeholder="e.g. Premium Non-tear Media"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                    </div>

                    {{-- Logo Upload --}}
                    <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="logo_file" class="block text-sm font-medium text-gray-800">
                                Brand Logo Image <span class="text-xs text-gray-500 font-normal">(Upload from device)</span>
                            </label>
                            <button type="button" onclick="document.getElementById('logo_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                        </div>
                        <input type="file" id="logo_file" name="logo_file" accept="image/*"
                               class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                        <p class="text-[11px] text-gray-500">Supports PNG, JPG, WEBP, SVG up to 10MB.</p>
                        <div class="pt-1">
                            <label for="logo" class="block text-xs text-gray-500 mb-1">Or existing image path (optional):</label>
                            <input type="text" id="logo" name="logo" value="{{ old('logo') }}" placeholder="images/brands/logos/novalife.png"
                                   class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                        </div>
                    </div>

                    {{-- Target URL Auto-Generated --}}
                    <div class="sm:col-span-2 bg-blue-50/50 p-3.5 rounded-lg border border-blue-100 flex items-start justify-between gap-3">
                        <div class="space-y-0.5">
                            <span class="text-xs font-semibold text-[#0E4174] uppercase tracking-wider">Target URL (Auto-Generated)</span>
                            <p class="text-xs text-gray-600">The destination page URL is automatically generated from the slug (e.g. <code>/{slug}</code> &rarr; <code>/novalife</code>). You can optionally override it below:</p>
                        </div>
                        <input type="text" id="url" name="url" value="{{ old('url') }}" placeholder="Default: /{slug}"
                               class="max-w-xs w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono bg-white focus:outline-none focus:ring-1 focus:ring-[#0E4174]" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="alt" class="block text-sm font-medium text-gray-700 mb-1.5">Logo Alt Text</label>
                        <input type="text" id="alt" name="alt" value="{{ old('alt') }}" placeholder="NovaLife - Premium Non-tear Media"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                    </div>

                    {{-- Page Hero Banner Upload --}}
                    <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="banner_file" class="block text-sm font-medium text-gray-800">
                                Page Hero Banner Image <span class="text-xs text-gray-500 font-normal">(Upload from device)</span>
                            </label>
                            <button type="button" onclick="document.getElementById('banner_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                        </div>
                        <input type="file" id="banner_file" name="banner_file" accept="image/*"
                               class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                        <p class="text-[11px] text-gray-500">Banner displayed at top of dedicated brand page. Supports PNG, JPG, WEBP up to 10MB.</p>
                        <div class="pt-1">
                            <label for="banner" class="block text-xs text-gray-500 mb-1">Or existing banner path (optional):</label>
                            <input type="text" id="banner" name="banner" value="{{ old('banner') }}" placeholder="images/products/banner-non-tear.jpg"
                                   class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                        </div>
                    </div>

                    {{-- Brochure Upload --}}
                    <div class="sm:col-span-2 bg-gray-50/70 p-4 rounded-xl border border-gray-200 space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="brochure_file" class="block text-sm font-medium text-gray-800">
                                Brochure Document File <span class="text-xs text-gray-500 font-normal">(Upload PDF / Doc)</span>
                            </label>
                            <button type="button" onclick="document.getElementById('brochure_file').value=''" class="text-[11px] text-gray-400 hover:text-red-600 cursor-pointer">Clear chosen file</button>
                        </div>
                        <input type="file" id="brochure_file" name="brochure_file" accept=".pdf,.doc,.docx,.zip"
                               class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#0E4174] file:text-white hover:file:bg-[#0b3360] cursor-pointer border border-gray-300 rounded-lg p-1.5 bg-white" />
                        <p class="text-[11px] text-gray-500">File download linked on brand hero &amp; pages. Supports PDF, DOC, DOCX up to 20MB.</p>
                        <div class="pt-1">
                            <label for="brochure_url" class="block text-xs text-gray-500 mb-1">Or external brochure link (optional):</label>
                            <input type="text" id="brochure_url" name="brochure_url" value="{{ old('brochure_url') }}" placeholder="#download-brochure or https://..."
                                   class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs font-mono focus:outline-none focus:ring-1 focus:ring-[#0E4174] transition" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="badge_description" class="block text-sm font-medium text-gray-700 mb-1.5">Badge Summary Description</label>
                        <textarea id="badge_description" name="badge_description" rows="2" placeholder="Brief summary under badge on hero banner…"
                                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition resize-none">{{ old('badge_description') }}</textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="paragraphs" class="block text-sm font-medium text-gray-700 mb-1.5">Narrative Paragraphs (separate with double Enter)</label>
                        <textarea id="paragraphs" name="paragraphs" rows="3" placeholder="Detailed brand overview paragraphs…"
                                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition resize-none">{{ old('paragraphs') }}</textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="statement" class="block text-sm font-medium text-gray-700 mb-1.5">Statement Banner Text</label>
                        <input type="text" id="statement" name="statement" value="{{ old('statement') }}" placeholder="Callout banner statement…"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="compatibility_headline" class="block text-sm font-medium text-gray-700 mb-1.5">Compatibility Section Headline</label>
                        <input type="text" id="compatibility_headline" name="compatibility_headline" value="{{ old('compatibility_headline') }}" placeholder="e.g. NovaJet supports multiple digital printing technologies, providing flexibility across different production environments."
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#0E4174] transition" />
                    </div>
                </div>

                {{-- Products Link Selection --}}
                <div class="pt-4 border-t border-gray-200">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-[#0E4174] mb-2">
                        Associate with Products
                    </label>
                    <p class="text-xs text-gray-500 mb-3">Select which products feature this brand in their "Explore our Brands" section.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        @foreach($products as $p)
                            <label class="flex items-center gap-2 p-2 border border-gray-200 rounded hover:bg-blue-50/50 cursor-pointer text-xs text-gray-800 transition-colors">
                                <input type="checkbox" name="product_ids[]" value="{{ $p->id }}"
                                       class="rounded text-[#0E4174] focus:ring-[#0E4174]" />
                                <span class="font-medium">{{ $p->name }}</span>
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
                    Create Brand
                </button>
                <a href="{{ route('admin.brands.index') }}"
                   class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</x-admin.layout>
