<x-admin.layout :page-title="'Brands'" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Brands' => route('admin.brands.index')]">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Brand Portfolio</h2>
            <p class="text-sm text-gray-500 mt-0.5">Manage all brands in your portfolio and their linked products</p>
        </div>
        <a href="{{ route('admin.brands.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#0E4174] hover:bg-[#0b3360] text-white text-sm font-semibold rounded-lg shadow-sm transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Brand
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        @if($brands->isEmpty())
            <div class="text-center py-16">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <h3 class="text-gray-500 font-medium mb-2">No brands found</h3>
                <p class="text-gray-400 text-sm mb-4">Get started by creating your first brand.</p>
                <a href="{{ route('admin.brands.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-[#0E4174] text-white text-sm font-medium rounded-lg hover:bg-[#0b3360] transition-colors">
                    Add First Brand
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                            <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Brand</th>
                            <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Subtitle</th>
                            <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Slug</th>
                            <th class="text-center px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Linked Products</th>
                            <th class="text-center px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Features</th>
                            <th class="text-right px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($brands as $brand)
                        <tr class="hover:bg-gray-50/60 transition-colors">
                            <td class="px-5 py-4 text-gray-400 text-xs">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-14 h-9 bg-white border border-gray-200 rounded flex items-center justify-center p-1 shrink-0 shadow-2xs">
                                        @if($brand->logo)
                                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" class="max-h-full max-w-full object-contain" />
                                        @else
                                            <span class="text-xs font-bold text-[#0E4174]">{{ substr($brand->name, 0, 4) }}</span>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $brand->name }}</div>
                                        <div class="text-xs text-gray-400 md:hidden line-clamp-1">{{ $brand->subtitle }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell text-gray-600 text-xs">
                                {{ $brand->subtitle ?? '—' }}
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell text-gray-400 font-mono text-xs">
                                {{ $brand->slug }}
                            </td>
                            <td class="px-5 py-4 text-center">
                                <span class="inline-block px-2.5 py-0.5 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold">
                                    {{ $brand->products_count }} {{ Str::plural('product', $brand->products_count) }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-center">
                                <span class="inline-block px-2.5 py-0.5 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold">
                                    {{ $brand->features_count }} {{ Str::plural('feature', $brand->features_count) }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.brands.edit', $brand) }}"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete brand &quot;{{ addslashes($brand->name) }}&quot;?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-colors cursor-pointer">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Delete
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

</x-admin.layout>
