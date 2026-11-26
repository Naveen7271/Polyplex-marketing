<?php

namespace Tests\Feature;

use Tests\TestCase;

class NavigationTest extends TestCase
{
    /**
     * Test that navbar links and products dropdown items are properly rendered.
     */
    public function test_navbar_and_products_dropdown_are_rendered(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Verify navbar brand logo image is rendered
        $response->assertSee('Polyplex Digiprint_RGB_Colour 2.png');

        // Verify primary navbar items from Image 1
        $response->assertSee('Home');
        $response->assertSee('About Us');
        $response->assertSee('Products');
        $response->assertSee('Industries');
        $response->assertSee('Blog &amp; News', false);
        $response->assertSee('Careers');
        $response->assertSee('Contact');

        // Verify products dropdown column 1 from Image 2
        $response->assertSee('View All Products');
        $response->assertSee('Non-Tear Media');
        $response->assertSee('Gloss Art Paper Media');
        $response->assertSee('Inkjet Photo Media');
        $response->assertSee('Digital Labels');

        // Verify products dropdown column 2 from Image 2
        $response->assertSee('Multi-Purpose Labels');
        $response->assertSee('Digital Wide-Format Media');
        $response->assertSee('Reprographic Media');
        $response->assertSee('Polyester Offset Plates');
        $response->assertSee('Laser and Inkjet Positive Films');

        // Verify fonts (Inter and Montserrat) are referenced
        $response->assertSee('inter');
        $response->assertSee('montserrat');

        // Verify First Section Hero Content from Image
        $response->assertSee('Built on two legacies.');
        $response->assertSee('Designed for the future.');
        $response->assertSee('strategic joint');
        $response->assertSee('venture between');
        $response->assertSee('TechNova');
        $response->assertSee('Powered by advanced coating technologies');
        $response->assertSee('Know More');

        // Verify Second Section Content (Why Polyplex DigiPrint)
        $response->assertSee('Why Polyplex DigiPrint');
        $response->assertSee('Digital Printing is Evolving.');
        $response->assertSee('So Are We.');
        $response->assertSee('Our capabilities combine materials science');
        $response->assertSee('across the print value chain.');

        // Verify Third Section: Capabilities Stacking & Collapse Showcase
        $response->assertSee('Advanced Polymer and Surface Coating Technology');
        $response->assertSee('Digital Print Media Innovation');
        $response->assertSee('Print Application Knowledge and Material Science');
        $response->assertSee('Precision Manufacturing and Quality Excellence');
        $response->assertSee('Customer-Centric Technology Solutions');
        $response->assertSee('Widespread Distribution Network');

        // Verify Fourth Section: Products Showcase ("Our Products are Engineered for Exceptional Results")
        $response->assertSee('Our Products are Engineered for Exceptional Results');
        $response->assertSee('Durable Print Media for Demanding Digital Applications');
        $response->assertSee('Explore All Products');

        // Verify Fifth Section: Made in India & Trust Stats
        $response->assertSee('Made in India. For the World.');
        $response->assertSee('55+');
        $response->assertSee('Years of');
        $response->assertSee('Industrial Expertise');
        $response->assertSee('60+');
        $response->assertSee('Countries');
        $response->assertSee('Worldwide');
        $response->assertSee('700+');
        $response->assertSee('Distribution');
        $response->assertSee('Partners');
        $response->assertSee('Pan - India');
        $response->assertSee('Reach');
        $response->assertSee('make-in-india-lion.png');
        $response->assertSee('panindia.png');

        // Verify Sixth Section: Innovation Carousel ("Turning Materials Science into Application Performance")
        $response->assertSee('INNOVATION');
        $response->assertSee('Turning Materials Science into');
        $response->assertSee('Application Performance');
        $response->assertSee('From material selection to final application');
        $response->assertSee('Material Science Expertise');
        $response->assertSee('Print-Process Compatibility');
        $response->assertSee('id="innovation-carousel-track"', false);

        // Verify Seventh Section: Applications Slider ("Explore Possibilities Across Applications")
        $response->assertSee('Explore Possibilities Across Applications');
        $response->assertSee('Commercial Print');
        $response->assertSee('Photo and Digital Imaging');
        $response->assertSee('Media solutions designed for brochures');
        $response->assertSee('Solutions designed for photo reproduction');
        $response->assertSee('app-commercial-print');
        $response->assertSee('app-photo-imaging');

        // Verify Eighth Section: Testimonials & Customer Trust
        $response->assertSee('Trusted by Customers.');
        $response->assertSee('Proven in Applications.');
        $response->assertSee('TESTIMONIALS');
        $response->assertSee('Customer experiences highlight the consistency, quality and support');
        $response->assertSee('We have been using NovaLife non-tear media for the last 7 years');
        $response->assertSee('Mr. Ramanan');
        $response->assertSee('Glo Color Lab, Coimbatore');
        $response->assertSee('NovaJet Inkjet media is exceptional in terms of colour consistency');
        $response->assertSee('Mr. Sam Jagdale');
        $response->assertSee('Image Photo Shop & Digital Lab, Navi Mumbai');
        $response->assertSee('View More');
        $response->assertSee('testimonials-banner.png');
        $response->assertSee('avatar-ramanan');
        $response->assertSee('avatar-sam-jagdale');

        // Verify Ninth Section: Explore News About People and Technology
        $response->assertSee('Explore News About People and Technology');
        $response->assertSee('Tamil Nadu Print &amp; Pack 2026', false);
        $response->assertSee('Connecting with the Printing &amp; Packaging Industry', false);
        $response->assertSee('Loupe India 2026 – Toray');
        $response->assertSee('Loupe India 2026 – Asahi');
        $response->assertSee('Digital Yatra 2026, Delhi');
        $response->assertSee('Media Expo 2026');
        $response->assertSee('Digital Yatra 2026, Kolhapur');
        $response->assertSee('Read More');
        $response->assertSee('news-1-tamil-nadu.png');
        $response->assertSee('news-2-loupe-toray.png');
        $response->assertSee('news-3-loupe-asahi.png');
        $response->assertSee('news-4-digital-yatra-delhi.png');
        $response->assertSee('news-5-media-expo.png');
        $response->assertSee('news-6-digital-yatra-kolhapur.png');

        // Verify Tenth Section: Call to Action (Let's Build the Future Together.)
        $response->assertSee('Let’s Build the Future Together.');
        $response->assertSee('Have a requirement, need help finding the right media solutions');
        $response->assertSee('Contact Us');

        // Verify Footer: Newsletter, Company, Products directory, disclaimer & branding
        $response->assertSee('Subscribe to our newsletter for the latest trends and updates!');
        $response->assertSee('Formerly known as TechNova Printrite Products Private Limited');
        $response->assertSee('NovaJet | NovaLife | Saraprint');
        $response->assertSee('NovaJet | NovaSign');
        $response->assertSee('NovaJet | NovaCad | Saraprint');
        $response->assertSee('NovaDom | PoliJet | Saraprint');
        $response->assertSee('PosiJet | NovaSharp');
        $response->assertSee('NovaStick');
        $response->assertSee('Privacy Policy');
        $response->assertSee('Terms of use');
        $response->assertSee('Polyplex DigiPrint. All rights reserved.');
        $response->assertSee('The information, product descriptions, specifications and visuals');
    }

