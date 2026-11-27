<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductApplicationCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductApplicationCategoryController
{
    /**
     * Store a newly created application category (from preset, existing category, or custom) for the product.
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        $presetKey = $request->input('preset_key');

        if (! empty($presetKey) && $presetKey !== 'custom') {
            $sortOrder = (int) $request->input('sort_order', $product->applicationCategories()->count() + 1);

            if (Str::startsWith($presetKey, 'existing:')) {
                $sourceId = (int) Str::after($presetKey, 'existing:');
                $sourceCategory = ProductApplicationCategory::with('items')->find($sourceId);

                if ($sourceCategory) {
                    $category = $product->applicationCategories()->create([
                        'title' => $sourceCategory->title,
                        'slug' => Str::slug($sourceCategory->title),
                        'has_carousel' => $sourceCategory->has_carousel,
                        'sort_order' => $sortOrder,
                    ]);

                    foreach ($sourceCategory->items as $idx => $sourceItem) {
                        $category->items()->create([
                            'title' => $sourceItem->title,
                            'slug' => $sourceItem->slug ?: Str::slug($sourceItem->title),
                            'image' => $sourceItem->image,
                            'alt' => $sourceItem->alt ?? $sourceItem->title,
                            'sort_order' => $idx + 1,
                        ]);
                    }

                    return back()->with('success', 'Category "'.$category->title.'" and its '.$sourceCategory->items->count().' items copied to '.$product->name.'!');
                }
            }

            $presets = ProductApplicationCategory::getPresets();
            if (isset($presets[$presetKey])) {
                $preset = $presets[$presetKey];
                $category = $product->applicationCategories()->create([
                    'title' => $preset['title'],
                    'slug' => Str::slug($preset['title']),
                    'has_carousel' => $preset['has_carousel'],
                    'sort_order' => $sortOrder,
                ]);

                foreach ($preset['items'] as $idx => $itemData) {
                    $category->items()->create([
                        'title' => $itemData['title'],
                        'slug' => Str::slug($itemData['title']),
                        'image' => $itemData['image'],
                        'alt' => $itemData['title'],
                        'sort_order' => $idx + 1,
                    ]);
                }

                return back()->with('success', 'Category "'.$category->title.'" with '.count($preset['items']).' pre-filled items added to '.$product->name.'!');
            }
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'has_carousel' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['has_carousel'] = $request->boolean('has_carousel', true);
        if (! isset($validated['sort_order'])) {
            $validated['sort_order'] = $product->applicationCategories()->count() + 1;
        }

        $category = $product->applicationCategories()->create($validated);

        return back()->with('success', 'Category "'.$category->title.'" added to '.$product->name.' successfully!');
    }

    /**
     * Update the specified application category.
     */
    public function update(Request $request, Product $product, ProductApplicationCategory $category): RedirectResponse
    {
        abort_unless($category->product_id === $product->id, 404);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'has_carousel' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['has_carousel'] = $request->boolean('has_carousel');

        $category->update($validated);

        return back()->with('success', 'Category "'.$category->title.'" updated successfully!');
    }

    /**
     * Remove the specified application category and its items.
     */
    public function destroy(Product $product, ProductApplicationCategory $category): RedirectResponse
    {
        abort_unless($category->product_id === $product->id, 404);

        $title = $category->title;
        $category->delete();

        return back()->with('success', 'Category "'.$title.'" removed from '.$product->name.' successfully!');
    }
}
