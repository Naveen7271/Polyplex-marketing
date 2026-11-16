<?php

namespace Tests\Feature;

use Tests\TestCase;

class TestimonialsPageTest extends TestCase
{
    /**
     * Test that clicking 'View More' on the home page points to the testimonials route.
     */
    public function test_home_page_view_more_links_to_testimonials_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('testimonials'));
        $response->assertSee('View More');
    }

    /**
     * Test that the testimonials page renders with full testimonials list matching the design.
     */
    public function test_testimonials_page_renders_successfully(): void
    {
        $response = $this->get(route('testimonials'));

        $response->assertStatus(200);

        // Verify Hero Banner & Circular Badge
        $response->assertSee('testimonials-banner.png');
        $response->assertSee('Trusted by Customers.');
        $response->assertSee('Proven in Applications.');

        // Verify Narrative
        $response->assertSee('TESTIMONIALS');
        $response->assertSee('Customer experiences highlight the consistency, quality and support associated with our media solutions.');

        // Verify Testimonial 1
        $response->assertSee('We have been using NovaLife non-tear media for the last 7 years');
        $response->assertSee('Mr. Ramanan');
        $response->assertSee('Glo Color Lab, Coimbatore');
        $response->assertSee('avatar-ramanan.png');

        // Verify Testimonial 2
        $response->assertSee('Qorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $response->assertSee('Mr. Sam Jagdale');
        $response->assertSee('Image Photo Shop & Digital Lab, Navi Mumbai');
        $response->assertSee('avatar-sam-jagdale.png');

        // Verify Testimonial 3
        $response->assertSee('Rorem ipsum dolor sit amet, consectetur adipiscing elit.');

        // Verify Testimonial 4
        $response->assertSee('Praesent auctor purus luctus enim egestas,');

        // Verify CTA Section
        $response->assertSee('Let’s Build the Future Together.');
        $response->assertSee('Contact Us');
    }
}
