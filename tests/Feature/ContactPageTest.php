<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactPageTest extends TestCase
{
    /**
     * Test that the contact page is accessible and returns HTTP 200.
     */
    public function test_contact_page_is_accessible(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    /**
     * Test that the /contact-us alias redirects to /contact.
     */
    public function test_contact_us_alias_redirects_to_contact(): void
    {
        $response = $this->get('/contact-us');

        $response->assertRedirect('/contact');
    }

    /**
     * Test that the contact page renders the first section with hero headline and support narrative.
     */
    public function test_contact_page_renders_first_section_hero_and_support_content(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);

        // Section container and accessibility id
        $response->assertSee('id="contact-hero"', false);

        // Eyebrow overline
        $response->assertSee('POLYPLEX DIGIPRINT SUPPORT');

        // Main headline
        $response->assertSee('We&#039;re Here to Help', false);

        // Narrative copy
        $response->assertSee('From offering expert advice to solving complex problems, we&#039;ve got you covered.', false);
    }

    /**
     * Test that the contact page renders all form inputs, placeholders, and the submit button.
     */
    public function test_contact_page_renders_all_form_fields_matching_design(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);

        // Form container
        $response->assertSee('id="contact-support-form"', false);

        // Full Name Field
        $response->assertSee('Full Name');
        $response->assertSee('placeholder="Your Name"', false);
        $response->assertSee('name="name"', false);

        // Email Address Field
        $response->assertSee('Email Address');
        $response->assertSee('placeholder="Email Address"', false);
        $response->assertSee('name="email"', false);

        // Phone Number Field
        $response->assertSee('Phone Number');
        $response->assertSee('placeholder="Phone Number"', false);
        $response->assertSee('name="phone"', false);

        // Message Field
        $response->assertSee('Message');
        $response->assertSee('placeholder="Type your message here"', false);
        $response->assertSee('name="message"', false);

        // Submit Button
        $response->assertSee('id="contact-submit-btn"', false);
        $response->assertSee('Submit');
    }

    /**
     * Test that valid form submission succeeds and flashes success session message.
     */
    public function test_contact_form_submission_success(): void
    {
        $response = $this->post(route('contact.submit'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+91 98765 43210',
            'message' => 'Looking for NovaJet synthetic paper samples.',
        ]);

        $response->assertSessionHas('success');
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that invalid form submission returns validation errors.
     */
    public function test_contact_form_submission_validation_errors(): void
    {
        $response = $this->post(route('contact.submit'), [
            'name' => '',
            'email' => 'not-an-email',
            'message' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    /**
     * Test that the navbar marks the Contact item as active when on /contact.
     */
    public function test_navbar_highlights_contact_when_active(): void
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200);
        $response->assertSee('text-[#0E4174] border-[#0E4174] font-medium', false);
    }

    /**
     * Test that the contact page renders the second section: contact details cards and corporate office map.
     */
    public function test_contact_page_renders_second_section_details_cards_and_office_map(): void
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200);

        // Section container
        $response->assertSee('id="contact-details-section"', false);

        // Card 1: Email
        $response->assertSee('Email');
        $response->assertSee('corp@technovaprintrite.com');

        // Card 2: Phone
        $response->assertSee('Phone');
        $response->assertSee('+91-8879792658');
        $response->assertSee('+91-8879792659');

        // Card 3: Corporate Office Address
        $response->assertSee('Corporate Office Address');
        $response->assertSee('Plot No. C2, M.I.D.C. Taloja');
        $response->assertSee('District Raigad, Maharashtra');
        $response->assertSee('410208, India');

        // Card 4: Registered Address
        $response->assertSee('Registered Address');
        $response->assertSee('F-5, 1st Floor, Laxmi Woollen Mills Estate');
        $response->assertSee('Dr. E. Moses Road, Shakti Mill Lane, Mahalaxmi');
        $response->assertSee('Mumbai, Maharashtra 400011, India');

        // Corporate Office Location Map Section
        $response->assertSee('Corporate Office Location');
        $response->assertSee('contact-corporate-location.png');
        $response->assertSee('Open in Google Maps');
    }

    /**
     * Test that the contact page renders the last section: Call To Action.
     */
    public function test_contact_page_renders_last_section_cta(): void
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200);

        // Verify CTA Headline
        $response->assertSee('Let’s Build the Future Together.');

        // Verify CTA Narrative
        $response->assertSee('Have a requirement, need help finding the right media solutions');
        $response->assertSee('explore an opportunity with Polyplex DigiPrint? Connect with our team.');

        // Verify CTA Button
        $response->assertSee('Contact Us');
        $response->assertSee('href="#contact-hero"', false);
    }
}
