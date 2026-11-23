<?php

namespace Tests\Feature;

use Tests\TestCase;

class BlogPageTest extends TestCase
{
    /**
     * Test the blog and news page renders successfully.
     */
    public function test_blog_page_renders_successfully(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('Blog &amp; News | Polyplex DigiPrint', false);
    }

    /**
     * Test redirect aliases to the main blog route.
     */
    public function test_blog_aliases_redirect_to_blog(): void
    {
        $responseBlogs = $this->get('/blogs');
        $responseBlogs->assertRedirect('/blog');

        $responseNews = $this->get('/news');
        $responseNews->assertRedirect('/blog?tab=news');

        $responseBlogAndNews = $this->get('/blog-and-news');
        $responseBlogAndNews->assertRedirect('/blog');
    }

    /**
     * Test first section renders the category tabs for Blogs, News & Events, and Newsletter.
     */
    public function test_first_section_renders_category_filter_tabs(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('id="blog-tab-blogs"', false);
        $response->assertSee('BLOGS');
        $response->assertSee('id="blog-tab-news"', false);
        $response->assertSee('NEWS &amp; EVENTS', false);
        $response->assertSee('id="blog-tab-newsletter"', false);
        $response->assertSee('NEWSLETTER');
    }

    /**
     * Test first section renders the featured blog card with badge, title, excerpt, and CTA button.
     */
    public function test_first_section_renders_featured_blog_hero_banner(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);

        // Eyebrow badge
        $response->assertSee('FEATURED BLOG');

        // Headline
        $response->assertSee('Coloured Paper: Do Bright Colours Affect Paper', false);
        $response->assertSee('Recyclability?', false);

        // Excerpt
        $response->assertSee('Colourful paper makes packaging, labels, brochures and printed materials visually striking', false);

        // Read More CTA Button
        $response->assertSee('id="btn-read-more-blog"', false);
        $response->assertSee('Read More');

