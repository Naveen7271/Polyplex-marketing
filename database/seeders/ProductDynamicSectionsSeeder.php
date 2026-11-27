<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductApplicationCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductDynamicSectionsSeeder extends Seeder
{
    /**
     * Seed default dynamic benefits, impact banner, and application categories.
     */
    public function run(): void
    {
        $defaultBenefitsOverline = 'KEY BENEFITS';
        $defaultBenefitsTitle = 'Where the Material Makes a Difference';
        $defaultBenefitsDescription = 'Photobooks and albums benefit from pages designed for repeated handling. Selected commercial print applications, such as tags and speciality printed pieces, can also use non-tear media where tear resistance is a priority.';
        $defaultBenefits = [
            'Resistance to tearing compared with conventional paper, subject to the selected grade.',
            'Choice of product formats and finishes as per the available range.',
            'Potential for long-lasting handled print applications when the complete workflow is suitable.',
        ];

        $products = Product::with(['benefits', 'applicationCategories'])->get();

        foreach ($products as $product) {
            $updates = [];

            if (empty($product->benefits_overline)) {
                $updates['benefits_overline'] = $defaultBenefitsOverline;
            }
            if (empty($product->benefits_title)) {
                $updates['benefits_title'] = $defaultBenefitsTitle;
            }
            if (empty($product->benefits_description)) {
                $updates['benefits_description'] = $defaultBenefitsDescription;
            }

            if (! empty($updates)) {
                $product->update($updates);
            }

            if ($product->benefits->isEmpty()) {
                foreach ($defaultBenefits as $index => $content) {
                    $product->benefits()->create([
                        'content' => $content,
                        'sort_order' => $index + 1,
                    ]);
                }
            }
        }

        // Seed the full 8 application categories & 24 items on Non-Tear Media if it has none yet
        $nonTear = Product::with('applicationCategories')->where('slug', 'non-tear-media')->first();
        if ($nonTear && $nonTear->applicationCategories->isEmpty()) {
            $categories = array_values(ProductApplicationCategory::getPresets());

            foreach ($categories as $catIndex => $catData) {
                $category = $nonTear->applicationCategories()->create([
                    'title' => $catData['title'],
                    'slug' => Str::slug($catData['title']),
                    'has_carousel' => $catData['has_carousel'],
                    'sort_order' => $catIndex + 1,
                ]);

                foreach ($catData['items'] as $itemIndex => $itemData) {
                    $category->items()->create([
                        'title' => $itemData['title'],
                        'slug' => Str::slug($itemData['title']),
                        'image' => $itemData['image'],
                        'alt' => $itemData['title'],
                        'sort_order' => $itemIndex + 1,
                    ]);
                }
            }
        }
    }
}
