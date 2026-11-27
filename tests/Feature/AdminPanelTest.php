<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test admin login screen is accessible.
     */
    public function test_admin_login_screen_is_accessible(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Admin Panel', false);
        $response->assertSee('Sign in to manage products', false);
    }

    /**
     * Test admin authentication with correct credentials.
     */
    public function test_admin_can_login_with_valid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@polyplex.in',
            'password' => 'admin@123',
        ]);

        $response->assertRedirect('/admin');
        $this->assertEquals(true, session('admin_logged_in'));
        $this->assertEquals('admin@polyplex.in', session('admin_email'));
    }

    /**
     * Test guest cannot access protected admin routes.
     */
    public function test_guest_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/admin/login');
    }

    /**
     * Test admin dashboard renders with Products and Brands sidebar links (and without legacy Diverse Applications).
     */
    public function test_admin_dashboard_renders_with_sidebar_links(): void
    {
        $response = $this->withSession(['admin_logged_in' => true, 'admin_email' => 'admin@polyplex.in'])
            ->get('/admin');

        $response->assertStatus(200);
        $response->assertDontSee('Diverse Applications', false);
        $response->assertSee('Products', false);
        $response->assertSee('Brands', false);
    }

    /**
     * Test brand create page shows auto-generated Target URL and file upload inputs.
     */
    public function test_brand_create_page_has_file_uploads_and_auto_target_url(): void
    {
        $product = Product::create([
            'name' => 'Non-Tear Media',
            'slug' => 'non-tear-media',
            'category' => 'Non-Tear Media',
            'is_active' => true,
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->get('/admin/brands/create');

        $response->assertStatus(200);
        $response->assertSee('Target URL (Auto-Generated)', false);
        $response->assertSee('name="logo_file"', false);
        $response->assertSee('name="banner_file"', false);
        $response->assertSee('name="brochure_file"', false);
        $response->assertSee('enctype="multipart/form-data"', false);
    }

    /**
     * Test brand store auto-generates target URL and handles file uploads.
     */
    public function test_brand_can_be_stored_with_uploaded_files_and_auto_url(): void
    {
        Storage::fake('public');

        $logoFile = UploadedFile::fake()->image('logo.png');
        $bannerFile = UploadedFile::fake()->image('banner.jpg');
        $brochureFile = UploadedFile::fake()->create('brochure.pdf', 500, 'application/pdf');

        $response = $this->withSession(['admin_logged_in' => true])
            ->post('/admin/brands', [
                'name' => 'NovaLife Test',
                'slug' => 'novalife-test',
                'subtitle' => 'Premium Synthetic Media',
                'logo_file' => $logoFile,
                'banner_file' => $bannerFile,
                'brochure_file' => $brochureFile,
            ]);

        $brand = Brand::where('slug', 'novalife-test')->first();
        $this->assertNotNull($brand);

        // Verify target URL is auto-generated as /novalife-test
        $this->assertEquals('/novalife-test', $brand->url);

        // Verify uploaded files stored in storage
        $this->assertStringStartsWith('storage/brands/logos/', $brand->logo);
        $this->assertStringStartsWith('storage/brands/banners/', $brand->banner);
        $this->assertStringStartsWith('storage/brochures/', $brand->brochure_url);

        $response->assertRedirect(route('admin.brands.edit', $brand));
    }

    /**
     * Test brand edit page displays previews for existing files.
     */
    public function test_brand_edit_page_shows_previews_for_existing_files(): void
    {
        $brand = Brand::create([
            'name' => 'NovaJet Existing',
            'slug' => 'novajet-existing',
            'logo' => 'images/brands/logos/novajet.png',
            'banner' => 'images/products/banner-non-tear.jpg',
            'brochure_url' => 'downloads/novajet.pdf',
            'url' => '/novajet-existing',
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->get(route('admin.brands.edit', $brand));

        $response->assertStatus(200);
        $response->assertSee('Current Logo', false);
        $response->assertSee('Current Banner', false);
        $response->assertSee('Current Brochure File', false);
        $response->assertSee('name="logo_file"', false);
        $response->assertSee('name="banner_file"', false);
        $response->assertSee('name="brochure_file"', false);
    }

    /**
     * Test product create page has file upload inputs.
     */
    public function test_product_create_page_has_file_uploads(): void
    {
        $response = $this->withSession(['admin_logged_in' => true])
            ->get('/admin/products/create');

        $response->assertStatus(200);
        $response->assertSee('name="banner_image_file"', false);
        $response->assertSee('name="brochure_file"', false);
        $response->assertSee('enctype="multipart/form-data"', false);
    }

    /**
     * Test product can be stored with file uploads.
     */
    public function test_product_store_handles_file_uploads(): void
    {
        Storage::fake('public');

        $bannerFile = UploadedFile::fake()->image('banner.jpg');
        $brochureFile = UploadedFile::fake()->create('spec.pdf', 500, 'application/pdf');

        $response = $this->withSession(['admin_logged_in' => true])
            ->post('/admin/products', [
                'name' => 'Digital Labels Test',
                'slug' => 'digital-labels-test',
                'category' => 'Digital Labels',
                'banner_image_file' => $bannerFile,
                'brochure_file' => $brochureFile,
            ]);

        $product = Product::where('slug', 'digital-labels-test')->first();
        $this->assertNotNull($product);
        $this->assertStringStartsWith('storage/products/banners/', $product->banner_image);
        $this->assertStringStartsWith('storage/brochures/', $product->brochure_url);
    }

    /**
     * Test product edit page shows previews for existing files.
     */
    public function test_product_edit_page_shows_previews_for_existing_files(): void
    {
        $product = Product::create([
            'name' => 'Gloss Art Paper',
            'slug' => 'gloss-art-paper',
            'category' => 'Gloss Art Paper Media',
            'banner_image' => 'images/products/banner.jpg',
            'brochure_url' => 'downloads/gloss.pdf',
            'is_active' => true,
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->get(route('admin.products.edit', $product));

        $response->assertStatus(200);
        $response->assertSee('Current Banner', false);
        $response->assertSee('Current Brochure File', false);
        $response->assertSee('name="banner_image_file"', false);
        $response->assertSee('name="brochure_file"', false);
    }

    /**
     * Test Diverse Applications index lists applications with product badges.
     */
    public function test_diverse_applications_index_lists_applications(): void
    {
        $product = Product::create([
            'name' => 'Non-Tear Media',
            'slug' => 'non-tear-media',
            'category' => 'Non-Tear Media',
            'is_active' => true,
        ]);

        $app = $product->applications()->create([
            'title' => 'Wedding Albums',
            'description' => 'Preserving wedding memories.',
            'image' => 'images/products/applications/wedding-albums.jpg',
            'sort_order' => 1,
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->get(route('admin.applications.index'));

        $response->assertStatus(200);
        $response->assertSee('Designed for Diverse Applications', false);
        $response->assertSee('Wedding Albums', false);
        $response->assertSee('Non-Tear Media', false);
        $response->assertSee(route('admin.applications.create'), false);
    }

    /**
     * Test Diverse Applications create page renders product and preset dropdowns.
     */
    public function test_diverse_applications_create_page_renders_properly(): void
    {
        $product = Product::create([
            'name' => 'Non-Tear Media',
            'slug' => 'non-tear-media',
            'category' => 'Non-Tear Media',
            'is_active' => true,
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->get(route('admin.applications.create'));

        $response->assertStatus(200);
        $response->assertSee('Add Application', false);
        $response->assertSee('name="product_id"', false);
        $response->assertSee('name="preset_key"', false);
        $response->assertSee('name="image_file"', false);
        $response->assertSee('Non-Tear Media', false);
    }

    /**
     * Test Diverse Applications store handles preset and redirect.
     */
    public function test_diverse_applications_can_be_stored(): void
    {
        $product = Product::create([
            'name' => 'Non-Tear Media',
            'slug' => 'non-tear-media',
            'category' => 'Non-Tear Media',
            'is_active' => true,
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->post(route('admin.applications.store'), [
                'product_id' => $product->id,
                'preset_key' => 'wedding-albums',
            ]);

        $response->assertRedirect(route('admin.applications.index'));

        $this->assertDatabaseHas('product_applications', [
            'product_id' => $product->id,
            'title' => 'Wedding Albums',
        ]);
    }

    /**
     * Test Diverse Applications delete.
     */
    public function test_diverse_application_can_be_deleted(): void
    {
        $product = Product::create([
            'name' => 'Non-Tear Media',
            'slug' => 'non-tear-media',
            'category' => 'Non-Tear Media',
            'is_active' => true,
        ]);

        $app = $product->applications()->create([
            'title' => 'App To Delete',
            'sort_order' => 1,
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->delete(route('admin.applications.destroy', $app));

        $response->assertRedirect();
        $this->assertDatabaseMissing('product_applications', [
            'id' => $app->id,
        ]);
    }

    /**
     * Test brand files can be removed via remove checkboxes.
     */
    public function test_brand_files_can_be_removed(): void
    {
        $brand = Brand::create([
            'name' => 'NovaJet Removal Test',
            'slug' => 'novajet-removal-test',
            'logo' => 'storage/brands/logos/sample.png',
            'banner' => 'storage/brands/banners/sample.jpg',
            'brochure_url' => 'storage/brochures/sample.pdf',
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->put(route('admin.brands.update', $brand), [
                'name' => 'NovaJet Removal Test',
                'remove_logo' => '1',
                'remove_banner' => '1',
                'remove_brochure' => '1',
            ]);

        $response->assertRedirect(route('admin.brands.edit', $brand));

        $brand->refresh();
        $this->assertNull($brand->logo);
        $this->assertNull($brand->banner);
        $this->assertNull($brand->brochure_url);
    }

    /**
     * Test product can be created without category, defaulting to product name.
     */
    public function test_product_can_be_created_without_category(): void
    {
        $response = $this->withSession(['admin_logged_in' => true])
            ->post(route('admin.products.store'), [
                'name' => 'New Specialty Substrate',
                'slug' => 'new-specialty-substrate',
            ]);

        $product = Product::where('slug', 'new-specialty-substrate')->first();
        $this->assertNotNull($product);
        $this->assertEquals('New Specialty Substrate', $product->category);
    }

    /**
     * Test product banner image and brochure can be removed.
     */
    public function test_product_files_can_be_removed(): void
    {
        $product = Product::create([
            'name' => 'Test Removals Product',
            'slug' => 'test-removals-product',
            'category' => 'Test Removals Product',
            'banner_image' => 'storage/products/banners/sample.jpg',
            'brochure_url' => 'storage/brochures/sample.pdf',
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->put(route('admin.products.update', $product), [
                'name' => 'Test Removals Product',
                'remove_banner_image' => '1',
                'remove_brochure' => '1',
            ]);

        $response->assertRedirect(route('admin.products.edit', $product));

        $product->refresh();
        $this->assertNull($product->banner_image);
        $this->assertNull($product->brochure_url);
    }

    /**
     * Test diverse application image can be removed.
     */
    public function test_diverse_application_image_can_be_removed(): void
    {
        $product = Product::create([
            'name' => 'Product For App',
            'slug' => 'product-for-app',
            'category' => 'Product For App',
        ]);

        $app = $product->applications()->create([
            'title' => 'Sample Application',
            'image' => 'storage/applications/sample.jpg',
            'sort_order' => 1,
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->put(route('admin.applications.update', $app), [
                'product_id' => $product->id,
                'title' => 'Sample Application',
                'remove_image' => '1',
            ]);

        $response->assertRedirect(route('admin.applications.index'));

        $app->refresh();
        $this->assertNull($app->image);
    }

    /**
     * Test brand edit page displays compatibility section and presets.
     */
    public function test_brand_edit_page_renders_compatibilities_section(): void
    {
        $brand = Brand::create([
            'name' => 'NovaJet',
            'slug' => 'novajet',
            'compatibility_headline' => 'Testing Compatibility Headline',
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->get(route('admin.brands.edit', $brand));

        $response->assertStatus(200);
        $response->assertSee('Brand Compatibility (COMPATIBILITY Section)', false);
        $response->assertSee('compatibility_headline', false);
        $response->assertSee('Testing Compatibility Headline', false);
        $response->assertSee('HP Indigo', false);
    }

    /**
     * Test brand compatibility can be added via preset and custom.
     */
    public function test_brand_compatibility_can_be_added_and_deleted(): void
    {
        $brand = Brand::create([
            'name' => 'NovaJet',
            'slug' => 'novajet',
        ]);

        // Add via preset
        $response = $this->withSession(['admin_logged_in' => true])
            ->post(route('admin.brands.compatibilities.store', $brand), [
                'preset_key' => 'hp-indigo',
            ]);

        $response->assertRedirect(route('admin.brands.edit', $brand));
        $this->assertDatabaseHas('brand_compatibilities', [
            'brand_id' => $brand->id,
            'title' => 'HP Indigo',
        ]);

        $compatibility = $brand->compatibilities()->first();

        // Add custom
        $responseCustom = $this->withSession(['admin_logged_in' => true])
            ->post(route('admin.brands.compatibilities.store', $brand), [
                'preset_key' => 'custom',
                'title' => 'Special UV Curing',
                'description' => 'Fast UV lamp curing system',
            ]);

        $responseCustom->assertRedirect(route('admin.brands.edit', $brand));
        $this->assertDatabaseHas('brand_compatibilities', [
            'brand_id' => $brand->id,
            'title' => 'Special UV Curing',
        ]);

        // Delete compatibility
        $responseDelete = $this->withSession(['admin_logged_in' => true])
            ->delete(route('admin.brands.compatibilities.destroy', [$brand, $compatibility]));

        $responseDelete->assertRedirect(route('admin.brands.edit', $brand));
        $this->assertDatabaseMissing('brand_compatibilities', [
            'id' => $compatibility->id,
        ]);
    }

    /**
     * Test public brand page renders dynamic compatibility technologies.
     */
    public function test_public_brand_page_renders_dynamic_compatibility_technologies(): void
    {
        $brand = Brand::create([
            'name' => 'NovaJet',
            'slug' => 'novajet',
            'compatibility_headline' => 'Dynamic Custom Headline for NovaJet Compatibility',
        ]);

        $brand->compatibilities()->create([
            'title' => 'Custom Screen Printing Tech',
            'description' => 'High opacity ink screen printing technology for harsh industrial outdoor use.',
            'sort_order' => 1,
        ]);

        $response = $this->get('/novajet');

        $response->assertStatus(200);
        $response->assertSee('COMPATIBILITY', false);
        $response->assertSee('Dynamic Custom Headline for NovaJet Compatibility', false);
        $response->assertSee('Custom Screen Printing Tech', false);
        $response->assertSee('High opacity ink screen printing technology', false);
    }

    /**
     * Test that a newly created brand in admin is accessible via /{slug} and /products/{slug} as a brand page.
     */
    public function test_newly_created_brand_renders_brand_page_on_root_and_products_routes(): void
    {
        $this->withSession(['admin_logged_in' => true])
            ->post('/admin/brands', [
                'name' => 'NovaTest',
                'slug' => 'novatest',
                'subtitle' => 'Specialty Test Media',
                'badge_description' => 'Custom badge summary for NovaTest brand.',
                'paragraphs' => "First paragraph for NovaTest.\n\nSecond paragraph for NovaTest.",
            ])
            ->assertRedirect();

        $rootResponse = $this->get('/novatest');
        $rootResponse->assertStatus(200);
        $rootResponse->assertSee('NovaTest', false);
        $rootResponse->assertSee('Specialty Test Media', false);
        $rootResponse->assertSee('Custom badge summary for NovaTest brand.', false);
        $rootResponse->assertSee('First paragraph for NovaTest.', false);
        $rootResponse->assertDontSee('Durability that goes Beyond Paper', false);
        $rootResponse->assertDontSee('images/brands/logos/novajet-wide.png', false);
        $rootResponse->assertDontSee('id="product-brands-section"', false);
        $rootResponse->assertDontSee('A Closer Look at the Product', false);

        $productsSlugResponse = $this->get('/products/novatest');
        $productsSlugResponse->assertStatus(200);
        $productsSlugResponse->assertSee('NovaTest', false);
        $productsSlugResponse->assertSee('Specialty Test Media', false);
        $productsSlugResponse->assertDontSee('id="product-brands-section"', false);
        $productsSlugResponse->assertDontSee('A Closer Look at the Product', false);

        $this->get('/non-existent-brand-slug')->assertStatus(404);
    }
}
