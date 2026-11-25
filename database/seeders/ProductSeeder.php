<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Non-Tear Media',
                'slug' => 'non-tear-media',
                'category' => 'Non-Tear Media',
                'short_description' => 'Durable Print Media for Demanding Digital Applications',
                'description' => "Non-Tear Films are designed for applications where printed materials need to withstand regular handling while maintaining their appearances and useability.\n\nTheir durability and non-tear characteristics make them suitable for photo products, personal memories and commercial print applications where the finished material needs to offer a combination of print quality and long-term usability.",
                'banner_image' => 'images/products/banner-non-tear.jpg',
                'brochure_url' => '#download-brochure',
                'is_active' => true,
                'sort_order' => 1,
                'applications' => [
                    [
                        'title' => 'Wedding Albums',
                        'description' => 'Durable media for preserving wedding photographs and creating premium album pages designed for repeated viewing and handling.',
                        'image' => 'images/products/applications/wedding-albums.jpg',
                        'alt' => 'Wedding Albums durable synthetic photo album pages',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Travel Albums',
                        'description' => 'Suitable for travel memories and photo albums where pages need greater resistance to everyday handling.',
                        'image' => 'images/products/applications/travel-albums.jpg',
                        'alt' => 'Travel Albums resistant to frequent handling and flipping',
                        'sort_order' => 2,
                    ],
                    [
                        'title' => 'Newborn Photo Albums',
                        'description' => 'Designed for premium newborn and baby photography albums where image quality and durability are important.',
                        'image' => 'images/products/applications/newborn-photo-albums.jpg',
                        'alt' => 'Newborn Photo Albums archival keepsake prints',
                        'sort_order' => 3,
                    ],
                    [
                        'title' => 'Family Portraits',
                        'description' => 'Suitable for preserving family portraits and creating durable printed photo products.',
                        'image' => 'images/products/applications/family-portraits.jpg',
                        'alt' => 'Family Portraits durable keepsake printing',
                        'sort_order' => 4,
                    ],
                    [
                        'title' => 'Commercial Prints',
                        'description' => 'Can be used for applications such as bag tags, certificates and playing cards where non-tear performance can add value.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Commercial Prints luggage tags, certificates and playing cards',
                        'sort_order' => 5,
                    ],
                ],
            ],
            [
                'name' => 'Gloss Art Paper Media',
                'slug' => 'gloss-art-paper-media',
                'category' => 'Gloss Art Paper Media',
                'short_description' => 'Gloss-Finish Art Paper for Rich Commercial & Photo Reproduction',
                'description' => "Gloss Art Paper is designed for applications where a refined paper surface and high-quality visual reproduction are important.\n\nIts gloss finish makes it suitable for premium commercial and photo applications where imagery, colour reproductions and overall presentations contribute to the finished product experience.",
                'banner_image' => 'images/products/banner-gloss-art.jpg',
                'brochure_url' => '#download-brochure',
                'is_active' => true,
                'sort_order' => 2,
                'applications' => [
                    [
                        'title' => 'Lookbooks & Catalogues',
                        'description' => 'High gloss art paper media engineered for vibrant color reproduction in premium retail and fashion catalogues.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Lookbooks and commercial catalogue printing',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Art Reproductions',
                        'description' => 'Faithful fine art and photography reproductions requiring sharp contrast and deep saturation.',
                        'image' => 'images/products/applications/family-portraits.jpg',
                        'alt' => 'Art reproductions on gloss paper',
                        'sort_order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Inkjet Photo Media',
                'slug' => 'inkjet-photo-media',
                'category' => 'Inkjet Photo Media',
                'short_description' => 'Resin-Coated Photo Media for Detailed, Photorealistic Prints',
                'description' => "Inkjet Photo Media is developed for applications requiring detailed, high-quality image reproduction through aqueous dye and pigment inkjet technologies.\n\nThe media is suited to professional photo, proofing, display and image-based applications where colour reproduction, detail and overall image quality are important.",
                'banner_image' => 'images/products/banner-inkjet-photo.jpg',
                'brochure_url' => '#download-brochure',
                'is_active' => true,
                'sort_order' => 3,
                'applications' => [
                    [
                        'title' => 'Professional Portraiture',
                        'description' => 'Studio portraiture and exhibition-grade photographic printing with true skin tones and archival longevity.',
                        'image' => 'images/products/applications/family-portraits.jpg',
                        'alt' => 'Professional portraiture on inkjet photo media',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'High-End Keepsake Albums',
                        'description' => 'Photorealistic photo printing for luxury photo collections and presentation albums.',
                        'image' => 'images/products/applications/wedding-albums.jpg',
                        'alt' => 'Luxury keepsake photo albums',
                        'sort_order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Digital Labels',
                'slug' => 'digital-labels',
                'category' => 'Digital Labels',
                'short_description' => 'Versatile Label Media for Branding, Identification and Information',
                'description' => "Self-Adhesive Labels are designed for applications where printed information, branding or identification needs to be applied directly to products, packaging, assets or other surfaces.\n\nThe range supports diverse requirements across consumer products, industrial identification, logistics, retail and promotional applications.",
                'banner_image' => 'images/products/banner-digital-labels.jpg',
                'brochure_url' => '#download-brochure',
                'is_active' => true,
                'sort_order' => 4,
                'applications' => [
                    [
                        'title' => 'Packaging & Bottle Labels',
                        'description' => 'Durable self-adhesive labels for gourmet packaging, cosmetics, beverages, and retail jars.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Product packaging and bottle labels',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Industrial Asset Identification',
                        'description' => 'Robust labeling for machinery, barcode tags, logistics tracking, and asset management.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Industrial asset and inventory tags',
                        'sort_order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Multi-Purpose Labels',
                'slug' => 'multi-purpose-labels',
                'category' => 'Multi-Purpose Labels',
                'short_description' => 'Pre-Cut Self-Adhesive Labels for Everyday Identification & Tracking',
                'description' => "Multi-Purpose Labels are pre-cut, self-adhesive label solutions designed for a broad range of everyday identification and information requirements.\n\nSuitable for desktop inkjet and laser printing, these labels provide a convenient solution for on-demand printing across offices, products, inventory and operational applications.",
                'banner_image' => 'images/products/banner-multi-purpose-labels.jpg',
                'brochure_url' => '#download-brochure',
                'is_active' => true,
                'sort_order' => 5,
                'applications' => [
                    [
                        'title' => 'Office & Shipping Labels',
                        'description' => 'On-demand laser and inkjet labels for mailings, file organization, and package routing.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Office mailing and shipping labels',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Retail Price & Barcode Tags',
                        'description' => 'Clean peel-and-stick labels for retail store displays, price tagging, and shelf labeling.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Retail price tags and barcode labels',
                        'sort_order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Digital Wide-Format Media',
                'slug' => 'digital-wide-format-media',
                'category' => 'Digital Wide-Format Media',
                'short_description' => 'Versatile Media for Indoor & Semi-Outdoor Graphic Applications',
                'description' => "Digital Wide-Format Print Media comprises solutions developed for wide-format printing applications across retail, display, promotional and photographic environments.\n\nThe portfolio supports applications requiring large-format visual reproduction for indoor and relevant semi-outdoor environments.",
                'banner_image' => 'images/products/banner-digital-wide-format.jpg',
                'brochure_url' => '#download-brochure',
                'is_active' => true,
                'sort_order' => 6,
                'applications' => [
                    [
                        'title' => 'Roll-Up Banners & POP Displays',
                        'description' => 'Stay-flat media for indoor promotional banners, trade show booths, and point-of-purchase signage.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Roll-up banner and retail POS displays',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Backlit Graphics',
                        'description' => 'Vivid light dispersion for illuminated advertising panels and retail lightboxes.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Backlit illuminated graphics',
                        'sort_order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Reprographic Media',
                'slug' => 'reprographic-media',
                'category' => 'Reprographic Media',
                'short_description' => 'Coated Papers and Non-Tear Films for Graphic and Technical Reproduction',
                'description' => "Reprographic Media is designed for reproducing graphic, visual and technical content across a variety of applications.\n\nThe portfolio includes coated papers and non-tear films suitable for applications ranging from posters and album covers to engineering drawings and architectural renderings.",
                'banner_image' => 'images/products/banner-reprographic.jpg',
                'brochure_url' => '#download-brochure',
                'is_active' => true,
                'sort_order' => 7,
                'applications' => [
                    [
                        'title' => 'Architectural & Engineering Blueprints',
                        'description' => 'High dimensional accuracy and line sharpness for CAD drawings, architectural schematics, and GIS maps.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Architectural blueprints and engineering schematics',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Presentation Posters & Renderings',
                        'description' => 'Smooth graphic media for competition presentation boards, 3D renderings, and technical visual displays.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Presentation boards and renderings',
                        'sort_order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Polyester Offset Plates',
                'slug' => 'polyester-offset-plates',
                'category' => 'Polyester Offset Plates',
                'short_description' => 'Stable Polyester Plates for Short- and Long-Run Offset Printing',
                'description' => "Polyester Offset Plates are designed for sheetfed offset printing applications where dimensional stability and consistent plate performance are important.\n\nThe media supports a range of short- and long-run applications across publishing, commercial printing and other offset production requirements.",
                'banner_image' => 'images/products/banner-polyester-offset.jpg',
                'brochure_url' => '#download-brochure',
                'is_active' => true,
                'sort_order' => 8,
                'applications' => [
                    [
                        'title' => 'Commercial Book & Form Printing',
                        'description' => 'Cost-effective, chemistry-free offset printing plates for single-color and spot-color commercial press runs.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Commercial books and business forms offset printing',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Stationery & Educational Materials',
                        'description' => 'Fast turnaround offset plate production for school notebooks, leaflets, and letterheads.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Stationery and educational publishing printing',
                        'sort_order' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Laser and Inkjet Positive Films',
                'slug' => 'laser-and-inkjet-positive-films',
                'category' => 'Laser & Inkjet Positive Films',
                'short_description' => 'Precision Films for Pre-Press Imaging',
                'description' => "Laser and Inkjet Positive Films are designed for producing high-quality positives and negatives for printing and pre-press workflows.\n\nThe films support applications across offset, screen and flexographic printing, making them suitable for publishing, commercial printing, garment and textile production, and packaging-related workflows.",
                'banner_image' => 'images/products/banner-positive-films.jpg',
                'brochure_url' => '#download-brochure',
                'is_active' => true,
                'sort_order' => 9,
                'applications' => [
                    [
                        'title' => 'Screen Printing Positives',
                        'description' => 'High optical density film positives for t-shirt, garment, textile, and ceramic silkscreen stencil exposure.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Silkscreen textile and garment printing positives',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Flexo & Pad Pre-Press',
                        'description' => 'Crisp edge definition and UV-blocking density for pad printing plates and flexographic stamp preparation.',
                        'image' => 'images/products/applications/commercial-prints.jpg',
                        'alt' => 'Flexo and pad prepress exposure film',
                        'sort_order' => 2,
                    ],
                ],
            ],
        ];

        foreach ($products as $item) {
            $applications = $item['applications'] ?? [];
            unset($item['applications']);

            $product = Product::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );

            // Re-sync applications
            $product->applications()->delete();
            foreach ($applications as $appData) {
                $product->applications()->create($appData);
            }
        }
    }
}
