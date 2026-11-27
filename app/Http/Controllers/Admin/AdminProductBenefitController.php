<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductBenefit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminProductBenefitController
{
    /**
     * Store a newly created benefit for the product.
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if (! isset($validated['sort_order'])) {
            $validated['sort_order'] = $product->benefits()->count() + 1;
        }

        $product->benefits()->create($validated);

        return back()->with('success', 'Key benefit added to '.$product->name.' successfully!');
    }

    /**
     * Update the specified benefit.
     */
    public function update(Request $request, Product $product, ProductBenefit $benefit): RedirectResponse
    {
        abort_unless($benefit->product_id === $product->id, 404);

        $validated = $request->validate([
            'content' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $benefit->update($validated);

        return back()->with('success', 'Key benefit updated successfully!');
    }

    /**
     * Remove the specified benefit from the product.
     */
    public function destroy(Product $product, ProductBenefit $benefit): RedirectResponse
    {
        abort_unless($benefit->product_id === $product->id, 404);

        $benefit->delete();

        return back()->with('success', 'Key benefit removed from '.$product->name.' successfully!');
    }
}
