<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductApplicationCategory;
use App\Models\ProductApplicationCategoryItem;
use App\Models\ProductBenefit;
use Database\Seeders\ProductDynamicSectionsSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductDynamicSectionsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Admin session payload used by authenticated requests.
     *
     * @return array<string, mixed>
     */
    private function adminSession(): array
    {
        return [
            'admin_logged_in' => true,
            'admin_email' => 'admin@polyplex.in',
        ];
    }

    public function test_admin_can_update_product_benefits_header(): void
    {
        $product = Product::create([
            'name' => 'Gloss Art Paper Media',
            'slug' => 'gloss-art-paper-media',
            'category' => 'Gloss Art Paper Media',
            'is_active' => true,
        ]);

        $response = $this->withSession($this->adminSession())
            ->put(route('admin.products.update', $product), [
                'name' => 'Gloss Art Paper Media',
                'slug' => 'gloss-art-paper-media',
                'benefits_overline' => 'GLOSS HIGHLIGHTS',
                'benefits_title' => 'Vibrant Colour Across Every Sheet',
                'benefits_description' => 'Smooth gloss coating engineered for sharp imagery.',
                'is_active' => '1',
            ]);

        $response->assertRedirect(route('admin.products.edit', $product));

        $product->refresh();
        $this->assertEquals('GLOSS HIGHLIGHTS', $product->benefits_overline);
        $this->assertEquals('Vibrant Colour Across Every Sheet', $product->benefits_title);
        $this->assertEquals('Smooth gloss coating engineered for sharp imagery.', $product->benefits_description);

        $product->benefits()->create([
            'content' => 'High-gloss surface tuned for rich photographic detail.',
            'sort_order' => 1,
        ]);

        $page = $this->get(route('products.show', $product->slug));
        $page->assertStatus(200);
        $page->assertSee('GLOSS HIGHLIGHTS');
        $page->assertSee('Vibrant Colour Across Every Sheet');
        $page->assertSee('Smooth gloss coating engineered for sharp imagery.');
        $page->assertSee('High-gloss surface tuned for rich photographic detail.');
        $page->assertSee('Applications That Make an Impact');
    }

    public function test_admin_can_add_edit_and_delete_product_key_benefits(): void
    {
        $product = Product::create([
            'name' => 'Inkjet Photo Media',
            'slug' => 'inkjet-photo-media',
            'category' => 'Inkjet Photo Media',
            'benefits_title' => 'Resin-Coated Precision',
            'is_active' => true,
        ]);

        // Add a benefit
        $this->withSession($this->adminSession())
            ->post(route('admin.products.benefits.store', $product), [
                'content' => 'Instant-dry microporous coating for smudge-free prints.',
                'sort_order' => 1,
            ])
            ->assertRedirect();

        $benefit = ProductBenefit::firstOrFail();
        $this->assertEquals($product->id, $benefit->product_id);

        // Edit the benefit
        $this->withSession($this->adminSession())
            ->put(route('admin.products.benefits.update', [$product, $benefit]), [
                'content' => 'Archival-grade pigment and dye ink receptivity.',
                'sort_order' => 2,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('product_benefits', [
            'id' => $benefit->id,
            'content' => 'Archival-grade pigment and dye ink receptivity.',
            'sort_order' => 2,
        ]);

        // Verify visible on product page
        $this->get(route('products.show', $product->slug))
            ->assertStatus(200)
            ->assertSee('Resin-Coated Precision')
            ->assertSee('Archival-grade pigment and dye ink receptivity.');

        // Delete the benefit
        $this->withSession($this->adminSession())
            ->delete(route('admin.products.benefits.destroy', [$product, $benefit]))
            ->assertRedirect();

        $this->assertDatabaseMissing('product_benefits', ['id' => $benefit->id]);

        // Verify removed from product page without falling back to Non-Tear hardcoded text
        $this->get(route('products.show', $product->slug))
            ->assertStatus(200)
            ->assertDontSee('Archival-grade pigment and dye ink receptivity.')
            ->assertDontSee('Resistance to tearing compared with conventional paper');
    }

    public function test_admin_can_manage_application_categories_and_items_with_images(): void
    {
        Storage::fake('public');

        $product = Product::create([
            'name' => 'Digital Labels',
            'slug' => 'digital-labels',
            'category' => 'Digital Labels',
            'is_active' => true,
        ]);

        // Add Category
        $this->withSession($this->adminSession())
            ->post(route('admin.products.application-categories.store', $product), [
                'title' => 'Photography & Imaging',
                'has_carousel' => '1',
                'sort_order' => 1,
            ])
            ->assertRedirect();

        $category = ProductApplicationCategory::firstOrFail();
        $this->assertEquals('Photography & Imaging', $category->title);
        $this->assertTrue($category->has_carousel);

        // Add Item with uploaded image under Category
        $itemFile = UploadedFile::fake()->image('photo-books.png');
        $this->withSession($this->adminSession())
            ->post(route('admin.products.application-categories.items.store', [$product, $category]), [
                'title' => 'Photo Books',
                'image_file' => $itemFile,
                'sort_order' => 1,
            ])
            ->assertRedirect();

        $item = ProductApplicationCategoryItem::firstOrFail();
        $this->assertEquals('Photo Books', $item->title);
        $this->assertStringStartsWith('storage/products/application-items/', (string) $item->image);

        // Update Category & Item
        $this->withSession($this->adminSession())
            ->put(route('admin.products.application-categories.update', [$product, $category]), [
                'title' => 'Packaging & Labelling',
                'has_carousel' => '0',
                'sort_order' => 1,
            ])
            ->assertRedirect();

        $this->withSession($this->adminSession())
            ->put(route('admin.products.application-categories.items.update', [$product, $category, $item]), [
                'title' => 'Bottle Labels',
                'image' => $item->image,
                'sort_order' => 1,
            ])
            ->assertRedirect();

        // Verify dynamic category & item render on frontend
        $page = $this->get(route('products.show', $product->slug));
        $page->assertStatus(200);
        $page->assertSee('id="product-application-categories"', false);
        $page->assertSee('Packaging &amp; Labelling', false);
        $page->assertSee('Bottle Labels');
        $page->assertSee($item->image, false);

        // Delete Item & Category
        $this->withSession($this->adminSession())
            ->delete(route('admin.products.application-categories.items.destroy', [$product, $category, $item]))
            ->assertRedirect();
        $this->assertDatabaseMissing('product_application_category_items', ['id' => $item->id]);

        $this->withSession($this->adminSession())
            ->delete(route('admin.products.application-categories.destroy', [$product, $category]))
            ->assertRedirect();
        $this->assertDatabaseMissing('product_application_categories', ['id' => $category->id]);
    }

    public function test_seeder_populates_dynamic_sections_and_admin_edit_displays_them(): void
    {
        $this->seed([ProductSeeder::class, ProductDynamicSectionsSeeder::class]);

        $nonTear = Product::where('slug', 'non-tear-media')->firstOrFail();

        $this->assertCount(3, $nonTear->benefits);
        $this->assertCount(8, $nonTear->applicationCategories);

        $editResponse = $this->withSession($this->adminSession())
            ->get(route('admin.products.edit', $nonTear));

        $editResponse->assertStatus(200);
        $editResponse->assertSee('3. Key Benefits');
        $editResponse->assertSee('4. Application Categories &amp; Products for Non-Tear Media', false);
        $editResponse->assertSee('Photography &amp; Imaging', false);
        $editResponse->assertSee('Photo Books');
    }

    public function test_admin_create_page_shows_all_dynamic_inputs_and_saves_them(): void
    {
        Storage::fake('public');

        $createPage = $this->withSession($this->adminSession())
            ->get(route('admin.products.create'));

        $createPage->assertStatus(200);
        $createPage->assertSee('name="benefits_overline"', false);
        $createPage->assertSee('name="benefits_title"', false);
        $createPage->assertSee('name="benefits_description"', false);
        $createPage->assertSee('name="benefits[]"', false);
        $createPage->assertDontSee('name="impact_banner_file"', false);
        $createPage->assertSee('name="application_categories[0][title]"', false);
        $createPage->assertSee('name="application_categories[0][items][0][title]"', false);
        $createPage->assertSee('name="application_categories[0][items][0][image_file]"', false);

        $itemFile = UploadedFile::fake()->image('new-item.png');

        $storeResponse = $this->withSession($this->adminSession())
            ->post(route('admin.products.store'), [
                'name' => 'Polyester Offset Plates',
                'slug' => 'polyester-offset-plates',
                'benefits_overline' => 'OFFSET ADVANTAGES',
                'benefits_title' => 'Consistent Plate Stability',
                'benefits_description' => 'Built for reliable sheetfed offset production.',
                'benefits' => [
                    'Dimensional stability on short and long runs.',
                    'Fast imaging turnaround.',
                ],
                'application_categories' => [
                    [
                        'title' => 'Publishing & Books',
                        'has_carousel' => '1',
                        'items' => [
                            [
                                'title' => 'Commercial Books',
                                'image_file' => $itemFile,
                            ],
                        ],
                    ],
                ],
                'is_active' => '1',
            ]);

        $created = Product::where('slug', 'polyester-offset-plates')->firstOrFail();
        $storeResponse->assertRedirect(route('admin.products.edit', $created));

        $this->assertEquals('OFFSET ADVANTAGES', $created->benefits_overline);
        $this->assertEquals('Consistent Plate Stability', $created->benefits_title);
        $this->assertCount(2, $created->benefits);
        $this->assertCount(1, $created->applicationCategories);
        $this->assertCount(1, $created->applicationCategories->first()->items);
    }

    public function test_admin_can_save_benefits_header_section_independently(): void
    {
        $product = Product::create([
            'name' => 'Reprographic Media',
            'slug' => 'reprographic-media',
            'category' => 'Reprographic Media',
            'is_active' => true,
        ]);

        $this->withSession($this->adminSession())
            ->put(route('admin.products.update', $product), [
                '_section' => 'benefits_header',
                'benefits_overline' => 'REPROGRAPHIC BENEFITS',
                'benefits_title' => 'Clarity for Engineering Drawings',
                'benefits_description' => 'Coated films and papers for technical reproduction.',
            ])
            ->assertRedirect(route('admin.products.edit', $product));

        $product->refresh();
        $this->assertEquals('Reprographic Media', $product->name);
        $this->assertEquals('REPROGRAPHIC BENEFITS', $product->benefits_overline);
        $this->assertEquals('Clarity for Engineering Drawings', $product->benefits_title);
    }

    public function test_admin_can_add_prefilled_and_copied_application_categories_and_items_from_dropdown(): void
    {
        $sourceProduct = Product::create([
            'name' => 'Non-Tear Media',
            'slug' => 'non-tear-media',
            'category' => 'Non-Tear Media',
            'is_active' => true,
        ]);

        // Add preset category with all pre-filled items
        $this->withSession($this->adminSession())
            ->post(route('admin.products.application-categories.store', $sourceProduct), [
                'preset_key' => 'photography-imaging',
                'sort_order' => 1,
            ])
            ->assertRedirect();

        $sourceCategory = $sourceProduct->applicationCategories()->with('items')->firstOrFail();
        $this->assertEquals('Photography & Imaging', $sourceCategory->title);
        $this->assertCount(3, $sourceCategory->items);
        $this->assertEquals(['Photo Books', 'Memory Books', 'Wedding Albums'], $sourceCategory->items->pluck('title')->toArray());

        // Copy existing category to another product & add a preset item
        $targetProduct = Product::create([
            'name' => 'Gloss Art Paper Media',
            'slug' => 'gloss-art-paper-media',
            'category' => 'Gloss Art Paper Media',
            'is_active' => true,
        ]);

        $this->withSession($this->adminSession())
            ->get(route('admin.products.edit', $targetProduct))
            ->assertStatus(200)
            ->assertSee('cat-preset-selector')
            ->assertSee('Copy from Another Product');

        $this->withSession($this->adminSession())
            ->post(route('admin.products.application-categories.store', $targetProduct), [
                'preset_key' => 'existing:'.$sourceCategory->id,
                'sort_order' => 1,
            ])
            ->assertRedirect();

        $copiedCategory = $targetProduct->applicationCategories()->with('items')->firstOrFail();
        $this->assertEquals('Photography & Imaging', $copiedCategory->title);
        $this->assertCount(3, $copiedCategory->items);

        // Add another pre-filled item from item preset dropdown
        $this->withSession($this->adminSession())
            ->post(route('admin.products.application-categories.items.store', [$targetProduct, $copiedCategory]), [
                'preset_key' => 'brochures',
            ])
            ->assertRedirect();

        $copiedCategory->refresh();
        $this->assertCount(4, $copiedCategory->items);
        $this->assertEquals('Brochures', $copiedCategory->items->last()->title);
        $this->assertEquals('images/products/applications/Brochures.jpg', $copiedCategory->items->last()->image);
    }
}