        // Background Image
        $response->assertSee('images/blog/blog-hero-bg.jpg');
    }

    /**
     * Test the featured blog Read More button links directly to the individual blog page.
     */
    public function test_featured_blog_read_more_button_links_to_individual_blog_page(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('id="btn-read-more-blog"', false);
        $response->assertSee(route('blog.show', 'coloured-paper-recyclability'), false);
    }

    /**
     * Test navigation bar marks Blog & News active when on the blog page.
     */
    public function test_navbar_marks_blog_active_on_blog_page(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('href="http://localhost:8000/blog"', false);
        $response->assertSee('Blog &amp; News', false);
    }

    /**
     * Test second section renders "MORE TO EXPLORE" with the 4 featured cards.
     */
    public function test_second_section_renders_more_to_explore_grid(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);

        // Eyebrow Header
        $response->assertSee('MORE TO EXPLORE');

        // Card 1
        $response->assertSee('Customised Print Solutions for Businesses');
        $response->assertSee('Professional printing for growing brands');
        $response->assertSee('images/blog/explore-1-customised-print.jpg');

        // Card 2
        $response->assertSee('Choosing Media for Business Printing');
        $response->assertSee('Find the perfect paper finish');
        $response->assertSee('images/blog/explore-2-choosing-media.jpg');

        // Card 3
        $response->assertSee('Business Cards That Last Longer');
        $response->assertSee('Make every first impression count');
        $response->assertSee('images/blog/explore-3-business-cards.jpg');

        // Card 4
        $response->assertSee('Brochure Designs That Drive Engagement');
        $response->assertSee('Turn business information into interest');
        $response->assertSee('images/blog/explore-4-brochure-designs.jpg');
    }

    /**
     * Test more to explore pagination dots and next controls.
     */
    public function test_more_to_explore_pagination_controls(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('id="explore-dot-1"', false);
        $response->assertSee('id="explore-dot-2"', false);
        $response->assertSee('id="explore-dot-3"', false);
        $response->assertSee('id="explore-next-btn"', false);

        // Verify CTA section exists below More to Explore
        $response->assertSee('Let’s Build the Future Together.', false);
        $response->assertSee('Contact Us');
    }

    /**
     * Test News and Events featured hero banner is rendered with badge, title, dates, and CTA button.
     */
    public function test_news_and_events_featured_hero_banner_is_rendered(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);

        // Featured News Eyebrow Badge
        $response->assertSee('FEATURED NEWS');

        // Headline
        $response->assertSee('Tamil Nadu Print &amp; Pack 2026', false);

        // Date Range Subtitle
        $response->assertSee('02 October 2026 – 04 October 2026');

        // Read More CTA Button
        $response->assertSee('id="btn-read-more-news"', false);

        // Background Image
        $response->assertSee('images/blog/news-hero-bg.jpg');
    }

    /**
     * Test the featured news Read More button links directly to the individual news page.
     */
    public function test_featured_news_read_more_button_links_to_individual_news_page(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('id="btn-read-more-news"', false);
        $response->assertSee(route('news.show', 'tamil-nadu-print-and-pack-2026'), false);
    }

    /**
     * Test News and Events secondary explore grid is rendered.
     */
    public function test_news_and_events_explore_grid_is_rendered(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);

        // Secondary News Title
        $response->assertSee('Explore News About People and Technology');

        // 6 News Cards
        $response->assertSee('Loupe India 2026 – Toray');
        $response->assertSee('Loupe India 2026 – Asahi');
        $response->assertSee('Digital Yatra 2026, Delhi');
        $response->assertSee('Media Expo 2026');
        $response->assertSee('Digital Yatra 2026, Kolhapur');

        // Verify Cards link to their individual news pages
        $response->assertSee(route('news.show', 'tamil-nadu-print-and-pack-2026'), false);
        $response->assertSee(route('news.show', 'loupe-india-2026-toray'), false);
    }

    /**
     * Test the individual news page renders the common layout with full content.
     */
    public function test_individual_news_page_renders_successfully(): void
    {
        $response = $this->get('/news/tamil-nadu-print-and-pack-2026');

        $response->assertStatus(200);

        // Header and Eyebrow
        $response->assertSee('NOV 2026');
        $response->assertSee('Tamil Nadu Print &amp; Pack 2026', false);

        // Tag Badges
        $response->assertSee('Print Media');
        $response->assertSee('Printing Industry');
        $response->assertSee('Printing Materials');
        $response->assertSee('Digital Printing');
        $response->assertSee('Printing Applications');

        // Like & Share Actions
        $response->assertSee('id="news-like-btn"', false);
        $response->assertSee('id="news-like-count"', false);
        $response->assertSee('id="news-share-btn"', false);

        // Featured Image
        $response->assertSee('images/blog/news-tamil-nadu-featured.jpg');

        // Main Body Sections
        $response->assertSee('Connecting with the Printing &amp; Packaging Industry', false);
        $response->assertSee('Polyplex DigiPrint marked its presence at Tamil Nadu Print &amp; Pack 2026', false);
        $response->assertSee('Exploring Industry Developments');
        $response->assertSee('Event Details');
        $response->assertSee('Codissia Trade Fair Centre, Coimbatore, Tamil Nadu');
        $response->assertSee('Stall:');
        $response->assertSee('A-5');

        // Bottom Secondary News Section
        $response->assertSee('Explore News About People and Technology');
        $response->assertSee('Loupe India 2026 – Toray');

        // Closing CTA
        $response->assertSee('Let’s Build the Future Together.', false);
        $response->assertSee('Contact Us');
    }

    /**
     * Test individual news page handles dynamic slugs.
     */
    public function test_individual_news_page_with_dynamic_slug(): void
    {
        $response = $this->get('/news/loupe-india-2026-toray');

        $response->assertStatus(200);
        $response->assertSee('Loupe India 2026 – Toray');
        $response->assertSee('Bombay Exhibition Centre, NESCO, Mumbai');
        $response->assertSee('Explore News About People and Technology');
    }

    /**
     * Test the individual blog page renders the common layout with full content.
     */
    public function test_individual_blog_page_renders_successfully(): void
    {
        $response = $this->get('/blog/coloured-paper-recyclability');

        $response->assertStatus(200);

        // Header and Eyebrow
        $response->assertSee('NOV 2026');
        $response->assertSee('Coloured Paper: Do Bright Colours Affect Paper', false);
        $response->assertSee('Recyclability?', false);

        // Tag Badges
        $response->assertSee('Coloured Paper');
        $response->assertSee('Paper Recycling');
        $response->assertSee('Sustainable Printing');
        $response->assertSee('Paper Dyes &amp; Pigments', false);
        $response->assertSee('Sustainable Packaging');

        // Like & Share Actions
        $response->assertSee('id="blog-like-btn"', false);
        $response->assertSee('id="blog-like-count"', false);
        $response->assertSee('id="blog-share-btn"', false);

        // Featured Image
        $response->assertSee('images/blog/coloured-paper-featured-hires.jpg');

        // Main Body Sections
        $response->assertSee('What Makes Paper Coloured?');
        $response->assertSee('Why Does Paper Colour Matter During Recycling?');
        $response->assertSee('Do Bright Colours Make Paper Less Recyclable?');
        $response->assertSee('How Does the Paper Recycling Process Handle Colour?');
        $response->assertSee('What Other Factors Affect the Recyclability of Coloured Paper?');
        $response->assertSee('How Can Businesses Choose More Recyclable Coloured Paper?');
        $response->assertSee('Can Brightly Coloured Paper Be Recycled into New Paper Products?');

        // FAQs
        $response->assertSee('Frequently Asked Questions (FAQs)');
        $response->assertSee('Is coloured paper recyclable?');
        $response->assertSee('Does dark-coloured paper affect recycled paper quality?');

        // Conclusion
        $response->assertSee('Conclusion: Colour Is Not the Enemy of Recycling');

        // Bottom Latest Blogs Curated Section
        $response->assertSee('LATEST BLOGS');
        $response->assertSee('Customised Print Solutions for Businesses');

        // Closing CTA
        $response->assertSee('Let’s Build the Future Together.', false);
        $response->assertSee('Contact Us');
    }

    /**
     * Test alias redirects to the individual blog page.
     */
    public function test_individual_blog_aliases(): void
    {
        $response = $this->get('/blogs/coloured-paper-recyclability');
        $response->assertRedirect('/blog/coloured-paper-recyclability');
    }

    /**
     * Test individual blog page handles dynamic slugs.
     */
    public function test_individual_blog_with_dynamic_slug(): void
    {
        $response = $this->get('/blog/customised-print-solutions-for-businesses');

        $response->assertStatus(200);
        $response->assertSee('Customised Print Solutions for Businesses');
        $response->assertSee('images/blog/explore-1-customised-print.jpg');
        $response->assertSee('LATEST BLOGS');
    }
}
