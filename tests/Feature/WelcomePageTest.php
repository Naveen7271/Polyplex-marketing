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
        // Tall portrait height on mobile
        $response->assertSee('h-[440px] sm:h-[480px] lg:h-auto lg:aspect-16/10', false);
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
     * Test that Testimonials section has dedicated mobile layout matching design with dividers and View More button.
     */
    public function test_testimonials_section_mobile_layout(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="testimonials"', false);
        $response->assertSee('TESTIMONIALS');
        $response->assertSee('Customer experiences highlight the consistency, quality and support associated with our media solutions.');
        $response->assertSee('Mr. Ramanan');
        $response->assertSee('Glo Color Lab, Coimbatore');
        $response->assertSee('Mr. Sam Jagdale');
        $response->assertSee('Image Photo Shop & Digital Lab, Navi Mumbai');
        $response->assertSee('View More');
    }
}
