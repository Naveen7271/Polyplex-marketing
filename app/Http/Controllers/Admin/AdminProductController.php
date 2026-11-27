<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductApplication;
use App\Models\ProductApplicationCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminProductController
{
    /**
     * Display admin dashboard with product listing.
     */
    public function dashboard(): View
    {
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        $totalApplications = ProductApplication::count();
        $totalBrands = Brand::count();

        return view('admin.dashboard', compact('totalProducts', 'activeProducts', 'totalApplications', 'totalBrands'));
    }

    /**
     * Display a listing of products.
     */
    public function index(): View
    {
        $products = Product::withCount(['applications', 'brands'])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        $categories = $this->getProductCategories();
        $allBrands = Brand::orderBy('name')->get();
        $presetApplicationCategories = ProductApplicationCategory::getPresets();
        $presetCategoryItems = ProductApplicationCategory::getItemPresets();

        return view('admin.products.create', compact(
            'categories',
            'allBrands',
            'presetApplicationCategories',
            'presetCategoryItems'
        ));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'category' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'banner_image' => ['nullable', 'string', 'max:500'],
            'banner_image_file' => ['nullable', 'file', 'image', 'max:10240'],
            'brochure_url' => ['nullable', 'string', 'max:500'],
            'brochure_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip', 'max:20480'],
            'benefits_overline' => ['nullable', 'string', 'max:120'],
            'benefits_title' => ['nullable', 'string', 'max:255'],
            'benefits_description' => ['nullable', 'string'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'brand_ids' => ['nullable', 'array'],
            'brand_ids.*' => ['exists:brands,id'],
            'benefits' => ['nullable', 'array'],
            'benefits.*' => ['nullable', 'string'],
            'application_categories' => ['nullable', 'array'],
            'application_categories.*.title' => ['nullable', 'string', 'max:255'],
            'application_categories.*.has_carousel' => ['nullable', 'boolean'],
            'application_categories.*.items' => ['nullable', 'array'],
            'application_categories.*.items.*.title' => ['nullable', 'string', 'max:255'],
            'application_categories.*.items.*.image' => ['nullable', 'string', 'max:500'],
            'application_categories.*.items.*.image_file' => ['nullable', 'file', 'image', 'max:10240'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['category'] = ! empty($validated['category']) ? $validated['category'] : $validated['name'];
        $validated['is_active'] = $request->boolean('is_active', true);

        // Handle file uploads
        if ($request->hasFile('banner_image_file')) {
            $path = $request->file('banner_image_file')->store('products/banners', 'public');
            $validated['banner_image'] = 'storage/'.$path;
        }

        if ($request->hasFile('brochure_file')) {
            $path = $request->file('brochure_file')->store('brochures', 'public');
            $validated['brochure_url'] = 'storage/'.$path;
        }

        unset(
            $validated['banner_image_file'],
            $validated['brochure_file'],
            $validated['benefits'],
            $validated['application_categories']
        );

        $product = Product::create($validated);

        // Attach selected brands
        if (! empty($validated['brand_ids'])) {
            $product->brands()->sync($validated['brand_ids']);
        }

        // Create initial key benefits
        $benefitOrder = 1;
        foreach ($request->input('benefits', []) as $benefitContent) {
            $trimmed = trim((string) $benefitContent);
            if ($trimmed !== '') {
                $product->benefits()->create([
                    'content' => $trimmed,
                    'sort_order' => $benefitOrder++,
                ]);
            }
        }

        // Create initial application categories and items
        $categoryOrder = 1;
        foreach ($request->input('application_categories', []) as $catIdx => $catInput) {
            $catTitle = trim((string) ($catInput['title'] ?? ''));
            if ($catTitle === '') {
                continue;
            }

            $category = $product->applicationCategories()->create([
                'title' => $catTitle,
                'slug' => Str::slug($catTitle),
                'has_carousel' => filter_var($catInput['has_carousel'] ?? true, FILTER_VALIDATE_BOOLEAN),
                'sort_order' => $categoryOrder++,
            ]);

            $itemOrder = 1;
            foreach ($catInput['items'] ?? [] as $itemIdx => $itemInput) {
                $itemTitle = trim((string) ($itemInput['title'] ?? ''));
                if ($itemTitle === '') {
                    continue;
                }

                $itemImage = ! empty($itemInput['image']) ? trim((string) $itemInput['image']) : null;
                if ($request->hasFile("application_categories.{$catIdx}.items.{$itemIdx}.image_file")) {
                    $path = $request->file("application_categories.{$catIdx}.items.{$itemIdx}.image_file")
                        ->store('products/application-items', 'public');
                    $itemImage = 'storage/'.$path;
                }

                $category->items()->create([
                    'title' => $itemTitle,
                    'slug' => Str::slug($itemTitle),
                    'image' => $itemImage,
                    'alt' => $itemTitle,
                    'sort_order' => $itemOrder++,
                ]);
            }
        }

        return redirect()->route('admin.products.edit', $product)
            ->with('success', 'Product "'.$validated['name'].'" created successfully! You can now manage its brands, benefits, and application categories below.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        $categories = $this->getProductCategories();
        $product->load(['brands', 'benefits', 'applicationCategories.items']);
        $allBrands = Brand::orderBy('name')->get();
        $presetApplicationCategories = ProductApplicationCategory::getPresets();
        $presetCategoryItems = ProductApplicationCategory::getItemPresets();
        $existingApplicationCategories = ProductApplicationCategory::with(['product', 'items'])
            ->where('product_id', '!=', $product->id)
            ->orderBy('title')
            ->get();

        return view('admin.products.edit', compact(
            'product',
            'categories',
            'allBrands',
            'presetApplicationCategories',
            'presetCategoryItems',
            'existingApplicationCategories'
        ));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $section = $request->input('_section');

        if ($section === 'benefits_header') {
            $validated = $request->validate([
                'benefits_overline' => ['nullable', 'string', 'max:120'],
                'benefits_title' => ['nullable', 'string', 'max:255'],
                'benefits_description' => ['nullable', 'string'],
            ]);

            $product->update($validated);

            return redirect()->route('admin.products.edit', $product)
                ->with('success', 'Key Benefits header updated successfully!');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug,'.$product->id],
            'category' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'banner_image' => ['nullable', 'string', 'max:500'],
            'banner_image_file' => ['nullable', 'file', 'image', 'max:10240'],
            'brochure_url' => ['nullable', 'string', 'max:500'],
            'brochure_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip', 'max:20480'],
            'benefits_overline' => ['nullable', 'string', 'max:120'],
            'benefits_title' => ['nullable', 'string', 'max:255'],
            'benefits_description' => ['nullable', 'string'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['category'] = ! empty($validated['category']) ? $validated['category'] : ($product->category ?: $validated['name']);
        $validated['is_active'] = $request->boolean('is_active', true);

        // Handle file removals
        if ($request->boolean('remove_banner_image')) {
            if ($product->banner_image && Str::startsWith($product->banner_image, 'storage/')) {
                Storage::disk('public')->delete(Str::after($product->banner_image, 'storage/'));
            }
            $validated['banner_image'] = null;
        }

        if ($request->boolean('remove_brochure')) {
            if ($product->brochure_url && Str::startsWith($product->brochure_url, 'storage/')) {
                Storage::disk('public')->delete(Str::after($product->brochure_url, 'storage/'));
            }
            $validated['brochure_url'] = null;
        }

        // Handle file uploads
        if ($request->hasFile('banner_image_file')) {
            $path = $request->file('banner_image_file')->store('products/banners', 'public');
            $validated['banner_image'] = 'storage/'.$path;
        }

        if ($request->hasFile('brochure_file')) {
            $path = $request->file('brochure_file')->store('brochures', 'public');
            $validated['brochure_url'] = 'storage/'.$path;
        }

        unset($validated['banner_image_file'], $validated['brochure_file']);

        $product->update($validated);

        return redirect()->route('admin.products.edit', $product)
            ->with('success', 'Product "'.$product->name.'" updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $name = $product->name;
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "'.$name.'" deleted successfully!');
    }

    /**
     * Get available product categories.
     *
     * @return list<string>
     */
    private function getProductCategories(): array
    {
        return [
            'Non-Tear Media',
            'Gloss Art Paper Media',
            'Inkjet Photo Media',
            'Digital Labels',
            'Multi-Purpose Labels',
            'Digital Wide-Format Media',
            'Reprographic Media',
            'Polyester Offset Plates',
            'Laser & Inkjet Positive Films',
        ];
    }
}