    /**
     * Test capabilities sticky card stacking structure.
     */
    public function test_capabilities_sticky_stacking_cards_structure(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Verify sticky card container and elements
        $response->assertSee('id="capabilities-cards-list"', false);
        $response->assertSee('capability-card sticky w-full bg-white', false);
        $response->assertSee('capability-images bg-white', false);
        $response->assertSee('data-never-collapse="true"', false);
        $response->assertSee('PolyplexDigiPrintMedia.png');
        $response->assertSee('PolyplexDigiPrintMedia2.jpg');

        // Verify products showcase cards
        $response->assertSee('product-non-tear');
        $response->assertSee('product-digital-labels');
        $response->assertSee('product-multi-purpose');
        $response->assertSee('product-inkjet-photo');
    }

    /**
     * Test active link styling on navbar.
     */
    public function test_navbar_active_link_colors_and_hover(): void
    {
        // On home route, Home link should be active with color #0E4174, border bottom 1px #0E4174, and no hover color change
        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('text-[#0E4174] border-[#0E4174] font-medium', false);

        // On about route, About Us link should be active with color #0E4174 and border bottom 1px #0E4174
        $aboutResponse = $this->get(route('about'));
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee('text-[#0E4174] border-[#0E4174] font-medium', false);

        // On products route, Products link should be active with color #0E4174 and border bottom 1px #0E4174
        $productsResponse = $this->get(route('products'));
        $productsResponse->assertStatus(200);
        $productsResponse->assertSee('text-[#0E4174] border-[#0E4174] font-medium', false);
    }

