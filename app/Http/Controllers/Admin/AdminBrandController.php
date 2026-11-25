<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\BrandCompatibility;
use App\Models\BrandFeature;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminBrandController
{
    /**
     * Display a listing of all brands.
     */
    public function index(): View
    {
        $brands = Brand::withCount(['products', 'features'])->orderBy('name')->get();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new brand.
     */
    public function create(): View
    {
        $products = Product::orderBy('name')->get();
        $presetFeatures = BrandFeature::getPresets();
        $presetCompatibilities = BrandCompatibility::getPresets();

        return view('admin.brands.create', compact('products', 'presetFeatures', 'presetCompatibilities'));
    }

    /**
     * Store a newly created brand in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:brands,slug'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'string', 'max:500'],
            'logo_file' => ['nullable', 'file', 'image', 'max:10240'],
            'url' => ['nullable', 'string', 'max:500'],
            'alt' => ['nullable', 'string', 'max:255'],
            'banner' => ['nullable', 'string', 'max:500'],
            'banner_file' => ['nullable', 'file', 'image', 'max:10240'],
            'badge_description' => ['nullable', 'string'],
            'paragraphs' => ['nullable', 'string'],
            'statement' => ['nullable', 'string'],
            'compatibility_headline' => ['nullable', 'string'],
            'brochure_url' => ['nullable', 'string', 'max:500'],
            'brochure_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip', 'max:20480'],
            'product_ids' => ['nullable', 'array'],
            'product_ids.*' => ['exists:products,id'],
        ]);

        $validated['slug'] = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        // Auto-generate Target URL if empty
        if (empty($validated['url'])) {
            $validated['url'] = '/'.$validated['slug'];
        }

        if (empty($validated['alt'])) {
            $validated['alt'] = $validated['name'].(! empty($validated['subtitle']) ? ' - '.$validated['subtitle'] : '');
        }

        // File uploads
        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('brands/logos', 'public');
            $validated['logo'] = 'storage/'.$path;
        }

        if ($request->hasFile('banner_file')) {
            $path = $request->file('banner_file')->store('brands/banners', 'public');
            $validated['banner'] = 'storage/'.$path;
        }

        if ($request->hasFile('brochure_file')) {
            $path = $request->file('brochure_file')->store('brochures', 'public');
            $validated['brochure_url'] = 'storage/'.$path;
        }

        unset($validated['logo_file'], $validated['banner_file'], $validated['brochure_file']);

        $brand = Brand::create($validated);

        if (! empty($validated['product_ids'])) {
            $brand->products()->sync($validated['product_ids']);
        }

        return redirect()->route('admin.brands.edit', $brand)
            ->with('success', 'Brand "'.$brand->name.'" created successfully! You can now manage its features below.');
    }

    /**
     * Show the form for editing the specified brand.
     */
    public function edit(Brand $brand): View
    {
        $brand->load(['products', 'features', 'compatibilities']);
        $products = Product::orderBy('name')->get();
        $presetFeatures = BrandFeature::getPresets();
        $presetCompatibilities = BrandCompatibility::getPresets();

        return view('admin.brands.edit', compact('brand', 'products', 'presetFeatures', 'presetCompatibilities'));
    }

    /**
     * Update the specified brand in storage.
     */
    public function update(Request $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:brands,slug,'.$brand->id],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'string', 'max:500'],
            'logo_file' => ['nullable', 'file', 'image', 'max:10240'],
            'url' => ['nullable', 'string', 'max:500'],
            'alt' => ['nullable', 'string', 'max:255'],
            'banner' => ['nullable', 'string', 'max:500'],
            'banner_file' => ['nullable', 'file', 'image', 'max:10240'],
            'badge_description' => ['nullable', 'string'],
            'paragraphs' => ['nullable', 'string'],
            'statement' => ['nullable', 'string'],
            'compatibility_headline' => ['nullable', 'string'],
            'brochure_url' => ['nullable', 'string', 'max:500'],
            'brochure_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip', 'max:20480'],
            'product_ids' => ['nullable', 'array'],
            'product_ids.*' => ['exists:products,id'],
        ]);

        $validated['slug'] = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        if (empty($validated['url'])) {
            $validated['url'] = '/'.$validated['slug'];
        }

        if (empty($validated['alt'])) {
            $validated['alt'] = $validated['name'].(! empty($validated['subtitle']) ? ' - '.$validated['subtitle'] : '');
        }

        // Handle file removals
        if ($request->boolean('remove_logo')) {
            if ($brand->logo && Str::startsWith($brand->logo, 'storage/')) {
                Storage::disk('public')->delete(Str::after($brand->logo, 'storage/'));
            }
            $validated['logo'] = null;
        }

        if ($request->boolean('remove_banner')) {
            if ($brand->banner && Str::startsWith($brand->banner, 'storage/')) {
                Storage::disk('public')->delete(Str::after($brand->banner, 'storage/'));
            }
            $validated['banner'] = null;
        }

        if ($request->boolean('remove_brochure')) {
            if ($brand->brochure_url && Str::startsWith($brand->brochure_url, 'storage/')) {
                Storage::disk('public')->delete(Str::after($brand->brochure_url, 'storage/'));
            }
            $validated['brochure_url'] = null;
        }

        // File uploads
        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('brands/logos', 'public');
            $validated['logo'] = 'storage/'.$path;
        }

        if ($request->hasFile('banner_file')) {
            $path = $request->file('banner_file')->store('brands/banners', 'public');
            $validated['banner'] = 'storage/'.$path;
        }

        if ($request->hasFile('brochure_file')) {
            $path = $request->file('brochure_file')->store('brochures', 'public');
            $validated['brochure_url'] = 'storage/'.$path;
        }

        unset($validated['logo_file'], $validated['banner_file'], $validated['brochure_file']);

        $brand->update($validated);

        $brand->products()->sync($validated['product_ids'] ?? []);

        return redirect()->route('admin.brands.edit', $brand)
            ->with('success', 'Brand "'.$brand->name.'" updated successfully!');
    }

    /**
     * Remove the specified brand from storage.
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        $name = $brand->name;
        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand "'.$name.'" deleted successfully!');
    }
}
