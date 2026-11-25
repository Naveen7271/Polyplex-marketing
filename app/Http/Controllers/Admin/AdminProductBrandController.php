<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductBrandController
{
    /**
     * Attach an existing brand to the product.
     */
    public function attach(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'brand_id' => ['required', 'exists:brands,id'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $sortOrder = $validated['sort_order'] ?? ($product->brands()->count() + 1);

        $product->brands()->syncWithoutDetaching([
            $validated['brand_id'] => ['sort_order' => $sortOrder],
        ]);

        $brand = Brand::find($validated['brand_id']);

        return back()->with('success', 'Brand "'.$brand->name.'" added to '.$product->name.' successfully!');
    }

    /**
     * Detach (remove) a brand from the product.
     */
    public function detach(Product $product, Brand $brand): RedirectResponse
    {
        $product->brands()->detach($brand->id);

        return back()->with('success', 'Brand "'.$brand->name.'" removed from '.$product->name.' successfully!');
    }

    /**
     * Create a new brand and attach it to the product.
     */
    public function storeAndAttach(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'string', 'max:500'],
            'url' => ['nullable', 'string', 'max:500'],
        ]);

        $slug = Str::slug($validated['name']);
        // Ensure unique slug
        $baseSlug = $slug;
        $counter = 1;
        while (Brand::where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$counter++;
        }

        $brand = Brand::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'subtitle' => $validated['subtitle'],
            'logo' => $validated['logo'],
            'alt' => $validated['name'].($validated['subtitle'] ? ' - '.$validated['subtitle'] : ''),
            'url' => $validated['url'] ?? '#'.$slug,
        ]);

        $product->brands()->attach($brand->id, [
            'sort_order' => $product->brands()->count() + 1,
        ]);

        return back()->with('success', 'New brand "'.$brand->name.'" created and added to '.$product->name.'!');
    }
}
