<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    /**
     * Test that the about us page is accessible and renders the split hero section.
     */
    public function test_about_page_is_accessible_and_renders_split_hero_section(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        // Verify the exact headline from the user's design reference
        $response->assertSee('For over 60 years, we’ve built on a legacy of innovation', false);
        $response->assertSee('taking our own approach to creating print solutions that make a meaningful impact.', false);

        // Verify split hero structural elements
        $response->assertSee('id="about-hero-section"', false);
        $response->assertSee('id="about-hero-panel-left"', false);
        $response->assertSee('id="about-hero-panel-right"', false);
        $response->assertSee('id="about-hero-divider"', false);

        // Verify background images
        $response->assertSee('about-hero-1');
        $response->assertSee('about-hero-2');
    }

    /**
     * Test that the Our Story section renders right after the About hero section.
     */
    public function test_about_page_renders_our_story_section_after_hero(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('id="about-story-section"', false);
        $response->assertSee('OUR STORY');
        $response->assertSee('Print media is where material science meets creativity and application.', false);
        $response->assertSeeInOrder([
            'id="about-hero-section"',
            'id="about-story-section"',
            'id="about-pillars-section"',
        ], false);
    }

    /**
     * Test that /about-us route redirects to /about.
     */
    public function test_about_us_alias_redirects_to_about(): void
    {
        $response = $this->get('/about-us');

        $response->assertRedirect('/about');
    }

    /**
     * Test that the vision, mission, purpose, and core values section renders all pillars and accordions.
     */
    public function test_about_page_renders_vision_mission_purpose_and_values_accordion(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        // Verify section container
        $response->assertSee('id="about-pillars-section"', false);

        // Verify Pillars: Eyebrow Titles
        $response->assertSee('OUR VISION');
        $response->assertSee('OUR MISSION');
        $response->assertSee('OUR PURPOSE');
        $response->assertSee('OUR CORE VALUES');

        // Verify Statements from Image Reference
        $response->assertSee('To be a globally trusted and technology-driven leader in digital print substrates', false);
        $response->assertSee('recognised for quality, innovation and value creation across diverse applications.', false);

        $response->assertSee('To deliver high-performance print media solutions that enable our customers to Create, Communicate and Connect', false);
        $response->assertSee('while building a sustainable and profitable business together.', false);

        $response->assertSee('To shape the future of print with lasting solutions, made in India for the world, with sustainability at their core.', false);

        $response->assertSee('Our values are integral to how we build trust, embrace responsibility and create lasting value for our customers and stakeholders.', false);

        // Verify interactive accordion triggers
        $response->assertSee('id="pillar-btn-vision"', false);
        $response->assertSee('id="pillar-btn-mission"', false);
        $response->assertSee('id="pillar-btn-purpose"', false);
        $response->assertSee('id="pillar-btn-values"', false);

        // Verify expanded paragraphs & values from design references
        $response->assertSee('Our vision is rooted in the belief that leadership is built not only through scale', false);
        $response->assertSee('Our mission is to bring together our strengths across the entire value chain', false);
        $response->assertSee('By combining materials science, manufacturing expertise and application knowledge', false);
        $response->assertSee('Customer First:');
        $response->assertSee('Collaboration:');
        $response->assertSee('Innovation:');
        $response->assertSee('Excellence:');
        $response->assertSee('Integrity:');
        $response->assertSee('Responsibility:');
    }

    /**
     * Test that the legacy timeline section renders with the static graphic image.
     */
    public function test_about_page_renders_legacy_timeline_section(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        // Verify section container
        $response->assertSee('id="about-timeline-section"', false);

        // Verify section heading and subtitle
        $response->assertSee('A Legacy Takes Time to Build');
        $response->assertSee('Explore the Polyplex DigiPrint journey through the years.');

        // Verify attached timeline graphic banner
        $response->assertSee('about-timeline.jpg');

        // Verify animation elements are not rendered
        $response->assertDontSee('id="timeline-wheel-svg"', false);
        $response->assertDontSee('id="timeline-wheel-group"', false);
    }

    /**
     * Test that the what sets us apart section renders with headline, carousel and slides.
     */
    public function test_about_page_renders_what_sets_us_apart_section(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        // Verify section and carousel container
        $response->assertSee('id="about-approach-section"', false);
        $response->assertSee('id="approach-carousel"', false);

        // Verify eyebrow and main headline from reference
        $response->assertSee('WHAT SETS US APART');
        $response->assertSee('Our integrated approach brings together capabilities across the value chain', false);
        $response->assertSee('enabling us to move from understanding requirements to delivering solutions and supporting customers through their journey.', false);

        // Verify Slide 1 title & description from reference
        $response->assertSee('Understanding Applications');
        $response->assertSee('We understand the requirements of different print applications and use this knowledge to develop solutions suited to specific customer needs.', false);

        // Verify navigation controls and counter
        $response->assertSee('1/6');
        $response->assertSee('approach-prev-btn', false);
        $response->assertSee('approach-next-btn', false);

        // Verify placeholder images exist
        $response->assertSee('about-sets-us-apart-1.jpg');
    }

    /**
     * Test that the our presence section renders with checkerboard images and statements.
     */
    public function test_about_page_renders_our_presence_section(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        // Verify section container and heading
        $response->assertSee('id="about-presence-section"', false);
        $response->assertSee('Our Presence');

        // Verify all 3 presence statements from the design reference
        $response->assertSee('Our global presence in 60+ countries highlights our significant footprint and track record worldwide.');
        $response->assertSee('A strong operational network across India');
        $response->assertSee('9 manufacturing locations');
        $response->assertSee('2 R&amp;D facilities', false);
        $response->assertSee('12 distribution &amp; conversion centres', false);
        $response->assertSee('700+ regional partners across India combine scale with regional strength, helping us serve customers across diverse markets.');

        // Verify all 3 presence images
        $response->assertSee('about-presence-1');
        $response->assertSee('about-presence-2');
        $response->assertSee('about-presence-3');
    }

    /**
     * Test that the geographic distribution section renders with title, toggle buttons, legend and world map.
     */
    public function test_about_page_renders_geographic_distribution_section(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        // Verify section container and heading
        $response->assertSee('id="about-distribution-section"', false);
        $response->assertSee('Our Geographic Distribution');

        // Verify World / India toggle buttons
        $response->assertSee('id="geo-toggle-world"', false);
        $response->assertSee('id="geo-toggle-india"', false);

        // Verify narrative headline and legend items from design reference
        $response->assertSee('Rooted Locally.');
        $response->assertSee('Respected Globally.');
        $response->assertSee('Global footprint spanning');
        $response->assertSee('over 60 countries');
        $response->assertSee('India: Our');
        $response->assertSee('Manufacturing Hub');

        // Verify world map background image
        $response->assertSee('about-distribution-world.jpg');
    }

    /**
     * Test that the manufacturing excellence section renders with title and 3 interactive hover boxes.
     */
    public function test_about_page_renders_manufacturing_excellence_section(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        // Verify section container and heading
        $response->assertSee('id="about-manufacturing-section"', false);
        $response->assertSee('Manufacturing Excellence');

        // Verify 3 boxes titles and descriptions from reference
        $response->assertSee('Controlled Material Inputs');
        $response->assertSee('Controlled material inputs help establish consistency across manufacturing processes and support reliable product performance.');

        $response->assertSee('Process &amp; Formulation Expertise', false);
        $response->assertSee('Our process and formulation expertise enables us to translate material knowledge into products designed for specific print and application requirements.');

        $response->assertSee('Application-Based Quality Control');
        $response->assertSee('Quality control is aligned with application requirements to help ensure that products deliver consistent and reliable performance in their intended use.');

        // Verify background and box hover images
        $response->assertSee('about-manufacturing-bg');
        $response->assertSee('about-manufacturing-1.jpg');
        $response->assertSee('about-manufacturing-2.jpg');
        $response->assertSee('about-manufacturing-3.jpg');

        // Verify closing CTA
        $response->assertSee('Let’s Build the Future Together.', false);
        $response->assertSee('Contact Us');
    }
}
