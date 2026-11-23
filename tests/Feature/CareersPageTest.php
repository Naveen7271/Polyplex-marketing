<?php

namespace Tests\Feature;

use Tests\TestCase;

class CareersPageTest extends TestCase
{
    /**
     * Test that the careers page is accessible and renders the hero section.
     */
    public function test_careers_page_is_accessible_and_renders_hero_section(): void
    {
        $response = $this->get('/careers');

        $response->assertStatus(200);

        // Verify the tag and headline
        $response->assertSee('CAREERS', false);
        $response->assertSee('Make your mark.', false);

        // Verify subheadline, description, and CTA button
        $response->assertSee('Build what&#039;s next in print with Polyplex DigiPrint.', false);
        $response->assertSee('Bring your ideas, ambition and expertise to a workplace where innovation thrives', false);
        $response->assertSee('View Open Positions', false);

        // Verify hero section container ID
        $response->assertSee('id="careers-hero"', false);

        // Verify presence of the 5 team images
        $response->assertSee('team-1.jpg', false);
        $response->assertSee('team-2.jpg', false);
        $response->assertSee('team-3.jpg', false);
        $response->assertSee('team-4.jpg', false);
        $response->assertSee('team-5.jpg', false);
    }

    /**
     * Test that the careers page renders the culture, video, stats, and expectations section.
     */
    public function test_careers_page_renders_culture_and_expectations_section(): void
    {
        $response = $this->get('/careers');

        $response->assertStatus(200);

        // Verify video banner headline & button
        $response->assertSee('Discover how our people describe', false);
        $response->assertSee('Polyplex DigiPrint.', false);
        $response->assertSee('Watch Video', false);

        // Verify red stat bar numbers and labels
        $response->assertSee('09', false);
        $response->assertSee('Manufacturing Locations', false);
        $response->assertSee('02', false);
        $response->assertSee('R&amp;D Facilities', false);
        $response->assertSee('12', false);
        $response->assertSee('Distribution &amp; Convention Centres', false);

        // Verify expectations title
        $response->assertSee('What You Can Expect at Polyplex DigiPrint', false);

        // Verify 3 pillar cards
        $response->assertSee('Opportunities to Grow', false);
        $response->assertSee('Take on meaningful responsibilities, expand your capabilities', false);

        $response->assertSee('Freedom to Contribute', false);
        $response->assertSee('Bring your ideas, creativity and expertise to work every day', false);

        $response->assertSee('A Culture of Collaboration', false);
        $response->assertSee('Work alongside supportive colleagues in an environment that values teamwork', false);
    }

    /**
     * Test that the careers page renders the open positions section with all 11 jobs,
     * expandable details, and candidate application modal.
     */
    public function test_careers_page_renders_open_positions_accordion_and_modal(): void
    {
        $response = $this->get('/careers');

        $response->assertStatus(200);

        // Verify section title and description
        $response->assertSee('Open Positions', false);
        $response->assertSee('Explore current opportunities at PolyPlex DigiPrint', false);
        $response->assertSee('id="open-positions"', false);

        // Verify all 11 jobs from the design reference are listed
        $expectedJobs = [
            'Account Manager',
            'Production Manager',
            'Manufacturing Engineer',
            'Quality Control Engineer',
            'Maintenance Engineer',
            'Machine Operator',
            'Supply Chain Manager',
            'Procurement Executive',
            'Warehouse Supervisor',
            'Health and Safety Officer',
            'Research and Development Engineer',
        ];

        foreach ($expectedJobs as $jobTitle) {
            $response->assertSee($jobTitle, false);
        }

        // Verify Account Manager expanded details matching the design mockups
        $response->assertSee('Job Summary', false);
        $response->assertSee('primary point of contact for assigned clients', false);

        $response->assertSee('Key Responsibilities', false);
        $response->assertSee('Build and maintain strong client relationships with clear, consistent communication.', false);
        $response->assertSee('Manage project timelines, budgets, and deliverables', false);

        $response->assertSee('Qualifications', false);
        $response->assertSee('2–4 years of experience in client servicing/account management', false);
        $response->assertSee('A dynamic and creative workplace that values collaboration and innovation.', false);

        // Verify resume application call to action & modal
        $response->assertSee('Click here', false);
        $response->assertSee('to send us your resume', false);
        $response->assertSee('id="career-resume-modal"', false);
        $response->assertSee('Send Your Resume', false);
    }

    /**
     * Test that /career alias redirects to /careers.
     */
    public function test_career_alias_redirects_to_careers(): void
    {
        $response = $this->get('/career');

        $response->assertRedirect('/careers');
    }
}
