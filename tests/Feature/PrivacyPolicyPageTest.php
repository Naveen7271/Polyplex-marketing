<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrivacyPolicyPageTest extends TestCase
{
    /**
     * Test that the privacy policy page is accessible and returns HTTP 200.
     */
    public function test_privacy_policy_page_is_accessible(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertStatus(200);
    }

    /**
     * Test that /privacy alias redirects to /privacy-policy.
     */
    public function test_privacy_alias_redirects_to_privacy_policy(): void
    {
        $response = $this->get('/privacy');

        $response->assertRedirect('/privacy-policy');
    }

    /**
     * Test that the privacy policy page renders the first section atmospheric hero banner.
     */
    public function test_privacy_policy_page_renders_first_section_hero_banner(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertStatus(200);

        // Section container and accessibility id
        $response->assertSee('id="privacy-hero"', false);

        // Main headline
        $response->assertSee('Privacy Policy', false);

        // Exact introductory narrative from user design reference
        $response->assertSee(
            'Polyplex DigiPrint is committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, process, store and protect your personal information when you visit our website, use our services or interact with us. We value your trust and are committed to handling your personal information responsibly and in accordance with applicable data protection laws.',
            false
        );
    }

    /**
     * Test that the privacy hero section blade component supports custom props.
     */
    public function test_privacy_hero_component_renders_with_custom_props(): void
    {
        $view = $this->blade(
            '<x-privacy-hero-section :headline="$headline" :description="$desc" />',
            [
                'headline' => 'Custom Privacy Statement',
                'desc' => 'Custom descriptive paragraph for data protection.',
            ]
        );

        $view->assertSee('Custom Privacy Statement');
        $view->assertSee('Custom descriptive paragraph for data protection.');
    }

    /**
     * Test that the privacy policy alias component also works properly.
     */
    public function test_privacy_policy_hero_alias_component_renders(): void
    {
        $view = $this->blade('<x-privacy-policy-hero-section />');

        $view->assertSee('Privacy Policy');
        $view->assertSee('Polyplex DigiPrint is committed to protecting your privacy');
    }

    /**
     * Test that the privacy policy page renders all 12 policy sections matching the design specifications.
     */
    public function test_privacy_policy_page_renders_all_twelve_policy_sections(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertStatus(200);
        $response->assertSee('id="privacy-content"', false);

        // Section 1: Information we collect
        $response->assertSee('1. Information we collect');
        $response->assertSee('Personal information provided by you');
        $response->assertSee('Automatically collected information');
        $response->assertSee('Information from third parties');
        $response->assertSee('Office or business address');
        $response->assertSee('Where applicable, IP addresses may be anonymised for website analytics and performance measurement.');

        // Section 2: How we use your information
        $response->assertSee('2. How we use your information');
        $response->assertSee('To respond to enquiries and provide customer support.');
        $response->assertSee('To maintain website security and prevent misuse.');

        // Section 3: Legal basis for processing
        $response->assertSee('3. Legal basis for processing');
        $response->assertSee('Consent:');
        $response->assertSee('Legitimate Interests:');
        $response->assertSee('Contractual Necessity:');
        $response->assertSee('Legal Obligations:');

        // Section 4: Sharing of information
        $response->assertSee('4. Sharing of information');
        $response->assertSee('We do not sell your personal information to third parties.');
        $response->assertSee('Service Providers:');
        $response->assertSee('Business Partners:');
        $response->assertSee('Legal and Regulatory Authorities:');
        $response->assertSee('Business Transfers:');

        // Section 5: Cookies and website tracking
        $response->assertSee('5. Cookies and website tracking');
        $response->assertSee('Google Analytics');

        // Section 6: Data security
        $response->assertSee('6. Data security');
        $response->assertSee('SSL or TLS encryption');

        // Section 7: Data retention
        $response->assertSee('7. Data retention');

        // Section 8: External links
        $response->assertSee('8. External links');

        // Section 9: Your privacy rights
        $response->assertSee('9. Your privacy rights');
        $response->assertSee('Right to Access:');
        $response->assertSee('Right to Rectification:');
        $response->assertSee('Right to Erasure:');
        $response->assertSee('Right to Withdraw Consent:');
        $response->assertSee('Right to Restrict Processing:');
        $response->assertSee('Right to Data Portability:');
        $response->assertSee('Right to Object:');

        // Section 10: Personal data breaches
        $response->assertSee('10. Personal data breaches');

        // Section 11: Changes to this privacy policy
        $response->assertSee('11. Changes to this privacy policy');

        // Section 12: Contact us
        $response->assertSee('12. Contact us');
        $response->assertSee('corp@technovaprintrite.com');
        $response->assertSee('Polyplex Europa Polyester Film Sanayi Ve Ticaret Anonim Sirketi');
        $response->assertSee('Effective Date:');
        $response->assertSee('5th Nov 2026');
        $response->assertSee('Last Updated:');
    }

    /**
     * Test that the privacy content section component and its alias render directly.
     */
    public function test_privacy_content_components_render_directly(): void
    {
        $view1 = $this->blade('<x-privacy-content-section />');
        $view1->assertSee('1. Information we collect');
        $view1->assertSee('12. Contact us');

        $view2 = $this->blade('<x-privacy-policy-content-section />');
        $view2->assertSee('1. Information we collect');
        $view2->assertSee('12. Contact us');
    }

    /**
     * Test that the privacy policy page renders the CTA banner section.
     */
    public function test_privacy_policy_page_renders_cta_section(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertStatus(200);
        $response->assertSee('Let’s Build the Future Together.');
        $response->assertSee('Contact Us');
        $response->assertSee(route('contact'));
    }

    /**
     * Test that the footer contains a working link to the privacy policy page.
     */
    public function test_footer_links_to_privacy_policy_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('privacy-policy'));
    }
}
