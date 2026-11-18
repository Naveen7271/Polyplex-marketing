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

        // Exact headline from user's design reference
        $response->assertSee('Solutions Designed for Diverse Industries', false);

        // Exact narrative description from user's design reference
        $response->assertSee(
            'Polyplex DigiPrint brings together material expertise and printing industry knowledge to support a wide range of applications across commercial, industrial, retail and specialised printing environments.',
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

        // Card 1: Commercial Printing
        $response->assertSee('Commercial Printing', false);
        $response->assertSee(
            'Commercial printing continues to play an important role in business communication, marketing and brand promotion. From brochures and catalogues to promotional materials and business documents, the industry demands versatile substrates that deliver quality, consistency and reliable print performance.',
            false
        );

        // Card 2: Photography and Imaging
        $response->assertSee('Photography and Imaging', false);
        $response->assertSee(
            'Photography and imaging rely on print media that reproduces colours, details and visual depth with accuracy. From photographic prints to digital proofing, suitable materials support image quality across professional and creative applications.',
            false
        );

        // Card 3: Publishing and Printing
        $response->assertSee('Publishing and Printing', false);
        $response->assertSee(
            'Publishing and printing bring written and visual content to audiences through books, magazines, journals and other publications. Reliable print media supports text clarity, image reproduction and consistent output across publishing requirements.',
            false
        );

        // Card 4: Advertising and Marketing
        $response->assertSee('Advertising and Marketing', false);
        $response->assertSee(
            'Advertising and marketing use printed communication to build brand visibility, promote offerings and engage audiences. From campaign materials and promotional graphics to branded collateral, print media supports impactful communication across marketing channels.',
            false
        );

        // Card 5: Packaging and Labelling
        $response->assertSee('Packaging and Labelling', false);
        $response->assertSee(
            'Packaging and labelling support product identification, information sharing and brand presentation across industries. Print media enables clear reproduction of product details, graphics and branding across different packaging formats and labelling applications.',
            false
        );

        // Card 6: Retail and Point-of-Sale
        $response->assertSee('Retail and Point-of-Sale', false);
        $response->assertSee(
            'Retail environments use printed materials to highlight products, communicate promotions and improve customer engagement. From shelf displays and pricing materials to promotional graphics, print media supports effective communication across physical shopping spaces.',
            false
        );

        // Card 7: Healthcare
        $response->assertSee('Healthcare', false);
        $response->assertSee(
            'Healthcare environments depend on clear and reliable printed communication. From patient records and medical documentation to identification labels and informational materials, print media supports information exchange and organised workflows across healthcare facilities.',
            false
        );

        // Card 8: Education
        $response->assertSee('Education', false);
        $response->assertSee(
            'Educational institutions rely on printed materials for learning, communication and administration. From textbooks and classroom resources to examination papers and certificates, print media supports knowledge sharing and everyday academic activities.',
            false
        );

        // Card 9: Office and Corporate
        $response->assertSee('Office and Corporate', false);
        $response->assertSee(
            'Office and corporate environments require dependable print media for documentation and daily communication. From business reports and presentations to internal records and forms, printed materials support information management and workplace operations.',
            false
        );

        // Card 10: Logistics and Supply Chain
        $response->assertSee('Logistics and Supply Chain', false);
        $response->assertSee(
            'Logistics operations depend on accurate printed information for identification and tracking. From shipping labels and barcodes to inventory records and package documentation, print media supports organised processes and information flow across supply chains.',
            false
        );

        // Card 11: Architecture, Engineering and Construction
        $response->assertSee('Architecture, Engineering and Construction', false);
        $response->assertSee(
            'Architecture, engineering and construction rely on precise printed documentation and technical visualisation. From architectural drawings and engineering plans to construction layouts, print media supports detailed reproduction and effective project communication.',
            false
        );

        // Card 12: Textile and Garments
        $response->assertSee('Textile and Garments', false);
        $response->assertSee(
            'The textile and garment industry uses printed materials across design, production and identification processes. From pattern printing and technical documentation to labels and tags, print media supports varied creative and operational requirements.',
            false
        );

        // Card 13: Signage and Visuals Communication
        $response->assertSee('Signage and Visuals Communication', false);
        $response->assertSee(
            'Signage and visual communication help businesses share information, establish visibility and guide audiences. From directional signs and promotional graphics to informational displays, print media supports clear messaging across commercial and public environments.',
            false
        );

        // Card 14: Manufacturing and Industrial
        $response->assertSee('Manufacturing and Industrial', false);
        $response->assertSee(
            'Manufacturing and industrial environments rely on printed materials for product identification, operational communication and equipment labelling. From barcode labels and technical documentation to safety signage, print media supports organised workflows and information management across industrial operations.',
            false
        );
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
