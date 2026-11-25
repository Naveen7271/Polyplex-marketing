<x-admin.layout :page-title="'Designed for Diverse Applications'" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Diverse Applications' => '#']">

    <div class="space-y-6">

        {{-- Top Bar & Actions --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-900">Designed for Diverse Applications</h2>
                <p class="text-sm text-gray-500 mt-0.5">Manage use case applications shown under products (e.g. Wedding Albums, Travel Albums, Bottle Labels)</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.applications.create', $selectedProductId ? ['product_id' => $selectedProductId] : []) }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#0E4174] hover:bg-[#0b3360] text-white text-sm font-semibold rounded-lg shadow-sm transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Application
                </a>
            </div>
        </div>

        {{-- Filter by Product Bar --}}
        <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
            <form action="{{ route('admin.applications.index') }}" method="GET" class="flex items-center gap-3 flex-1">
                <label for="product_filter" class="text-xs font-semibold uppercase tracking-wider text-gray-500 whitespace-nowrap">Filter by Product:</label>
                <select name="product_id" id="product_filter" onchange="this.form.submit()"
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#0E4174] max-w-sm w-full">
                    <option value="">All Products ({{ $applications->count() }} applications)</option>
                    @foreach($products as $prod)
                        <option value="{{ $prod->id }}" {{ (string)$selectedProductId === (string)$prod->id ? 'selected' : '' }}>
                            {{ $prod->name }}
                        </option>
                    @endforeach
                </select>
                @if($selectedProductId)
                    <a href="{{ route('admin.applications.index') }}" class="text-xs text-blue-600 hover:underline">Clear Filter</a>
                @endif
            </form>
            <div class="text-xs text-gray-500">
                Showing <span class="font-semibold text-gray-800">{{ $applications->count() }}</span> applications
            </div>
        </div>

        {{-- Applications Table --}}
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            @if($applications->isEmpty())
                <div class="text-center py-16 px-4">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-[#0E4174]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">No Applications Found</h3>
                    <p class="text-gray-500 text-sm max-w-sm mx-auto mb-5">
                        @if($selectedProductId)
                            No applications assigned to the selected product yet.
                        @else
                            No applications added yet. Start by adding diverse application use cases.
                        @endif
                    </p>
                    <a href="{{ route('admin.applications.create', $selectedProductId ? ['product_id' => $selectedProductId] : []) }}"
                       class="inline-flex items-center gap-2 px-4 py-2 bg-[#0E4174] hover:bg-[#0b3360] text-white text-sm font-semibold rounded-lg shadow-sm transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Add First Application
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3.5">Image</th>
                                <th class="px-6 py-3.5">Application Title</th>
                                <th class="px-6 py-3.5">Associated Product</th>
                                <th class="px-6 py-3.5">Description</th>
                                <th class="px-6 py-3.5 text-center">Order</th>
                                <th class="px-6 py-3.5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($applications as $app)
                                <tr class="hover:bg-gray-50/70 transition-colors">
                                    {{-- Thumbnail --}}
                                    <td class="px-6 py-3.5 whitespace-nowrap">
                                        @if($app->image)
                                            <div class="w-14 h-10 rounded-lg overflow-hidden border border-gray-200 bg-gray-50 flex items-center justify-center">
                                                <img src="{{ asset($app->image) }}" alt="{{ $app->alt ?? $app->title }}" class="w-full h-full object-cover" />
                                            </div>
                                        @else
                                            <div class="w-14 h-10 rounded-lg border border-dashed border-gray-300 bg-gray-50 flex items-center justify-center text-gray-400 text-[10px]">
                                                No image
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Title --}}
                                    <td class="px-6 py-3.5 font-semibold text-gray-900 whitespace-nowrap">
                                        {{ $app->title }}
                                    </td>

                                    {{-- Product --}}
                                    <td class="px-6 py-3.5 whitespace-nowrap">
                                        @if($app->product)
                                            <a href="{{ route('admin.products.edit', $app->product) }}"
                                               class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-blue-50 text-[#0E4174] hover:bg-blue-100 rounded-md text-xs font-semibold transition-colors">
                                                <span>{{ $app->product->name }}</span>
                                                <svg class="w-3 h-3 text-[#0E4174]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </a>
                                        @else
                                            <span class="text-xs text-gray-400">Unassigned</span>
                                        @endif
                                    </td>

                                    {{-- Description --}}
                                    <td class="px-6 py-3.5 text-xs text-gray-600 max-w-xs truncate">
                                        {{ $app->description ?? '—' }}
                                    </td>

                                    {{-- Sort Order --}}
                                    <td class="px-6 py-3.5 text-center text-xs font-mono text-gray-500 whitespace-nowrap">
                                        {{ $app->sort_order }}
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-3.5 text-right whitespace-nowrap space-x-2">
                                        <a href="{{ route('admin.applications.edit', $app) }}"
                                           class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium text-[#0E4174] hover:text-[#0b3360] hover:bg-blue-50 rounded transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.applications.destroy', $app) }}" method="POST" class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete &quot;{{ addslashes($app->title) }}&quot;?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded transition-colors cursor-pointer">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete
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

</x-admin.layout>
