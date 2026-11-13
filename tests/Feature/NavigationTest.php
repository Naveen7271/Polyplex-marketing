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
        $response->assertSee('Polyester Offset Plate');
        $response->assertSee('Laser &amp; Inkjet Offset Print', false);

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
        $response->assertSee('india-reach-icon.png');

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
        $response->assertSee('news-1-tamil-nadu.jpg');
        $response->assertSee('news-2-loupe-toray.jpg');
        $response->assertSee('news-3-loupe-asahi.jpg');
        $response->assertSee('news-4-digital-yatra-delhi.jpg');
        $response->assertSee('news-5-media-expo.jpg');
        $response->assertSee('news-6-digital-yatra-kolhapur.jpg');

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
        $response->assertSee('news-1-tamil-nadu.jpg');
        $response->assertSee('news-2-loupe-toray.jpg');
        $response->assertSee('news-3-loupe-asahi.jpg');
        $response->assertSee('news-4-digital-yatra-delhi.jpg');
        $response->assertSee('news-5-media-expo.jpg');
        $response->assertSee('news-6-digital-yatra-kolhapur.jpg');

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
}
