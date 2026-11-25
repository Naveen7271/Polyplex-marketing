<x-admin.layout :page-title="'Products'" :breadcrumbs="['Dashboard' => route('admin.dashboard'), 'Products' => route('admin.products.index')]">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900">All Products</h2>
            <p class="text-sm text-gray-500 mt-0.5">Manage your product catalogue</p>
        </div>
        <a href="{{ route('admin.products.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#0E4174] hover:bg-[#0b3360] text-white text-sm font-semibold rounded-lg shadow-sm transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Product
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        @if($products->isEmpty())
            <div class="text-center py-16">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <h3 class="text-gray-500 font-medium mb-2">No products yet</h3>
                <p class="text-gray-400 text-sm mb-4">Get started by adding your first product.</p>
                <a href="{{ route('admin.products.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-[#0E4174] text-white text-sm font-medium rounded-lg hover:bg-[#0b3360] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add First Product
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                            <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Product Name</th>
                            <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Category</th>
                            <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Slug</th>
                            <th class="text-center px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Brands</th>
                            <th class="text-center px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Applications</th>
                            <th class="text-center px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="text-right px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($products as $product)
                        <tr class="hover:bg-gray-50/60 transition-colors">
                            <td class="px-5 py-4 text-gray-400 text-xs">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4">
                                <div class="font-semibold text-gray-900">{{ $product->name }}</div>
                                @if($product->short_description)
                                    <div class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ $product->short_description }}</div>
                                @endif
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell">
                                <span class="inline-block px-2.5 py-0.5 bg-blue-50 text-blue-700 rounded-full text-xs font-medium">{{ $product->category }}</span>
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell text-gray-400 font-mono text-xs">{{ $product->slug }}</td>
                            <td class="px-5 py-4 text-center">
                                <span class="inline-block px-2 py-0.5 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold">{{ $product->brands_count }}</span>
                            </td>
                            <td class="px-5 py-4 text-center">
                                <span class="inline-block px-2 py-0.5 bg-purple-50 text-purple-700 rounded-full text-xs font-semibold">{{ $product->applications_count }}</span>
                            </td>
                            <td class="px-5 py-4 text-center">
                                @if($product->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-green-50 text-green-700 rounded-full text-xs font-medium">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 bg-gray-100 text-gray-500 rounded-full text-xs font-medium">
                                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span> Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete &quot;{{ addslashes($product->name) }}&quot;? This will also delete all its applications.')">
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
