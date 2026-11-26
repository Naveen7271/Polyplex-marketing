<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomePageTest extends TestCase
{
    /**
     * Test that the homepage loads successfully and contains the main sections.
     */
    public function test_welcome_page_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Built on two legacies.');
        $response->assertSee('Why Polyplex DigiPrint');
        $response->assertSee('Made in India. For the World.');
        $response->assertSee('Turning Materials Science into');
    }

    /**
     * Test that the hero section renders the Explore Products link and Find Media by Applications search button.
     */
    public function test_hero_section_renders_explore_products_and_find_media_search_button(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Explore Products');
        $response->assertSee(route('products'), false);
        $response->assertSee('Find Media by Applications');
        $response->assertSee('id="hero-find-media-btn"', false);
        $response->assertSee('data-open-search', false);
    }

    /**
     * Test that global overflow protection is present to avoid horizontal space on mobile.
     */
    public function test_layout_prevents_horizontal_overflow_on_mobile(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('overflow-x-clip');
        // News cards should be max-width bounded, not rigid 400px fixed width
        $response->assertSee('max-w-[400px]');
        // Product cards should be bounded by max-width
        $response->assertSee('max-w-[323px]');
    }

    /**
     * Test that capability headers support stacking icon above heading on mobile (Point 2).
     */
    public function test_capabilities_icon_stacks_above_heading_on_mobile(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('capability-header bg-white py-3 sm:py-3.5 cursor-pointer flex flex-col sm:flex-row items-start gap-3 sm:gap-5', false);
        $response->assertSee('Advanced Polymer and Surface Coating Technology');
    }

    /**
     * Test that Made in India section has mobile-responsive layout matching screenshot 4 (Point 3).
     */
    public function test_made_in_india_section_mobile_layout(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="made-in-india"', false);
        // Header aligns to left on mobile
        $response->assertSee('flex flex-col items-start text-left gap-3.5 mb-8 sm:mb-12 sm:flex-row sm:items-center sm:justify-center sm:text-center sm:gap-5', false);
        // Stats card uses divide-y on mobile, divide-x on lg
        $response->assertSee('divide-y divide-slate-200 lg:divide-y-0 lg:grid lg:grid-cols-4 lg:divide-x lg:divide-slate-200', false);
        $response->assertSee('Years of');
        $response->assertSee('Industrial Expertise');
        $response->assertSee('Countries');
        $response->assertSee('Worldwide');
        $response->assertSee('Distribution');
        $response->assertSee('Partners');
        $response->assertSee('Pan - India Reach');
        $response->assertSee('Combined Legacy and Group Reach of Polyplex and TechNova');
    }

    /**
     * Test that Innovation carousel contains proper portrait dimensions and controls matching screenshot 6 (Point 4).
     */
    public function test_innovation_carousel_structure_and_controls(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="innovation-carousel-container"', false);
        $response->assertSee('id="innovation-carousel-track"', false);
        $response->assertSee('id="innovation-prev-btn"', false);
        $response->assertSee('id="innovation-next-btn"', false);
        $response->assertSee('id="innovation-dots-container"', false);
        // Tall portrait height on mobile & vertically centered slide content
        $response->assertSee('h-[440px] sm:h-[480px] lg:h-auto lg:aspect-16/10', false);
        $response->assertSee('flex flex-col justify-center pointer-events-none z-10', false);
        // Slide counter & titles
        $response->assertSee('1 / 4');
        $response->assertSee('Material Science Expertise');
        $response->assertSee('Print-Process Compatibility');
    }

    /**
     * Test that Applications section contains mobile card layout matching design.
     */
    public function test_applications_section_mobile_layout(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="applications"', false);
        $response->assertSee('Explore Possibilities Across Applications');
        $response->assertSee('id="apps-slider-container"', false);
        $response->assertSee('id="apps-prev-btn"', false);
        $response->assertSee('id="apps-next-btn"', false);
        $response->assertSee('Commercial Print');
        $response->assertSee('Photo and Digital Imaging');
    }

    /**
     * Test that all newly added application slider items are rendered.
     */
    public function test_applications_slider_renders_all_application_items(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $expectedTitles = [
            'Menus and Communication Materials',
            'Labels and Tags',
            'Branding and Marketing',
            'Identification and Information',
            'Packaging',
            'Office and Business Printing',
            'Logistics and Tracking',
            'Healthcare',
            'Retail and Point-of-Sale',
            'Indoor and Outdoor Graphics',
            'Signage and Displays',
            'Technical, CAD and GIS',
            'Pre-Press and Specialised Printing',
        ];

        foreach ($expectedTitles as $title) {
            $response->assertSee($title);
        }
    }

    /**
     * Test that Testimonials section matches the dark atmospheric 2-card layout with View More button.
     */
    public function test_testimonials_section_mobile_layout(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="testimonials"', false);
        $response->assertSee('TESTIMONIALS');
        $response->assertSee('Real Applications. Customer Experiences.');
        $response->assertSee('Mr. Ramanan');
        $response->assertSee('Glo Color Lab, Coimbatore');
        $response->assertSee('Mr. Sam Jagdale');
        $response->assertSee('Image Photo Shop & Digital Lab, Navi Mumbai');
        $response->assertSee('View More');
    }
}
