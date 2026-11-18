<?php

namespace Tests\Feature;

use Tests\TestCase;

class TermsOfUsePageTest extends TestCase
{
    /**
     * Test that the terms of use page is accessible and returns HTTP 200.
     */
    public function test_terms_of_use_page_is_accessible(): void
    {
        $response = $this->get('/terms-of-use');

        $response->assertStatus(200);
    }

    /**
     * Test that /terms alias redirects to /terms-of-use.
     */
    public function test_terms_alias_redirects_to_terms_of_use(): void
    {
        $response = $this->get('/terms');

        $response->assertRedirect('/terms-of-use');
    }

    /**
     * Test that the terms of use page renders the first section atmospheric hero banner.
     */
    public function test_terms_of_use_page_renders_first_section_hero_banner(): void
    {
        $response = $this->get('/terms-of-use');

        $response->assertStatus(200);

        // Section container and accessibility id
        $response->assertSee('id="terms-hero"', false);

        // Main headline
        $response->assertSee('Terms of Use', false);

        // Exact introductory narrative from user design reference
        $response->assertSee(
            'Welcome to the website of Polyplex DigiPrint. By accessing or using this website, you agree to comply with the following Terms of Use. These terms govern your access to and use of the website, its content and the information and services made available through it. Please read these terms carefully before using the website. If you do not agree with any part of these terms, please discontinue your use of the website.',
            false
        );
    }

    /**
     * Test that the terms hero section blade component supports custom props.
     */
    public function test_terms_hero_component_renders_with_custom_props(): void
    {
        $view = $this->blade(
            '<x-terms-hero-section :headline="$headline" :description="$desc" />',
            [
                'headline' => 'Custom Terms Title',
                'desc' => 'Custom terms and conditions description.',
            ]
        );

        $view->assertSee('Custom Terms Title');
        $view->assertSee('Custom terms and conditions description.');
    }

    /**
     * Test that the terms of use hero alias component also works properly.
     */
    public function test_terms_of_use_hero_alias_component_renders(): void
    {
        $view = $this->blade('<x-terms-of-use-hero-section />');

        $view->assertSee('Terms of Use');
        $view->assertSee('Welcome to the website of Polyplex DigiPrint.');
    }

