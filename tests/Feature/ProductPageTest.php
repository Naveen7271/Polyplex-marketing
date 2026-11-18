<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductPageTest extends TestCase
{
    /**
     * Test that the products page is accessible and renders the product hero section.
     */
    public function test_products_page_is_accessible_and_renders_hero_section(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);

        // Verify page title
        $response->assertSee('Our Products | Polyplex DigiPrint', false);

        // Verify the exact headline and overline from the user's design reference
        $response->assertSee('PRODUCTS', false);
        $response->assertSee('Our Products are Engineered', false);
        $response->assertSee('for Exceptional Results', false);

        // Verify hero section id and attributes
        $response->assertSee('id="product-hero-section"', false);
        $response->assertSee('product-hero-container', false);

        // Verify background image is loaded
        $response->assertSee('product-hero-bg.jpg', false);
    }

    /**
     * Test that /product alias redirects to /products.
     */
    public function test_product_singular_alias_redirects_to_products(): void
    {
        $response = $this->get('/product');

        $response->assertRedirect('/products');
    }

    /**
     * Test that the product hero component supports customizable props.
     */
    public function test_product_hero_component_renders_custom_props(): void
    {
        $view = $this->blade(
            '<x-product-hero-section 
                background-image="images/custom-bg.jpg" 
                badge="SPECIALTY PAPERS" 
                headline="Advanced Substrates for Digital Printing" 
            />'
        );

        $view->assertSee('SPECIALTY PAPERS');
        $view->assertSee('Advanced Substrates for Digital Printing');
        $view->assertSee('images/custom-bg.jpg');
    }

    /**
     * Test that the second section ("Discover Our Products" 3x3 grid) renders all 9 product categories.
     */
    public function test_products_page_renders_discover_our_products_grid(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);

        // Section title
        $response->assertSee('Discover Our Products', false);
        $response->assertSee('id="discover-products"', false);

        // Verify all 9 product lines from user's design mockup
        $expectedProducts = [
            'Non-Tear',
            'Gloss Art',
            'Inkjet Photo',
            'Digital Labels',
            'Multi-Purpose',
            'Digital Wide-',
            'Reprographic',
            'Polyester Offset',
            'Laser and Inkjet',
        ];

        foreach ($expectedProducts as $productName) {
            $response->assertSee($productName, false);
        }

        // Verify product card IDs
        $response->assertSee('id="product-card-non-tear-media"', false);
        $response->assertSee('id="product-card-gloss-art-paper"', false);
        $response->assertSee('id="product-card-inkjet-photo-media"', false);
        $response->assertSee('id="product-card-digital-labels"', false);
        $response->assertSee('id="product-card-multi-purpose-labels"', false);
        $response->assertSee('id="product-card-digital-wide-format"', false);
        $response->assertSee('id="product-card-reprographic-media"', false);
        $response->assertSee('id="product-card-polyester-offset-plates"', false);
        $response->assertSee('id="product-card-laser-inkjet-positive-films"', false);
    }

    /**
     * Test that the product grid component supports custom title and items via props.
     */
    public function test_product_grid_component_renders_custom_props(): void
    {
        $customProducts = [
            [
                'id' => 'custom-media',
                'title' => 'Custom Media Substrate',
                'title_lines' => ['Custom Media', 'Substrate'],
                'image' => 'images/custom.jpg',
                'url' => '#custom',
                'alt' => 'Custom Substrate',
            ],
        ];

        $view = $this->blade(
            '<x-product-grid-section title="Featured Categories" :products="$products" />',
            ['products' => $customProducts]
        );

        $view->assertSee('Featured Categories');
        $view->assertSee('Custom Media');
        $view->assertSee('Substrate');
        $view->assertSee('id="product-card-custom-media"', false);
    }

    /**
     * Test that the third section ("Our Brand Portfolio") renders all 12 brands and their subtitles.
     */
    public function test_products_page_renders_brand_portfolio_section(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);

        // Section title
        $response->assertSee('Our Brand Portfolio', false);
        $response->assertSee('id="brand-portfolio"', false);

        // Verify all 12 brands from the mockup
        $expectedBrands = [
            'Saraprint',
            'NovaCad',
            'NovaDom',
            'NovaJet',
            'NovaLife',
            'NovaSharp',
            'NovaSign',
            'NovaStick',
            'PoliJet',
            'PosiJet',
            'NovaTrace',
        ];

        foreach ($expectedBrands as $brand) {
            $response->assertSee($brand, false);
        }

        // Verify subtitles from the mockup
        $expectedSubtitles = [
            'Coloring Digitally with Innovation',
            'Reprographic Media',
            'Desktop Offset Plate',
            'Digital Wide Format Media',
            'Multipurpose Labels',
            'Premium Non-tear Media',
            'Laser Printable Film',
            'Self-Adhesive Labels',
            'Inkjet Positive Film',
            'Tracing Paper',
        ];

        foreach ($expectedSubtitles as $sub) {
            $response->assertSee($sub, false);
        }

        // Verify brand card IDs
        $response->assertSee('id="brand-card-saraprint"', false);
        $response->assertSee('id="brand-card-novacad"', false);
        $response->assertSee('id="brand-card-novadom"', false);
        $response->assertSee('id="brand-card-novajet-wide"', false);
        $response->assertSee('id="brand-card-novajet-labels"', false);
        $response->assertSee('id="brand-card-novalife"', false);
        $response->assertSee('id="brand-card-novasharp"', false);
        $response->assertSee('id="brand-card-novasign"', false);
        $response->assertSee('id="brand-card-novastick"', false);
        $response->assertSee('id="brand-card-polijet"', false);
        $response->assertSee('id="brand-card-posijet"', false);
        $response->assertSee('id="brand-card-novatrace"', false);
    }

    /**
     * Test that the brand portfolio component supports custom title and items via props.
     */
    public function test_brand_portfolio_component_renders_custom_props(): void
    {
        $customBrands = [
            [
                'id' => 'custom-brand',
                'name' => 'CustomBrand',
                'subtitle' => 'Specialty Coating Technology',
                'logo' => null,
                'alt' => 'CustomBrand',
                'url' => '#custom-brand',
            ],
        ];

        $view = $this->blade(
            '<x-brand-portfolio-section title="Featured Partners" :brands="$brands" />',
            ['brands' => $customBrands]
        );

        $view->assertSee('Featured Partners');
        $view->assertSee('CustomBrand');
        $view->assertSee('Specialty Coating Technology');
        $view->assertSee('id="brand-card-custom-brand"', false);
    }

    /**
     * Test that the individual product page (/products/non-tear-media) renders the first hero section.
     */
    public function test_individual_product_page_renders_hero_section(): void
    {
        $response = $this->get('/products/non-tear-media');

        $response->assertStatus(200);

        // Verify title in top banner
        $response->assertSee('Non-Tear Media', false);
        $response->assertSee('id="product-detail-hero"', false);

        // Verify overlapping circular badge heading & subtitle
        $response->assertSee('Durability that goes', false);
        $response->assertSee('Beyond Paper', false);
        $response->assertSee('Durable Print Media for', false);
        $response->assertSee('Demanding Digital Applications', false);

        // Verify deep navy blue arcs SVG
        $response->assertSee('fill="#0E4174"', false);

        // Verify descriptive paragraphs
        $response->assertSee('Non-Tear Films are designed for applications where printed materials need to withstand regular handling', false);
        $response->assertSee('Their durability and non-tear characteristics make them suitable for photo products', false);

        // Verify brochure download CTA
        $response->assertSee('Download Brochure', false);
    }

    /**
     * Test that the singular /product/{slug} redirects to /products/{slug}.
     */
    public function test_singular_product_slug_alias_redirects(): void
    {
        $response = $this->get('/product/non-tear-media');

        $response->assertRedirect('/products/non-tear-media');
    }

    /**
     * Test that the product detail hero component renders custom props.
     */
    public function test_product_detail_hero_component_renders_custom_props(): void
    {
        $view = $this->blade(
            '<x-product-detail-hero-section 
                product-title="Custom Substrate"
                badge-heading="Next-Gen Durability"
                badge-subtitle="High performance media"
                :paragraphs="[\'Custom overview description for test.\']"
                brochure-text="Get Spec Sheet"
                brochure-url="/docs/spec.pdf"
            />'
        );

        $view->assertSee('Custom Substrate');
        $view->assertSee('Next-Gen Durability');
        $view->assertSee('High performance media');
        $view->assertSee('Custom overview description for test.');
        $view->assertSee('Get Spec Sheet');
        $view->assertSee('/docs/spec.pdf');
    }

    /**
     * Test that the individual product page renders the "Explore our Brands for {Product}" section.
     */
    public function test_individual_product_page_renders_product_brands_section(): void
    {
        $response = $this->get('/products/non-tear-media');

        $response->assertStatus(200);

        // Section title
        $response->assertSee('Explore our Brands for Non-Tear Media', false);
        $response->assertSee('id="product-brands-section"', false);

        // Verify the 3 brands shown in user's mockup
        $response->assertSee('NovaLife', false);
        $response->assertSee('Premium Non-tear Media', false);
        $response->assertSee('id="product-brand-card-novalife"', false);

        $response->assertSee('NovaJet', false);
        $response->assertSee('Digital Wide Format Media', false);
        $response->assertSee('id="product-brand-card-novajet"', false);

        $response->assertSee('Saraprint', false);
        $response->assertSee('Coloring Digitally with Innovation', false);
        $response->assertSee('id="product-brand-card-saraprint"', false);
    }

    /**
     * Test that the product brands component supports custom props.
     */
    public function test_product_brands_component_renders_custom_props(): void
    {
        $customBrands = [
            [
                'id' => 'custom-media-brand',
                'name' => 'CustomCoating',
                'subtitle' => 'High Gloss Overlaminate',
                'logo' => null,
                'alt' => 'CustomCoating',
                'url' => '#custom',
            ],
        ];

        $view = $this->blade(
            '<x-product-brands-section product-name="Synthetic Films" :brands="$brands" />',
            ['brands' => $customBrands]
        );

        $view->assertSee('Explore our Brands for Synthetic Films');
        $view->assertSee('CustomCoating');
        $view->assertSee('High Gloss Overlaminate');
        $view->assertSee('id="product-brand-card-custom-media-brand"', false);
    }

    /**
     * Test that the individual product page renders the Gallery carousel section.
     */
    public function test_individual_product_page_renders_gallery_section(): void
    {
        $response = $this->get('/products/non-tear-media');

        $response->assertStatus(200);

        // Verify section overline & heading
        $response->assertSee('GALLERY', false);
        $response->assertSee('A Closer Look at the Product', false);
        $response->assertSee('id="product-gallery-section"', false);

        // Verify carousel track and controls
        $response->assertSee('id="product-gallery-carousel-track"', false);
        $response->assertSee('id="product-gallery-dots-container"', false);
        $response->assertSee('id="product-gallery-prev-btn"', false);
        $response->assertSee('id="product-gallery-next-btn"', false);

        // Verify slide elements
        $response->assertSee('product-gallery-slide-card', false);
        $response->assertSee('slide-1.jpg', false);
    }

    /**
     * Test that the product gallery component supports custom overline, title, and slides via props.
     */
    public function test_product_gallery_component_renders_custom_props(): void
    {
        $customSlides = [
            [
                'image' => 'images/custom-slide.jpg',
                'alt' => 'Custom Slide Alt Text',
            ],
        ];

        $view = $this->blade(
            '<x-product-gallery-section 
                overline="PRODUCT SHOWCASE" 
                title="Application Precision Gallery" 
                :slides="$slides" 
            />',
            ['slides' => $customSlides]
        );

        $view->assertSee('PRODUCT SHOWCASE');
        $view->assertSee('Application Precision Gallery');
        $view->assertSee('images/custom-slide.jpg');
        $view->assertSee('Custom Slide Alt Text');
    }

    /**
     * Test that the individual product page renders the Applications section ("Designed for Diverse Applications").
     */
    public function test_individual_product_page_renders_applications_section(): void
    {
        $response = $this->get('/products/non-tear-media');

        $response->assertStatus(200);

        // Verify section heading
        $response->assertSee('Designed for Diverse Applications', false);
        $response->assertSee('id="product-applications"', false);

        // Verify all 5 applications from mockup
        $expectedApps = [
            'Wedding Albums',
            'Travel Albums',
            'Newborn Photo Albums',
            'Family Portraits',
            'Commercial Prints',
        ];

        foreach ($expectedApps as $app) {
            $response->assertSee($app, false);
        }

        // Verify descriptions
        $response->assertSee('Durable media for preserving wedding photographs', false);
        $response->assertSee('Suitable for travel memories and photo albums', false);
        $response->assertSee('Designed for premium newborn and baby photography albums', false);
        $response->assertSee('Suitable for preserving family portraits', false);
        $response->assertSee('bag tags, certificates and playing cards', false);

        // Verify card IDs
        $response->assertSee('id="product-app-card-wedding-albums"', false);
        $response->assertSee('id="product-app-card-travel-albums"', false);
        $response->assertSee('id="product-app-card-newborn-photo-albums"', false);
        $response->assertSee('id="product-app-card-family-portraits"', false);
        $response->assertSee('id="product-app-card-commercial-prints"', false);
    }

    /**
     * Test that the product applications component supports custom props.
     */
    public function test_product_applications_component_renders_custom_props(): void
    {
        $customApps = [
            [
                'id' => 'custom-app',
                'title' => 'Industrial Badges',
                'description' => 'Heavy duty tear-proof credentials.',
                'image' => 'images/custom-app.jpg',
                'alt' => 'Industrial Badges',
            ],
        ];

        $view = $this->blade(
            '<x-product-applications-section title="Engineered Use Cases" :applications="$apps" />',
            ['apps' => $customApps]
        );

        $view->assertSee('Engineered Use Cases');
        $view->assertSee('Industrial Badges');
        $view->assertSee('Heavy duty tear-proof credentials.');
        $view->assertSee('id="product-app-card-custom-app"', false);
    }

    /**
     * Test that the individual product page renders the Compatible Technologies section.
     */
    public function test_individual_product_page_renders_compatible_technologies_section(): void
    {
        $response = $this->get('/products/non-tear-media');

        $response->assertStatus(200);

        // Section title
        $response->assertSee('Compatible Technologies', false);
        $response->assertSee('id="compatible-technologies"', false);

        // Verify 3 technologies from mockup
        $response->assertSee('HP Indigo', false);
        $response->assertSee('Dry Toner', false);
        $response->assertSee('Inkjet Dye and Pigment', false);

        // Verify card IDs
        $response->assertSee('id="tech-card-hp-indigo"', false);
        $response->assertSee('id="tech-card-dry-toner"', false);
        $response->assertSee('id="tech-card-inkjet-dye-pigment"', false);
    }

    /**
     * Test that the compatible technologies component supports custom props.
     */
    public function test_product_technologies_component_renders_custom_props(): void
    {
        $customTechs = [
            [
                'id' => 'uv-curable',
                'title' => 'UV-Curable Flatbed',
                'image' => 'images/uv.png',
                'alt' => 'UV Curable',
            ],
        ];

        $view = $this->blade(
            '<x-product-technologies-section title="Supported Press Engines" :technologies="$techs" />',
            ['techs' => $customTechs]
        );

        $view->assertSee('Supported Press Engines');
        $view->assertSee('UV-Curable Flatbed');
        $view->assertSee('id="tech-card-uv-curable"', false);
    }

    /**
     * Test that the direct route /non-tear-media is accessible and renders properly.
     */
    public function test_non_tear_media_direct_route_is_accessible(): void
    {
        $response = $this->get('/non-tear-media');

        $response->assertStatus(200);
        $response->assertSee('Non-Tear Media', false);
        $response->assertSee('Durability that goes', false);
        $response->assertSee('Beyond Paper', false);
    }

    /**
     * Test that the Gloss Art Paper Media page is accessible and renders all 5 sections.
     */
    public function test_gloss_art_paper_media_page_is_accessible_and_renders_all_sections(): void
    {
        $response = $this->get('/gloss-art-paper-media');

        $response->assertStatus(200);

        // Section 1: Hero
        $response->assertSee('Gloss Art Paper Media', false);
        $response->assertSee('id="product-detail-hero"', false);
        $response->assertSee('Bringing Every', false);
        $response->assertSee('Colour to Life', false);
        $response->assertSee('Gloss-Finish Art Paper for Rich', false);
        $response->assertSee('Commercial &amp; Photo Reproduction', false);
        $response->assertSee('Gloss Art Paper is designed for applications where a refined paper surface', false);
        $response->assertSee('Its gloss finish makes it suitable for premium commercial and photo applications', false);
        $response->assertSee('Download Brochure', false);

        // Section 2: Brands - NovaLife only
        $response->assertSee('Explore Our Brands for Gloss Art Paper Media', false);
        $response->assertSee('id="product-brands-section"', false);
        $response->assertSee('id="product-brand-card-novalife"', false);
        $response->assertSee('Premium Non-tear Media', false);
        // Ensure other brands are NOT rendered for gloss art paper
        $response->assertDontSee('id="product-brand-card-novajet"', false);
        $response->assertDontSee('id="product-brand-card-saraprint"', false);

        // Section 3: Gallery
        $response->assertSee('GALLERY', false);
        $response->assertSee('A Closer Look at the Product', false);
        $response->assertSee('id="product-gallery-section"', false);

        // Section 4: Applications
        $response->assertSee('Designed for Diverse Applications', false);
        $response->assertSee('id="product-applications"', false);
        $response->assertSee('Wedding Albums', false);
        $response->assertSee('Travel Albums', false);
        $response->assertSee('Newborn Photo Albums', false);
        $response->assertSee('Family Portraits', false);
        $response->assertSee('Commercial Prints', false);

        // Section 5: Compatible Technologies - HP Indigo & Dry Toner only
        $response->assertSee('Compatible Technologies', false);
        $response->assertSee('id="compatible-technologies"', false);
        $response->assertSee('id="tech-card-hp-indigo"', false);
        $response->assertSee('id="tech-card-dry-toner"', false);
        $response->assertDontSee('id="tech-card-inkjet-dye-pigment"', false);

        // Section 6: Call To Action
        $response->assertSee('Let’s Build the Future Together', false);
        $response->assertSee('Contact Us', false);
    }

    /**
     * Test that all route aliases for Gloss Art Paper Media work.
     */
    public function test_gloss_art_paper_media_aliases_and_routes(): void
    {
        // Direct route
        $this->get('/gloss-art-paper-media')->assertStatus(200);

        // Slug route under /products/
        $this->get('/products/gloss-art-paper-media')->assertStatus(200);

        // Slug route under /products/gloss-art-paper
        $this->get('/products/gloss-art-paper')->assertStatus(200);

        // Alias redirect /gloss-art-paper -> /gloss-art-paper-media
        $this->get('/gloss-art-paper')->assertRedirect('/gloss-art-paper-media');

        // Alias redirect /product/gloss-art-paper-media -> /products/gloss-art-paper-media
        $this->get('/product/gloss-art-paper-media')->assertRedirect('/products/gloss-art-paper-media');
    }

    /**
     * Test that the Inkjet Photo Media page is accessible and renders all sections properly.
     */
    public function test_inkjet_photo_media_page_is_accessible_and_renders_all_sections(): void
    {
        $response = $this->get('/inkjet-photo-media');

        $response->assertStatus(200);

        // Section 1: Hero
        $response->assertSee('Inkjet Photo Media', false);
        $response->assertSee('id="product-detail-hero"', false);
        $response->assertSee('Every detail,', false);
        $response->assertSee('Closer to Reality', false);
        $response->assertSee('Resin-Coated Photo Media for', false);
        $response->assertSee('Detailed, Photorealistic Prints', false);
        $response->assertSee('Inkjet Photo Media is developed for applications requiring detailed, high-quality image reproduction through aqueous dye and pigment inkjet technologies.', false);
        $response->assertSee('The media is suited to professional photo, proofing, display and image-based applications where colour reproduction, detail and overall image quality are important.', false);
        $response->assertSee('Download Brochure', false);

        // Section 2: Brands - NovaJet only
        $response->assertSee('Explore Our Brands for Inkjet Photo Media', false);
        $response->assertSee('id="product-brands-section"', false);
        $response->assertSee('id="product-brand-card-novajet"', false);
        $response->assertSee('NovaJet', false);
        $response->assertSee('Digital Wide Format Media', false);
        // Ensure other brands are NOT rendered for inkjet photo media
        $response->assertDontSee('id="product-brand-card-novalife"', false);
        $response->assertDontSee('id="product-brand-card-saraprint"', false);

        // Section 3: Gallery
        $response->assertSee('GALLERY', false);
        $response->assertSee('A Closer Look at the Product', false);
        $response->assertSee('id="product-gallery-section"', false);

        // Section 4: Applications
        $response->assertSee('Designed for Diverse Applications', false);
        $response->assertSee('id="product-applications"', false);
        $response->assertSee('Wedding Albums', false);
        $response->assertSee('Travel Albums', false);
        $response->assertSee('Newborn Photo Albums', false);
        $response->assertSee('Family Portraits', false);
        $response->assertSee('Commercial Prints', false);

        // Section 5: Compatible Technologies - Inkjet Dye and Pigment
        $response->assertSee('Compatible Technologies', false);
        $response->assertSee('id="compatible-technologies"', false);
        $response->assertSee('id="tech-card-inkjet-dye-pigment"', false);
        $response->assertSee('Inkjet Dye and Pigment', false);

        // Section 6: Call To Action
        $response->assertSee('Let’s Build the Future Together', false);
        $response->assertSee('Contact Us', false);
    }

    /**
     * Test that all route aliases for Inkjet Photo Media work.
     */
    public function test_inkjet_photo_media_aliases_and_routes(): void
    {
        // Direct route
        $this->get('/inkjet-photo-media')->assertStatus(200);

        // Slug route under /products/
        $this->get('/products/inkjet-photo-media')->assertStatus(200);

        // Slug route under /products/inkjet-photo
        $this->get('/products/inkjet-photo')->assertStatus(200);

        // Alias redirect /inkjet-photo -> /inkjet-photo-media
        $this->get('/inkjet-photo')->assertRedirect('/inkjet-photo-media');

        // Alias redirect /product/inkjet-photo-media -> /products/inkjet-photo-media
        $this->get('/product/inkjet-photo-media')->assertRedirect('/products/inkjet-photo-media');
    }

    /**
     * Test that the Digital Labels page is accessible and renders all sections properly.
     */
    public function test_digital_labels_page_is_accessible_and_renders_all_sections(): void
    {
        $response = $this->get('/digital-labels');

        $response->assertStatus(200);

        // Section 1: Hero
        $response->assertSee('Digital Labels', false);
        $response->assertSee('id="product-detail-hero"', false);
        $response->assertSee('Clear Labels for', false);
        $response->assertSee('Meaningful Product', false);
        $response->assertSee('Communication', false);
        $response->assertSee('Versatile Label Media for', false);
        $response->assertSee('Branding, Identification and', false);
        $response->assertSee('Information', false);
        $response->assertSee('Self-Adhesive Labels are designed for applications where printed information, branding or identification needs to be applied directly to products, packaging, assets or other surfaces.', false);
        $response->assertSee('The range supports diverse requirements across consumer products, industrial identification, logistics, retail and promotional applications.', false);
        $response->assertSee('Download Brochure', false);

        // Section 2: Brands - NovaStick only
        $response->assertSee('Explore Our Brands for Digital Labels', false);
        $response->assertSee('id="product-brands-section"', false);
        $response->assertSee('id="product-brand-card-novastick"', false);
        $response->assertSee('NovaStick', false);
        $response->assertSee('Self-Adhesive Labels', false);
        // Ensure other brands are NOT rendered for digital labels
        $response->assertDontSee('id="product-brand-card-novalife"', false);
        $response->assertDontSee('id="product-brand-card-novajet"', false);
        $response->assertDontSee('id="product-brand-card-saraprint"', false);

        // Section 3: Gallery
        $response->assertSee('GALLERY', false);
        $response->assertSee('A Closer Look at the Product', false);
        $response->assertSee('id="product-gallery-section"', false);

        // Section 4: Applications
        $response->assertSee('Designed for Diverse Applications', false);
        $response->assertSee('id="product-applications"', false);
        $response->assertSee('Wedding Albums', false);
        $response->assertSee('Travel Albums', false);
        $response->assertSee('Newborn Photo Albums', false);
        $response->assertSee('Family Portraits', false);
        $response->assertSee('Commercial Prints', false);

        // Section 5: Compatible Technologies
        $response->assertSee('Compatible Technologies', false);
        $response->assertSee('id="compatible-technologies"', false);
        $response->assertSee('id="tech-card-hp-indigo"', false);
        $response->assertSee('id="tech-card-dry-toner"', false);

        // Section 6: Call To Action
        $response->assertSee('Let’s Build the Future Together', false);
        $response->assertSee('Contact Us', false);
    }

    /**
     * Test that all route aliases for Digital Labels work.
     */
    public function test_digital_labels_aliases_and_routes(): void
    {
        // Direct route
        $this->get('/digital-labels')->assertStatus(200);

        // Slug route under /products/
        $this->get('/products/digital-labels')->assertStatus(200);

        // Alias redirect /product/digital-labels -> /products/digital-labels
        $this->get('/product/digital-labels')->assertRedirect('/products/digital-labels');
    }

    /**
     * Test that the Multi-Purpose Labels page is accessible and renders all sections properly.
     */
    public function test_multi_purpose_labels_page_renders_all_sections(): void
    {
        $response = $this->get('/multi-purpose-labels');

        $response->assertStatus(200);

        // Section 1: Hero
        $response->assertSee('Multi-Purpose Labels', false);
        $response->assertSee('id="product-detail-hero"', false);
        $response->assertSee('One Label,', false);
        $response->assertSee('Many Possibilities', false);
        $response->assertSee('Pre-Cut Self-Adhesive Labels for', false);
        $response->assertSee('Everyday Identification &amp; Tracking', false);
        $response->assertSee('Multi-Purpose Labels are pre-cut, self-adhesive label solutions designed for a broad range of everyday identification and information requirements.', false);
        $response->assertSee('Suitable for desktop inkjet and laser printing, these labels provide a convenient solution for on-demand printing across offices, products, inventory and operational applications.', false);
        $response->assertSee('Download Brochure', false);

        // Section 2: Brands - NovaJet
        $response->assertSee('Explore Our Brands for Multi-Purpose Labels', false);
        $response->assertSee('id="product-brands-section"', false);
        $response->assertSee('id="product-brand-card-novajet"', false);
        $response->assertSee('NovaJet', false);

        // Section 3: Gallery
        $response->assertSee('GALLERY', false);
        $response->assertSee('A Closer Look at the Product', false);

        // Section 4: Applications
        $response->assertSee('Designed for Diverse Applications', false);

        // Section 5: Technologies
        $response->assertSee('Compatible Technologies', false);
        $response->assertSee('id="tech-card-dry-toner"', false);
        $response->assertSee('id="tech-card-inkjet-dye-pigment"', false);

        // Section 6: CTA
        $response->assertSee('Let’s Build the Future Together', false);
    }

    /**
     * Test that the Digital Wide-Format Media page is accessible and renders all sections properly.
     */
    public function test_digital_wide_format_media_page_renders_all_sections(): void
    {
        $response = $this->get('/digital-wide-format-media');

        $response->assertStatus(200);

        // Section 1: Hero
        $response->assertSee('Digital Wide-Format Media', false);
        $response->assertSee('Bringing Large-Scale', false);
        $response->assertSee('Visuals to Life', false);
        $response->assertSee('Versatile Media for Indoor &amp; Semi-', false);
        $response->assertSee('Outdoor Graphic Applications', false);
        $response->assertSee('Digital Wide-Format Print Media comprises solutions developed for wide-format printing applications', false);
        $response->assertSee('The portfolio supports applications requiring large-format visual reproduction', false);
        $response->assertSee('Download Brochure', false);

        // Section 2: Brands - NovaJet & NovaSign
        $response->assertSee('Explore Our Brands for Digital Wide-Format Media', false);
        $response->assertSee('id="product-brand-card-novajet"', false);
        $response->assertSee('id="product-brand-card-novasign"', false);
        $response->assertSee('NovaSign', false);

        // Section 3-6: Gallery, Applications, Technologies, CTA
        $response->assertSee('A Closer Look at the Product', false);
        $response->assertSee('Designed for Diverse Applications', false);
        $response->assertSee('Compatible Technologies', false);
        $response->assertSee('Let’s Build the Future Together', false);
    }

    /**
     * Test that the Reprographic Media page is accessible and renders all sections properly.
     */
    public function test_reprographic_media_page_renders_all_sections(): void
    {
        $response = $this->get('/reprographic-media');

        $response->assertStatus(200);

        // Section 1: Hero
        $response->assertSee('Reprographic Media', false);
        $response->assertSee('Graphic and Technical', false);
        $response->assertSee('Reproduction Clarity', false);
        $response->assertSee('Coated Papers and Non-Tear Films', false);
        $response->assertSee('for Graphic and Technical', false);
        $response->assertSee('Reproduction', false);
        $response->assertSee('Reprographic Media is designed for reproducing graphic, visual and technical content', false);
        $response->assertSee('Download Brochure', false);

        // Section 2: Brands - NovaCad, NovaJet, Saraprint
        $response->assertSee('Explore Our Brands for Reprographic Media', false);
        $response->assertSee('id="product-brand-card-novacad"', false);
        $response->assertSee('id="product-brand-card-novajet"', false);
        $response->assertSee('id="product-brand-card-saraprint"', false);
        $response->assertSee('NovaCad', false);

        // Section 3-6: Gallery, Applications, Technologies, CTA
        $response->assertSee('A Closer Look at the Product', false);
        $response->assertSee('Designed for Diverse Applications', false);
        $response->assertSee('Compatible Technologies', false);
        $response->assertSee('Let’s Build the Future Together', false);
    }

    /**
     * Test that the Polyester Offset Plates page is accessible and renders all sections properly.
     */
    public function test_polyester_offset_plates_page_renders_all_sections(): void
    {
        $response = $this->get('/polyester-offset-plates');

        $response->assertStatus(200);

        // Section 1: Hero
        $response->assertSee('Polyester Offset Plates', false);
        $response->assertSee('Stability for Every', false);
        $response->assertSee('Offset Print Run', false);
        $response->assertSee('Stable Polyester Plates for Short-', false);
        $response->assertSee('and Long-Run Offset Printing', false);
        $response->assertSee('Polyester Offset Plates are designed for sheetfed offset printing applications', false);
        $response->assertSee('Download Brochure', false);

        // Section 2: Brands - NovaDom, Saraprint, PoliJet
        $response->assertSee('Explore Our Brands for Polyester Offset Plates', false);
        $response->assertSee('id="product-brand-card-novadom"', false);
        $response->assertSee('id="product-brand-card-saraprint"', false);
        $response->assertSee('id="product-brand-card-polijet"', false);
        $response->assertSee('NovaDom', false);
        $response->assertSee('PoliJet', false);

        // Section 3-6: Gallery, Applications, Technologies, CTA
        $response->assertSee('A Closer Look at the Product', false);
        $response->assertSee('Designed for Diverse Applications', false);
        $response->assertSee('Compatible Technologies', false);
        $response->assertSee('Let’s Build the Future Together', false);
    }

    /**
     * Test that the Laser and Inkjet Positive Films page is accessible and renders all sections properly.
     */
    public function test_laser_and_inkjet_positive_films_page_renders_all_sections(): void
    {
        $response = $this->get('/laser-and-inkjet-positive-films');

        $response->assertStatus(200);

        // Section 1: Hero
        $response->assertSee('Laser and Inkjet Positive Films', false);
        $response->assertSee('Precision Films for', false);
        $response->assertSee('Pre-Press Imaging', false);
        $response->assertSee('Durable Print Media for', false);
        $response->assertSee('Demanding Digital Applications', false);
        $response->assertSee('Laser and Inkjet Positive Films are designed for producing high-quality positives and negatives', false);
        $response->assertSee('Download Brochure', false);

        // Section 2: Brands - PosiJet, NovaSharp
        $response->assertSee('Explore Our Brands for Laser and Inkjet Positive Films', false);
        $response->assertSee('id="product-brand-card-posijet"', false);
        $response->assertSee('id="product-brand-card-novasharp"', false);
        $response->assertSee('PosiJet', false);
        $response->assertSee('NovaSharp', false);

        // Section 3-6: Gallery, Applications, Technologies, CTA
        $response->assertSee('A Closer Look at the Product', false);
        $response->assertSee('Designed for Diverse Applications', false);
        $response->assertSee('Compatible Technologies', false);
        $response->assertSee('Let’s Build the Future Together', false);
    }

    /**
     * Test that all route aliases for the 5 additional products work.
     */
    public function test_all_remaining_product_routes_and_aliases(): void
    {
        // Multi-Purpose Labels
        $this->get('/multi-purpose-labels')->assertStatus(200);
        $this->get('/multi-purpose-label')->assertRedirect('/multi-purpose-labels');
        $this->get('/products/multi-purpose-labels')->assertStatus(200);

        // Digital Wide-Format Media
        $this->get('/digital-wide-format-media')->assertStatus(200);
        $this->get('/digital-wide-format')->assertRedirect('/digital-wide-format-media');
        $this->get('/products/digital-wide-format-media')->assertStatus(200);

        // Reprographic Media
        $this->get('/reprographic-media')->assertStatus(200);
        $this->get('/reprographic')->assertRedirect('/reprographic-media');
        $this->get('/products/reprographic-media')->assertStatus(200);

        // Polyester Offset Plates
        $this->get('/polyester-offset-plates')->assertStatus(200);
        $this->get('/polyester-offset')->assertRedirect('/polyester-offset-plates');
        $this->get('/products/polyester-offset-plates')->assertStatus(200);

        // Laser and Inkjet Positive Films
        $this->get('/laser-and-inkjet-positive-films')->assertStatus(200);
        $this->get('/laser-inkjet-positive-films')->assertRedirect('/laser-and-inkjet-positive-films');
        $this->get('/products/laser-and-inkjet-positive-films')->assertStatus(200);
    }

    /**
     * Test that the NovaJet page is accessible and displays the brand logo in the circle badge.
     */
    public function test_novajet_page_renders_hero_with_brand_logo_and_narrative(): void
    {
        $response = $this->get('/products/novajet');

        $response->assertStatus(200);

        // Verify NovaJet title
        $response->assertSee('NovaJet', false);

        // Verify circular badge brand logo
        $response->assertSee('images/brands/logos/novajet-wide.png', false);
        $response->assertSee('Digital Wide Format Media', false);
        $response->assertSee('A range of durable non-tear media designed for photo and general commercial applications', false);

        // Verify narrative paragraphs
        $response->assertSee('Developed for demanding digital printing applications, NovaJet offers media solutions that combine durability with printing versatility', false);
        $response->assertSee('Download Brochure', false);

        // Verify direct alias /novajet
        $aliasResponse = $this->get('/novajet');
        $aliasResponse->assertStatus(200);
        $aliasResponse->assertSee('NovaJet', false);
    }

    /**
     * Test that the NovaJet page renders the Features section with all 5 feature cards.
     */
    public function test_novajet_page_renders_features_section(): void
    {
        $response = $this->get('/products/novajet');

        $response->assertStatus(200);

        // Section overline
        $response->assertSee('FEATURES', false);
        $response->assertSee('id="product-features"', false);

        // Card 1
        $response->assertSee('Durability and Tear Resistance', false);
        $response->assertSee('Designed to withstand tearing during handling and use, helping printed materials maintain their usability across different applications.', false);

        // Card 2
        $response->assertSee('Versatile Application Potential', false);
        $response->assertSee('Suitable for photographic and general commercial applications where durable and reliable printed media is required.', false);

        // Card 3
        $response->assertSee('Digital Production Printing', false);
        $response->assertSee('Developed for digital production printing environments, supporting different printing requirements and production workflows.', false);

        // Card 4
        $response->assertSee('Multiple Printing Technology Support', false);
        $response->assertSee('Compatible with HP Indigo, dry toner and inkjet technologies, offering flexibility across different digital printing systems.', false);

        // Card 5
        $response->assertSee('Dye and Pigment Ink Compatibility', false);
        $response->assertSee('Supports inkjet printing with both dye and pigment inks, accommodating different inkjet printing requirements.', false);
    }

    /**
     * Test that the NovaJet page renders the atmospheric statement banner.
     */
    public function test_novajet_page_renders_statement_banner(): void
    {
        $response = $this->get('/products/novajet');

        $response->assertStatus(200);

        $response->assertSee('NovaJet includes durable film media designed to provide tear resistance and support demanding photographic and general commercial printing applications.', false);
    }

    /**
     * Test that the NovaJet page renders the Compatibility section with 3 cards.
     */
    public function test_novajet_page_renders_compatibility_section(): void
    {
        $response = $this->get('/products/novajet');

        $response->assertStatus(200);

        // Section overline and headline
        $response->assertSee('COMPATIBILITY', false);
        $response->assertSee('NovaJet supports multiple digital printing technologies, providing flexibility across different production environments.', false);
        $response->assertSee('id="product-compatibility"', false);

        // Card 1: HP Indigo
        $response->assertSee('HP Indigo', false);
        $response->assertSee('Compatible with HP Indigo digital printing technology for applications requiring digital production printing.', false);

        // Card 2: Dry Toner
        $response->assertSee('Dry Toner', false);
        $response->assertSee('Suitable for compatible dry toner printing systems used in digital production environments.', false);

        // Card 3: Inkjet (Dye & Pigment)
        $response->assertSee('Inkjet (Dye &amp; Pigment)', false);
        $response->assertSee('Compatible with inkjet printing systems using both dye and pigment inks, supporting different printing requirements.', false);
    }

    /**
     * Test that the NovaJet page renders the You Might Also Like recommendations section.
     */
    public function test_novajet_page_renders_recommendations_section(): void
    {
        $response = $this->get('/products/novajet');

        $response->assertStatus(200);

        // Section title and id
        $response->assertSee('You Might Also Like', false);
        $response->assertSee('id="brand-recommendations"', false);

        // Brand cards
        $response->assertSee('NovaCad', false);
        $response->assertSee('Reprographic Media', false);

        $response->assertSee('NovaDom', false);
        $response->assertSee('Desktop Offset Plate', false);

        $response->assertSee('NovaJet', false);
        $response->assertSee('Digital Wide Format Media', false);

        // CTA button
        $response->assertSee('Explore all brands', false);
    }

    /**
     * Test that the NovaDom page renders hero section with logo, badge description and narrative.
     */
    public function test_novadom_page_renders_hero_with_brand_logo_and_narrative(): void
    {
        $response = $this->get('/products/novadom');

        $response->assertStatus(200);

        // Verify NovaDom title
        $response->assertSee('NovaDom', false);

        // Verify circular badge logo and content
        $response->assertSee('images/brands/logos/novadom.png', false);
        $response->assertSee('Desktop Offset Plate', false);
        $response->assertSee('A range of laser and inkjet imageable plate solutions developed for selected offset', false);

        // Verify narrative paragraphs
        $response->assertSee('Designed to support different imaging requirements, NovaDom offers plate solutions that can be imaged using laser and inkjet technologies', false);
        $response->assertSee('Download Brochure', false);

        // Verify direct alias /novadom
        $aliasResponse = $this->get('/novadom');
        $aliasResponse->assertStatus(200);
        $aliasResponse->assertSee('NovaDom', false);
    }

    /**
     * Test that the NovaDom page renders the 6 features cards.
     */
    public function test_novadom_page_renders_features_section(): void
    {
        $response = $this->get('/products/novadom');

        $response->assertStatus(200);

        // Section overline
        $response->assertSee('FEATURES', false);
        $response->assertSee('id="product-features"', false);

        // Card 1
        $response->assertSee('Laser-Imageable Plate Solutions', false);
        $response->assertSee('Designed to support laser-based imaging workflows for selected offset-printing applications.', false);

        // Card 2
        $response->assertSee('Inkjet-Imageable Technology', false);
        $response->assertSee('Supports inkjet-based imaging, offering an alternative approach for selected plate preparation requirements.', false);

        // Card 3
        $response->assertSee('Designed for Offset Printing', false);
        $response->assertSee('Developed for use in selected offset-printing applications, supporting specialised print production workflows.', false);

        // Card 4
        $response->assertSee('Imaging Flexibility', false);
        $response->assertSee('Offers both laser and inkjet imageable plate solutions, providing flexibility across different imaging requirements.', false);

        // Card 5
        $response->assertSee('Precision in Plate Imaging', false);
        $response->assertSee('Designed for imaging applications where accurate reproduction of text, graphics and other visual elements is important.', false);

        // Card 6
        $response->assertSee('Specialised Printing Applications', false);
        $response->assertSee('Suitable for selected offset-printing requirements where compatible imageable plate solutions are needed.', false);
    }

    /**
     * Test that all 12 brand product items render through the dedicated brand UI view.
     */
    public function test_all_12_brand_product_items_render_via_brand_ui(): void
    {
        $brandItems = [
            'novajet' => 'NovaJet',
            'novalife' => 'NovaLife',
            'saraprint' => 'Saraprint',
            'novacad' => 'NovaCad',
            'novadom' => 'NovaDom',
            'novasharp' => 'NovaSharp',
            'novasign' => 'NovaSign',
            'novastick' => 'NovaStick',
            'polijet' => 'PoliJet',
            'posijet' => 'PosiJet',
            'novatrace' => 'NovaTrace',
        ];

        foreach ($brandItems as $slug => $brandTitle) {
            // Verify /products/{slug}
            $productRouteResponse = $this->get('/products/'.$slug);
            $productRouteResponse->assertStatus(200);
            $productRouteResponse->assertSee($brandTitle, false);

            // Verify direct alias /{slug}
            $aliasRouteResponse = $this->get('/'.$slug);
            $aliasRouteResponse->assertStatus(200);
            $aliasRouteResponse->assertSee($brandTitle, false);
        }
    }
}