    /**
     * Test that navbar contains valid working links to products page and all individual product pages.
     */
    public function test_navbar_contains_valid_product_page_and_products_links(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Verify products page link on "Products" and "View All Products"
        $response->assertSee(route('products'), false);

        // Verify all 9 individual product URLs in navbar
        $expectedProductSlugs = [
            'non-tear-media',
            'gloss-art-paper-media',
            'inkjet-photo-media',
            'digital-labels',
            'multi-purpose-labels',
            'digital-wide-format-media',
            'reprographic-media',
            'polyester-offset-plates',
            'laser-and-inkjet-positive-films',
        ];

        foreach ($expectedProductSlugs as $slug) {
            $response->assertSee(route('products.show', $slug), false);
        }
    }

    /**
     * Test that the products dropdown displays accordion chevrons and expandable sub-brands.
     */
    public function test_products_dropdown_renders_accordion_chevrons_and_sub_brands(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Verify accordion chevrons are present
        $response->assertSee('product-category-chevron', false);
        $response->assertSee('product-category-toggle', false);

        // Verify sub-brands under Non-Tear Media
        $response->assertSee('NovaJet');
        $response->assertSee('NovaLife');
        $response->assertSee('Saraprint');

        // Verify NovaJet links to the novajet product page
        $response->assertSee(route('products.show', 'novajet'));
    }

    /**
     * Test that the desktop products dropdown renders the two-pane split category and brand panels.
     */
    public function test_products_dropdown_renders_split_categories_and_brand_panels(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('products-dropdown-category', false);
        $response->assertSee('products-dropdown-panel', false);
        $response->assertSee('data-category-trigger="non-tear-media"', false);
        $response->assertSee('data-category-panel="non-tear-media"', false);
        $response->assertSee('Polyester Offset Plates');
        $response->assertSee('Laser and Inkjet Positive Films');
        $response->assertSee(route('products.show', 'novalife'), false);
        $response->assertSee(route('products.show', 'novajet'), false);
        $response->assertSee(route('products.show', 'saraprint'), false);
    }

    /**
     * Test that navbar and footer link to the dedicated Blog and News route.
     */
    public function test_navbar_and_footer_link_to_blog_route(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('blog'));
    }

    /**
     * Test that the footer renders the updated 4-column layout with Company, Products, and Brands.
     */
    public function test_footer_renders_company_products_and_brands_columns(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Formerly known as TechNova Printrite Products Private Limited');
        $response->assertSee('Polyplex DigiPrint brings together materials expertise and print-industry know-how');
        $response->assertSee('Insights &amp; News', false);
        $response->assertSee('Contact Us');
        $response->assertSee('Brands');
        $response->assertSee('NovaJet MPL');
        $response->assertSee('NovaTrace');
        $response->assertSee('Polyplex DigiPrint. All rights reserved.');
        $response->assertDontSee('Subscribe to our newsletter for the latest trends and updates!');
    }
}
