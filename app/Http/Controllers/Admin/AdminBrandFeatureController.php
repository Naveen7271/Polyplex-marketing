<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\BrandFeature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminBrandFeatureController
{
    /**
     * Store a newly created feature for the brand.
     */
    public function store(Request $request, Brand $brand): RedirectResponse
    {
        // Preset dropdown selection
        if ($request->filled('preset_key') && $request->input('preset_key') !== 'custom') {
            $presets = BrandFeature::getPresets();
            $key = $request->input('preset_key');

            if (isset($presets[$key])) {
                $preset = $presets[$key];
                $preset['sort_order'] = $request->input('sort_order', $brand->features()->count() + 1);

                $brand->features()->create($preset);

                return back()->with('success', 'Feature "'.$preset['title'].'" added to '.$brand->name.' successfully!');
            }
        }

        // Custom feature
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if (empty($validated['sort_order'])) {
            $validated['sort_order'] = $brand->features()->count() + 1;
        }

        $brand->features()->create($validated);

        return back()->with('success', 'Feature "'.$validated['title'].'" added to '.$brand->name.' successfully!');
    }

    /**
     * Update the specified feature.
     */
    public function update(Request $request, Brand $brand, BrandFeature $feature): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $feature->update($validated);

        return back()->with('success', 'Feature "'.$feature->title.'" updated successfully!');
    }

    /**
     * Remove the specified feature.
     */
    public function destroy(Brand $brand, BrandFeature $feature): RedirectResponse
    {
        $title = $feature->title;
        $feature->delete();

        return back()->with('success', 'Feature "'.$title.'" removed from '.$brand->name.' successfully!');
    }
}
