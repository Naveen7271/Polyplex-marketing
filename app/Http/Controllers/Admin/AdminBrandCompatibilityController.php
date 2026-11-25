<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\BrandCompatibility;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBrandCompatibilityController
{
    /**
     * Store a newly created compatibility technology for the brand.
     */
    public function store(Request $request, Brand $brand): RedirectResponse
    {
        // Dropdown preset selection
        if ($request->filled('preset_key') && $request->input('preset_key') !== 'custom') {
            $presets = BrandCompatibility::getPresets();
            $key = $request->input('preset_key');

            if (isset($presets[$key])) {
                $compData = $presets[$key];
                $compData['sort_order'] = $request->input('sort_order', $brand->compatibilities()->count() + 1);

                if ($request->filled('title')) {
                    $compData['title'] = $request->input('title');
                }
                if ($request->filled('description')) {
                    $compData['description'] = $request->input('description');
                }

                if ($request->hasFile('image_file')) {
                    $path = $request->file('image_file')->store('compatibilities', 'public');
                    $compData['image'] = 'storage/'.$path;
                }

                $brand->compatibilities()->create($compData);

                return redirect()->route('admin.brands.edit', $brand)
                    ->with('success', 'Compatibility technology "'.$compData['title'].'" added successfully!');
            }
        }

        // Custom compatibility
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:500'],
            'image_file' => ['nullable', 'file', 'image', 'max:10240'],
            'alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if (empty($validated['sort_order'])) {
            $validated['sort_order'] = $brand->compatibilities()->count() + 1;
        }

        if (empty($validated['alt'])) {
            $validated['alt'] = $validated['title'].' technology compatibility for '.$brand->name;
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('compatibilities', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);

        $brand->compatibilities()->create($validated);

        return redirect()->route('admin.brands.edit', $brand)
            ->with('success', 'Compatibility technology "'.$validated['title'].'" added successfully!');
    }

    /**
     * Update the specified compatibility technology.
     */
    public function update(Request $request, Brand $brand, BrandCompatibility $compatibility): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:500'],
            'image_file' => ['nullable', 'file', 'image', 'max:10240'],
            'alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->boolean('remove_image')) {
            if ($compatibility->image && Str::startsWith($compatibility->image, 'storage/')) {
                Storage::disk('public')->delete(Str::after($compatibility->image, 'storage/'));
            }
            $validated['image'] = null;
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('compatibilities', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);

        $compatibility->update($validated);

        return redirect()->route('admin.brands.edit', $brand)
            ->with('success', 'Compatibility technology "'.$compatibility->title.'" updated successfully!');
    }

    /**
     * Remove the specified compatibility technology from the brand.
     */
    public function destroy(Brand $brand, BrandCompatibility $compatibility): RedirectResponse
    {
        $title = $compatibility->title;

        if ($compatibility->image && Str::startsWith($compatibility->image, 'storage/')) {
            Storage::disk('public')->delete(Str::after($compatibility->image, 'storage/'));
        }

        $compatibility->delete();

        return redirect()->route('admin.brands.edit', $brand)
            ->with('success', 'Compatibility technology "'.$title.'" removed successfully!');
    }
}
