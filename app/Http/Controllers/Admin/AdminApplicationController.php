<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminApplicationController
{
    /**
     * Display a listing of all applications across products.
     */
    public function index(Request $request): View
    {
        $selectedProductId = $request->query('product_id');

        $query = ProductApplication::with('product')
            ->orderBy('product_id')
            ->orderBy('sort_order');

        if (! empty($selectedProductId)) {
            $query->where('product_id', $selectedProductId);
        }

        $applications = $query->get();
        $products = Product::orderBy('name')->get();

        return view('admin.applications.index', compact('applications', 'products', 'selectedProductId'));
    }

    /**
     * Show the form for creating a new application.
     */
    public function create(Request $request, ?Product $product = null): View
    {
        if (! $product && $request->filled('product_id')) {
            $product = Product::find($request->query('product_id'));
        }

        $products = Product::orderBy('name')->get();
        $presets = ProductApplication::getPresets();

        return view('admin.applications.create', compact('product', 'products', 'presets'));
    }

    /**
     * Store a newly created application in storage.
     */
    public function store(Request $request, ?Product $product = null): RedirectResponse
    {
        $productId = $product ? $product->id : $request->input('product_id');

        if (! $productId) {
            return back()->withErrors(['product_id' => 'Please select a product for this application.'])->withInput();
        }

        $targetProduct = $product ?? Product::findOrFail($productId);

        // Check if preset selected
        if ($request->filled('preset_key') && $request->input('preset_key') !== 'custom') {
            $presets = ProductApplication::getPresets();
            $key = $request->input('preset_key');

            if (isset($presets[$key])) {
                $appData = $presets[$key];
                $appData['product_id'] = $targetProduct->id;
                $appData['sort_order'] = $request->input('sort_order', $targetProduct->applications()->count() + 1);

                if ($request->filled('title')) {
                    $appData['title'] = $request->input('title');
                }
                if ($request->filled('description')) {
                    $appData['description'] = $request->input('description');
                }

                if ($request->hasFile('image_file')) {
                    $path = $request->file('image_file')->store('applications', 'public');
                    $appData['image'] = 'storage/'.$path;
                }

                $application = ProductApplication::create($appData);

                if ($product || $request->input('return_to') === 'product') {
                    return redirect()->route('admin.products.edit', $targetProduct)
                        ->with('success', 'Application "'.$application->title.'" added successfully!');
                }

                return redirect()->route('admin.applications.index')
                    ->with('success', 'Application "'.$application->title.'" added successfully to '.$targetProduct->name.'!');
            }
        }

        // Custom application
        $validated = $request->validate([
            'product_id' => [$product ? 'nullable' : 'required', 'exists:products,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:500'],
            'image_file' => ['nullable', 'file', 'image', 'max:10240'],
            'alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['product_id'] = $targetProduct->id;

        if (empty($validated['sort_order'])) {
            $validated['sort_order'] = $targetProduct->applications()->count() + 1;
        }

        if (empty($validated['alt'])) {
            $validated['alt'] = $validated['title'].' for '.$targetProduct->name;
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('applications', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);

        $application = ProductApplication::create($validated);

        if ($product || $request->input('return_to') === 'product') {
            return redirect()->route('admin.products.edit', $targetProduct)
                ->with('success', 'Application "'.$application->title.'" added successfully!');
        }

        return redirect()->route('admin.applications.index')
            ->with('success', 'Application "'.$application->title.'" added successfully to '.$targetProduct->name.'!');
    }

    /**
     * Show the form for editing the specified application.
     */
    public function edit(Request $request, ...$args): View
    {
        $application = count($args) === 2 ? $args[1] : $args[0];
        if (! ($application instanceof ProductApplication)) {
            $application = ProductApplication::findOrFail($application);
        }

        $product = count($args) === 2 ? $args[0] : $application->product;
        $products = Product::orderBy('name')->get();

        return view('admin.applications.edit', compact('product', 'products', 'application'));
    }

    /**
     * Update the specified application in storage.
     */
    public function update(Request $request, ...$args): RedirectResponse
    {
        $application = count($args) === 2 ? $args[1] : $args[0];
        if (! ($application instanceof ProductApplication)) {
            $application = ProductApplication::findOrFail($application);
        }

        $validated = $request->validate([
            'product_id' => ['nullable', 'exists:products,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:500'],
            'image_file' => ['nullable', 'file', 'image', 'max:10240'],
            'alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        // Handle file removal
        if ($request->boolean('remove_image')) {
            if ($application->image && Str::startsWith($application->image, 'storage/')) {
                Storage::disk('public')->delete(Str::after($application->image, 'storage/'));
            }
            $validated['image'] = null;
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('applications', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);

        $application->update($validated);

        if ((count($args) === 2 || $request->input('return_to') === 'product') && $application->product) {
            return redirect()->route('admin.products.edit', $application->product)
                ->with('success', 'Application "'.$application->title.'" updated successfully!');
        }

        return redirect()->route('admin.applications.index')
            ->with('success', 'Application "'.$application->title.'" updated successfully!');
    }

    /**
     * Remove the specified application from storage.
     */
    public function destroy(Request $request, ...$args): RedirectResponse
    {
        $application = count($args) === 2 ? $args[1] : $args[0];
        if (! ($application instanceof ProductApplication)) {
            $application = ProductApplication::findOrFail($application);
        }

        $title = $application->title;
        $product = $application->product;
        $application->delete();

        if ((count($args) === 2 || $request->input('return_to') === 'product') && $product) {
            return redirect()->route('admin.products.edit', $product)
                ->with('success', 'Application "'.$title.'" deleted successfully!');
        }

        return redirect()->back()
            ->with('success', 'Application "'.$title.'" deleted successfully!');
    }
}
