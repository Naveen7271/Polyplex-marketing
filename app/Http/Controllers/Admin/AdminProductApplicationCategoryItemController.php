<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductApplicationCategory;
use App\Models\ProductApplicationCategoryItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductApplicationCategoryItemController
{
    /**
     * Store a newly created application item (from preset or custom) under a category.
     */
    public function store(Request $request, Product $product, ProductApplicationCategory $category): RedirectResponse
    {
        abort_unless($category->product_id === $product->id, 404);

        $presetKey = $request->input('preset_key');

        if (! empty($presetKey) && $presetKey !== 'custom') {
            $itemPresets = ProductApplicationCategory::getItemPresets();
            if (isset($itemPresets[$presetKey])) {
                $preset = $itemPresets[$presetKey];
                $title = $request->filled('title') ? trim((string) $request->input('title')) : $preset['title'];
                $image = $request->filled('image') ? trim((string) $request->input('image')) : $preset['image'];

                if ($request->hasFile('image_file')) {
                    $path = $request->file('image_file')->store('products/application-items', 'public');
                    $image = 'storage/'.$path;
                }

                $item = $category->items()->create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'image' => $image,
                    'alt' => $title,
                    'sort_order' => (int) $request->input('sort_order', $category->items()->count() + 1),
                ]);

                return back()->with('success', 'Application item "'.$item->title.'" added under '.$category->title.'!');
            }
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:500'],
            'image_file' => ['nullable', 'file', 'image', 'max:10240'],
            'alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['alt'] = ! empty($validated['alt']) ? $validated['alt'] : $validated['title'];

        if (! isset($validated['sort_order'])) {
            $validated['sort_order'] = $category->items()->count() + 1;
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('products/application-items', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);

        $item = $category->items()->create($validated);

        return back()->with('success', 'Application item "'.$item->title.'" added under '.$category->title.'!');
    }

    /**
     * Update the specified application item under a category.
     */
    public function update(
        Request $request,
        Product $product,
        ProductApplicationCategory $category,
        ProductApplicationCategoryItem $item
    ): RedirectResponse {
        abort_unless($category->product_id === $product->id, 404);
        abort_unless($item->product_application_category_id === $category->id, 404);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:500'],
            'image_file' => ['nullable', 'file', 'image', 'max:10240'],
            'alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['alt'] = ! empty($validated['alt']) ? $validated['alt'] : $validated['title'];

        if ($request->boolean('remove_image')) {
            if ($item->image && Str::startsWith($item->image, 'storage/')) {
                Storage::disk('public')->delete(Str::after($item->image, 'storage/'));
            }
            $validated['image'] = null;
        }

        if ($request->hasFile('image_file')) {
            if ($item->image && Str::startsWith($item->image, 'storage/')) {
                Storage::disk('public')->delete(Str::after($item->image, 'storage/'));
            }
            $path = $request->file('image_file')->store('products/application-items', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);

        $item->update($validated);

        return back()->with('success', 'Application item "'.$item->title.'" updated successfully!');
    }

    /**
     * Remove the specified application item from the category.
     */
    public function destroy(
        Product $product,
        ProductApplicationCategory $category,
        ProductApplicationCategoryItem $item
    ): RedirectResponse {
        abort_unless($category->product_id === $product->id, 404);
        abort_unless($item->product_application_category_id === $category->id, 404);

        if ($item->image && Str::startsWith($item->image, 'storage/')) {
            Storage::disk('public')->delete(Str::after($item->image, 'storage/'));
        }

        $title = $item->title;
        $item->delete();

        return back()->with('success', 'Application item "'.$title.'" removed from '.$category->title.'!');
    }
}
