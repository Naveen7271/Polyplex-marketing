<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndustriesPageTest extends TestCase
{
    /**
     * Test that the industries page is accessible and returns HTTP 200.
     */
    public function test_industries_page_is_accessible(): void
    {
        $response = $this->get('/industries');

        $response->assertStatus(200);
    }

    /**
     * Test that /industry alias redirects to /industries.
     */
    public function test_industry_alias_redirects_to_industries(): void
    {
        $response = $this->get('/industry');

        $response->assertRedirect('/industries');
    }

    /**
     * Test that the industries page renders the first section atmospheric hero banner.
     */
    public function test_industries_page_renders_first_section_hero_banner(): void
    {
        $response = $this->get('/industries');

        $response->assertStatus(200);

        // Section container and accessibility label
        $response->assertSee('id="industries-hero"', false);

        // Exact headline, badge copy, and narrative from user's design reference
        $response->assertSee('Industries', false);
        $response->assertSee('Solutions for the', false);
        $response->assertSee('Way Your Industry', false);
        $response->assertSee('Prints.', false);
        $response->assertSee('Explore media by the work you create.', false);
        $response->assertSee(
            'Different industries use print for different purposes—from brand presentation and photography to labels, technical drawings and operational identification. Explore typical applications and connect with our team to determine which approved Polyplex DigiPrint product grades suit your workflow.',
            false
        );
    }

    /**
     * Test that the industries hero section blade component supports custom props.
     */
    public function test_industries_hero_component_renders_with_custom_props(): void
    {
        $view = $this->blade(
            '<x-industries-hero-section :headline="$headline" :description="$desc" />',
            [
                'headline' => 'Custom Industry Headline',
                'desc' => 'Custom descriptive paragraph for specialized print substrates.',
            ]
        );

        $view->assertSee('Custom Industry Headline', false);
        $view->assertSee('Custom descriptive paragraph for specialized print substrates.', false);
    }

    /**
     * Test that the navbar highlights the Industries link as active on the industries page.
     */
    public function test_navbar_active_state_on_industries_page(): void
    {
        $response = $this->get('/industries');

        $response->assertStatus(200);

        // Active indicator on Industries desktop navigation link
        $response->assertSee('aria-current="page"', false);
    }

    /**
     * Test that the closing CTA section is rendered on the industries page.
     */
    public function test_industries_page_renders_cta_section(): void
    {
        $response = $this->get('/industries');

        $response->assertStatus(200);

        $response->assertSee('Let’s Build the Future Together.', false);
        $response->assertSee('Contact Us', false);
    }

    /**
     * Test that the industries discovery grid renders all 14 industry cards with titles and descriptions.
     */
    public function test_industries_page_renders_all_14_industry_cards(): void
    {
        $response = $this->get('/industries');

        $response->assertStatus(200);

        // Section container
        $response->assertSee('id="industries-grid"', false);
        $response->assertSee(
            'Choose your industry to view common print applications and relevant product families. Final product suitability should be determined by the specific media grade, printer and end-use conditions.',
            false
        );

        // Card 1: Commercial Printing
        $response->assertSee('Commercial Printing', false);
        $response->assertSee('Make Every Print Piece Count.', false);
        $response->assertSee(
            'From brochures and catalogues to premium presentation material, media selection can influence how printed communication looks and feels. Explore suitable commercial print media based on the intended finish, process and format.',
            false
        );

        // Card 2: Photography and Imaging
        $response->assertSee('Photography and Imaging', false);
        $response->assertSee('Turn Images into Keepsakes.', false);
        $response->assertSee(
            'Great photography deserves a thoughtful print presentation. Discover media for portraits, photobooks and creative photo output, selected for the required printer technology and finish.',
            false
        );

        // Card 3: Publishing and Printing
        $response->assertSee('Publishing and Printing', false);
        $response->assertSee('Bring Stories to the Printed Page.', false);
        $response->assertSee(
            'From short-run publications to image-led print pieces, choosing appropriate substrates supports the appearance and usability of finished publications.',
            false
        );

        // Card 4: Advertising and Marketing
        $response->assertSee('Advertising and Marketing', false);
        $response->assertSee('Make the Message Visible.', false);
        $response->assertSee(
            'Print continues to bring campaigns into shops, events and everyday spaces. Explore media for posters, display graphics and branded promotional applications.',
            false
        );

        // Card 5: Packaging and Labelling
        $response->assertSee('Packaging and Labelling', false);
        $response->assertSee('Give Every Pack a Stronger Presence.', false);
        $response->assertSee(
            'Packaging labels help communicate identity, information and presentation. Find self-adhesive media for selected printed label applications and compatible converting workflows.',
            false
        );

        // Card 6: Retail and Point-of-Sale
        $response->assertSee('Retail and Point-of-Sale', false);
        $response->assertSee('Catch Attention Where Decisions Happen.', false);
        $response->assertSee(
            'Shelf graphics, window messages and in-store displays help customers navigate products and promotions. Explore display and labelling media suited to the installation environment.',
            false
        );

        // Card 7: Healthcare
        $response->assertSee('Healthcare', false);
        $response->assertSee('Clear Information for Everyday Healthcare Workflows.', false);
        $response->assertSee(
            'Printed documents, administrative labels and information materials support communication and organisation in healthcare settings. Choose products only after confirming the specific application requirements.',
            false
        );

        // Card 8: Education
        $response->assertSee('Education', false);
        $response->assertSee('Support Learning Through Print.', false);
        $response->assertSee(
            'Educational institutions use printed materials for teaching, administration, identification and communication. Discover media options for learning resources, notices and general-purpose labels.',
            false
        );

        // Card 9: Office and Corporate
        $response->assertSee('Office and Corporate', false);
        $response->assertSee('Keep Business Communication Clear.', false);
        $response->assertSee(
            'From internal documents and labels to presentation materials, offices rely on printed information every day. Explore practical media for routine and special-use applications.',
            false
        );

        // Card 10: Logistics and Supply Chain
        $response->assertSee('Logistics and Supply Chain', false);
        $response->assertSee('Support Identification at Every Step.', false);
        $response->assertSee(
            'Packages, stock locations and internal workflows depend on legible identification. Explore relevant label and tag substrates, with adhesive and handling performance verified against the intended use.',
            false
        );

        // Card 11: Architecture, Engineering and Construction
        $response->assertSee('Architecture, Engineering and Construction', false);
        $response->assertSee('Make Technical Detail Easy to Read.', false);
        $response->assertSee(
            'Clear plans and technical drawings support coordination across project teams. Explore reprographic media for architectural, engineering and plotting applications.',
            false
        );

        // Card 12: Textile and Garments
        $response->assertSee('Textile and Garments', false);
        $response->assertSee('From Design Ideas to Product Identification.', false);
        $response->assertSee(
            'Printed patterns, product tags and labels contribute to the garment development and presentation process. Choose media according to the print equipment and application requirements.',
            false
        );

        // Card 13: Signage and Visual Communication
        $response->assertSee('Signage and Visual Communication', false);
        $response->assertSee('Make Messages Seen.', false);
        $response->assertSee(
            'Promotional displays, directional graphics and interior visuals turn printed media into useful communication. Explore formats and finishes that fit your printer and installation method.',
            false
        );

        // Card 14: Manufacturing and Industrial
        $response->assertSee('Manufacturing and Industrial', false);
        $response->assertSee('Help Information Stay Visible in the Workflow.', false);
        $response->assertSee(
            'Identification labels, internal tags and technical documents support daily manufacturing operations. Evaluate material, adhesive and print performance for each operating condition.',
            false
        );

        // Action link & product family pills
        $response->assertSee('Ask for Application Guidance', false);
        $response->assertSee('Gloss Art Paper Media', false);
        $response->assertSee('Non-Tear Media', false);
        $response->assertSee('Inkjet Photo Media', false);
        $response->assertSee('Polyester Offset Plates', false);
        $response->assertSee('Digital Wide-Format Media', false);
        $response->assertSee('Digital Labels', false);
        $response->assertSee('Multi-Purpose Labels', false);
        $response->assertSee('Reprographic Media', false);
    }

    /**
     * Test that the industries grid component renders with custom industries array.
     */
    public function test_industries_grid_component_renders_with_custom_array(): void
    {
        $customIndustries = [
            [
                'id' => 'custom-sector',
                'title' => 'Custom Print Sector',
                'image' => null,
                'alt' => 'Custom sector',
                'description' => 'Custom description for specialized testing.',
            ],
        ];

        $view = $this->blade(
            '<x-industries-grid-section :industries="$industries" />',
            ['industries' => $customIndustries]
        );

        $view->assertSee('Custom Print Sector', false);
        $view->assertSee('Custom description for specialized testing.', false);
    }
}