    /**
     * Test that the terms of use page renders all 14 policy sections matching the design specifications.
     */
    public function test_terms_of_use_page_renders_all_fourteen_policy_sections(): void
    {
        $response = $this->get('/terms-of-use');

        $response->assertStatus(200);
        $response->assertSee('id="terms-content"', false);

        // Section 1: Acceptance of terms
        $response->assertSee('1. Acceptance of terms');
        $response->assertSee('By accessing, browsing or using this website, you acknowledge that you have read, understood and agreed to these Terms of Use, along with our');
        $response->assertSee('We reserve the right to modify or update these terms at any time.');

        // Section 2: Website information and content
        $response->assertSee('2. Website information and content');
        $response->assertSee('The content available on this website is provided for general informational purposes.');
        $response->assertSee('While we make reasonable efforts to ensure that the information presented is accurate and up to date, we do not guarantee that all content is complete, accurate, current or free from errors.');
        $response->assertSee('Users are encouraged to contact our team to confirm specific product specifications');

        // Section 3: Acceptable use
        $response->assertSee('3. Acceptable use');
        $response->assertSee('You agree to use this website only for lawful purposes');
        $response->assertSee('Use the website for any unlawful, fraudulent or unauthorised purpose.');
        $response->assertSee('Attempt to gain unauthorised access to the website, its servers or related systems.');
        $response->assertSee('Introduce viruses, malicious code or other harmful technologies.');
        $response->assertSee('Interfere with the website’s functionality, security or performance.');
        $response->assertSee('Copy, reproduce, distribute or misuse website content without appropriate authorisation.');
        $response->assertSee('Use automated tools to extract or collect website information without prior permission.');
        $response->assertSee('Submit false, misleading or unauthorised information through website forms.');
        $response->assertSee('We reserve the right to restrict or suspend access where misuse or a violation of these terms is identified.');

        // Section 4: Intellectual property rights
        $response->assertSee('4. Intellectual property rights');
        $response->assertSee('Unless otherwise stated, all content on this website, including text, graphics, photographs, illustrations, logos, brand names, designs, layouts and other materials, is owned by or licensed to Polyplex DigiPrint or its respective rights holders.');
        $response->assertSee('These materials are protected by applicable intellectual property laws.');
        $response->assertSee('All trademarks, product names, brand identities and logos displayed on this website remain the property of their respective owners.');

        // Section 5: Product information and technical specifications
        $response->assertSee('5. Product information and technical specifications');
        $response->assertSee('Information about our products, media categories, substrates, technical characteristics, printing compatibility and applications is provided for general guidance.');
        $response->assertSee('Nothing on this website should be interpreted as a guarantee of product performance or suitability for a particular purpose');

        // Section 6: Enquiries and communication
        $response->assertSee('6. Enquiries and communication');
        $response->assertSee('You may use the contact forms and communication details provided on this website to submit enquiries');
        $response->assertSee('Submitting an enquiry through the website does not automatically create a contractual relationship');

        // Section 7: Third-party links
        $response->assertSee('7. Third-party links');
        $response->assertSee('This website may contain links to external websites, platforms or services for your convenience and reference.');
        $response->assertSee('These third-party websites are operated independently and are not controlled by Polyplex DigiPrint.');

        // Section 8: Website availability and security
        $response->assertSee('8. Website availability and security');
        $response->assertSee('We make reasonable efforts to maintain the availability, security and proper functioning of this website.');
        $response->assertSee('You are responsible for ensuring that the devices and systems you use to access the website are appropriately protected against viruses');

        // Section 9: Limitation of liability
        $response->assertSee('9. Limitation of liability');
        $response->assertSee('To the extent permitted by applicable law, Polyplex DigiPrint shall not be liable for any direct, indirect, incidental or consequential loss or damage arising from:');
        $response->assertSee('The use of, or inability to access, this website.');
        $response->assertSee('Reliance on information, content or materials available on the website.');
        $response->assertSee('Errors, omissions or inaccuracies in website content.');
        $response->assertSee('Temporary interruptions, technical issues or website unavailability.');
        $response->assertSee('Access to or use of third-party websites linked through our website.');
        $response->assertSee('Unauthorised access to or alteration of information transmitted through the website.');
        $response->assertSee('Nothing in these terms excludes or limits liability where such exclusion or limitation is prohibited by applicable law.');

        // Section 10: Indemnification
        $response->assertSee('10. Indemnification');
        $response->assertSee('To the extent permitted by applicable law, you agree to indemnify and hold harmless Polyplex DigiPrint, its affiliates, employees and representatives against claims');

        // Section 11: Privacy and data protection
        $response->assertSee('11. Privacy and data protection');
        $response->assertSee('Your use of this website is also subject to our');
        $response->assertSee('Privacy Policy');
        $response->assertSee('By using the website, you acknowledge that you have had the opportunity to review our Privacy Policy.');

        // Section 12: Changes to these terms
        $response->assertSee('12. Changes to these terms');
        $response->assertSee('We reserve the right to revise, modify or update these Terms of Use at any time without prior notice.');

        // Section 13: Governing law and jurisdiction
        $response->assertSee('13. Governing law and jurisdiction');
        $response->assertSee('These Terms of Use shall be governed by and interpreted in accordance with the laws of [Insert Applicable Jurisdiction].');
        $response->assertSee('competent courts of [Insert Applicable Location]');

        // Section 14: Contact us
        $response->assertSee('14. Contact us');
        $response->assertSee('For questions, concerns or clarification regarding these Terms of Use, please contact us:');
        $response->assertSee('corp@technovaprintrite.com');
        $response->assertSee('www.polyplexdigiprint.com');
        $response->assertSee('Effective Date:');
        $response->assertSee('Last Updated:');
        $response->assertSee('5th Nov 2026');
    }

    /**
     * Test that the terms content section component and its alias render directly.
     */
    public function test_terms_content_components_render_directly(): void
    {
        $view1 = $this->blade('<x-terms-content-section />');
        $view1->assertSee('1. Acceptance of terms');
        $view1->assertSee('14. Contact us');

        $view2 = $this->blade('<x-terms-of-use-content-section />');
        $view2->assertSee('1. Acceptance of terms');
        $view2->assertSee('14. Contact us');
    }

    /**
     * Test that the terms of use page renders the CTA banner section.
     */
    public function test_terms_of_use_page_renders_cta_section(): void
    {
        $response = $this->get('/terms-of-use');

        $response->assertStatus(200);
        $response->assertSee('Let’s Build the Future Together.');
        $response->assertSee('Contact Us');
        $response->assertSee(route('contact'));
    }

    /**
     * Test that the footer contains a working link to the terms of use page.
     */
    public function test_footer_links_to_terms_of_use_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('terms-of-use'));
    }
}
