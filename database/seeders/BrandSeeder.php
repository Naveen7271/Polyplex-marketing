<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandsData = [
            'novalife' => [
                'name' => 'NovaLife',
                'slug' => 'novalife',
                'subtitle' => 'Premium Non-tear Media',
                'logo' => 'images/brands/logos/novalife.png',
                'alt' => 'NovaLife - Premium Non-tear Media',
                'url' => '#novalife',
                'banner' => 'images/products/banner-non-tear.jpg',
                'badge_description' => 'Engineered for exceptional tear resistance, durability and pristine print quality for demanding high-handling applications.',
                'paragraphs' => "NovaLife synthetic papers provide unmatched longevity and tactile elegance for photo albums, certificates, cards and menus.\n\nDesigned for flawless compatibility across leading commercial digital presses including HP Indigo and dry toner platforms.",
                'statement' => 'NovaLife synthetic paper blends the high visual reproduction of fine coated papers with the durability and weather resistance of synthetic films.',
                'brochure_url' => '#download-brochure',
                'features' => [
                    [
                        'title' => 'Exceptional Tear Resistance',
                        'description' => 'Engineered with a durable synthetic polyester film core that is virtually impossible to tear by hand, even with repeated handling.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Waterproof & Stain Resistant',
                        'description' => 'Completely impervious to water, grease, oils, and moisture, eliminating the necessity for thermal lamination.',
                        'sort_order' => 2,
                    ],
                    [
                        'title' => 'Rich Photographic Fidelity',
                        'description' => 'Coated surface provides deep black levels, wide color gamuts, and razor-sharp text clarity for premium photobooks and fine art prints.',
                        'sort_order' => 3,
                    ],
                    [
                        'title' => 'Press Certified Compatibility',
                        'description' => 'Optimized for seamless performance on HP Indigo presses, dry toner production engines, and screen printing.',
                        'sort_order' => 4,
                    ],
                    [
                        'title' => 'Static-Controlled Feeding',
                        'description' => 'Advanced antistatic surface formulation ensures smooth single-sheet feeding during high-volume digital printing runs.',
                        'sort_order' => 5,
                    ],
                ],
            ],
            'novajet' => [
                'name' => 'NovaJet',
                'slug' => 'novajet',
                'subtitle' => 'Digital Wide Format Media',
                'logo' => 'images/brands/logos/novajet-wide.png',
                'alt' => 'NovaJet - Digital Wide Format Media',
                'url' => '#novajet',
                'banner' => 'images/products/banner-non-tear.jpg',
                'badge_description' => 'A range of durable non-tear media designed for photo and general commercial applications where resistance to tearing and long-lasting usability are important.',
                'paragraphs' => "Developed for demanding digital printing applications, NovaJet offers media solutions that combine durability with printing versatility, making them suitable for applications requiring reliable and resilient printed materials.\n\nThe range supports multiple digital printing technologies, including HP Indigo, dry toner and inkjet printing with both dye and pigment inks, providing flexibility across different production environments.",
                'statement' => 'NovaJet includes durable film media designed to provide tear resistance and support demanding photographic and general commercial printing applications.',
                'compatibility_headline' => 'NovaJet supports multiple digital printing technologies, providing flexibility across different production environments.',
                'brochure_url' => '#download-brochure',
                'compatibilities' => [
                    [
                        'title' => 'HP Indigo',
                        'description' => 'Compatible with HP Indigo digital printing technology for applications requiring digital production printing.',
                        'image' => 'images/products/technologies/hp-indigo.png',
                        'alt' => 'HP Indigo digital printing technology compatibility',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Dry Toner',
                        'description' => 'Suitable for compatible dry toner printing systems used in digital production environments.',
                        'image' => 'images/products/technologies/dry-toner.png',
                        'alt' => 'Dry toner digital printing technology compatibility',
                        'sort_order' => 2,
                    ],
                    [
                        'title' => 'Inkjet (Dye & Pigment)',
                        'description' => 'Compatible with inkjet printing systems using both dye and pigment inks, supporting different printing requirements.',
                        'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                        'alt' => 'Inkjet dye and pigment ink printing compatibility',
                        'sort_order' => 3,
                    ],
                ],
                'features' => [
                    [
                        'title' => 'Durability and Tear Resistance',
                        'description' => 'Designed to withstand tearing during handling and use, helping printed materials maintain their usability across different applications.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Versatile Application Potential',
                        'description' => 'Suitable for photographic and general commercial applications where durable and reliable printed media is required.',
                        'sort_order' => 2,
                    ],
                    [
                        'title' => 'Digital Production Printing',
                        'description' => 'Developed for digital production printing environments, supporting different printing requirements and production workflows.',
                        'sort_order' => 3,
                    ],
                    [
                        'title' => 'Multiple Printing Technology Support',
                        'description' => 'Compatible with HP Indigo, dry toner and inkjet technologies, offering flexibility across different digital printing systems.',
                        'sort_order' => 4,
                    ],
                    [
                        'title' => 'Dye and Pigment Ink Compatibility',
                        'description' => 'Supports inkjet printing with both dye and pigment inks, accommodating different inkjet printing requirements.',
                        'sort_order' => 5,
                    ],
                ],
            ],
            'saraprint' => [
                'name' => 'Saraprint',
                'slug' => 'saraprint',
                'subtitle' => 'Coloring Digitally with Innovation',
                'logo' => 'images/brands/logos/saraprint.png',
                'alt' => 'Saraprint - Coloring Digitally with Innovation',
                'url' => '#saraprint',
                'banner' => 'images/products/banner-non-tear.jpg',
                'badge_description' => 'Innovative digital printing substrates engineered for vivid colour reproduction and versatile operational performance.',
                'paragraphs' => "Saraprint delivers brilliant color vibrancy and consistent surface finish across diverse digital production workflows.\n\nEngineered to meet the stringent quality demands of modern high-speed printing technologies.",
                'statement' => 'Saraprint substrates empower commercial print houses to achieve consistent color fidelity and smooth handling across production runs.',
                'brochure_url' => '#download-brochure',
                'features' => [
                    [
                        'title' => 'Vivid Colour Reproduction',
                        'description' => 'Optimised micro-coating yields striking color saturation, deep contrast, and natural skin tone reproduction.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'High-Speed Operational Stability',
                        'description' => 'Manufactured with high dimensional stability that resists curling or warping under high printer temperatures.',
                        'sort_order' => 2,
                    ],
                ],
            ],
            'novastick' => [
                'name' => 'NovaStick',
                'slug' => 'novastick',
                'subtitle' => 'Self-Adhesive Labels',
                'logo' => 'images/brands/logos/novastick.png',
                'alt' => 'NovaStick - Self-Adhesive Labels',
                'url' => '#novastick',
                'banner' => 'images/products/banner-digital-labels.jpg',
                'badge_description' => 'High-performance self-adhesive film label media for packaging, logistics, and retail labeling.',
                'paragraphs' => "NovaStick label solutions provide strong permanent adhesion across plastics, metals, glass, and cartons.\n\nOptimised for commercial digital label presses and roll-to-roll conversion workflows.",
                'statement' => 'NovaStick offers versatile label stock that combines exceptional print definition with durable adhesive tack.',
                'brochure_url' => '#download-brochure',
                'features' => [
                    [
                        'title' => 'Permanent Adhesive Performance',
                        'description' => 'High-tack adhesive bonds securely to curved containers, corrugated boxes, and low-surface-energy substrates.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Clean Die-Cutting & Stripping',
                        'description' => 'Consistent backing liner and facestock allows precise high-speed kiss-cutting and matrix stripping.',
                        'sort_order' => 2,
                    ],
                ],
            ],
            'novasign' => [
                'name' => 'NovaSign',
                'slug' => 'novasign',
                'subtitle' => 'Digital Wide Format Media',
                'logo' => 'images/brands/logos/novasign.png',
                'alt' => 'NovaSign - Digital Wide Format Media',
                'url' => '#novasign',
                'banner' => 'images/products/banner-digital-wide-format.jpg',
                'badge_description' => 'Wide format graphic substrates crafted for eye-catching indoor and semi-outdoor signage, displays, and banners.',
                'paragraphs' => "NovaSign media gives graphic producers stay-flat dependability and vibrant ink adhesion on eco-solvent, UV, and latex printers.\n\nIdeal for roll-up banners, lightbox graphics, and retail exhibition displays.",
                'statement' => 'NovaSign transforms promotional graphics with vibrant colors, tear resistance, and dimensional stability.',
                'brochure_url' => '#download-brochure',
                'features' => [
                    [
                        'title' => 'Anti-Curl Film Construction',
                        'description' => 'Engineered with multilayer balance that stays flat in banner stands without edge-curling over time.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Universal Ink Compatibility',
                        'description' => 'Works flawlessly with aqueous, eco-solvent, UV-curable, and latex printing platforms.',
                        'sort_order' => 2,
                    ],
                ],
            ],
            'novacad' => [
                'name' => 'NovaCad',
                'slug' => 'novacad',
                'subtitle' => 'Reprographic Media',
                'logo' => 'images/brands/logos/novacad.png',
                'alt' => 'NovaCad - Reprographic Media',
                'url' => '#novacad',
                'banner' => 'images/products/banner-reprographic.jpg',
                'badge_description' => 'A specialised range of films and papers developed for CAD, GIS, proofing, screen printing and technical imaging application where precision, clarity and consistent print reproduction are important.',
                'paragraphs' => "The range is designed to support technical and graphic workflows that require accurate image reproduction, fine details and reliable media performance. Its specialised film and paper options cater to different production requirements, from engineering drawings and geographical information systems to proofing and screen printing applications.\n\nNovaCad provides media solutions for professional printing environments, supporting diverse technical imaging and graphic reproduction requirements.",
                'statement' => 'NovaCad supports diverse technical imaging, architectural, and graphic reproduction requirements.',
                'compatibility_headline' => 'NovaCAD is developed for specialised printing and imaging workflows across different technical applications.',
                'brochure_url' => '#download-brochure',
                'compatibilities' => [
                    [
                        'title' => 'CAD Printing',
                        'description' => 'Suitable for computer-aided design printing workflows involving technical drawings, engineering plans and architectural layouts.',
                        'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                        'alt' => 'CAD printing workflows involving technical drawings, engineering plans and architectural layouts',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'GIS Printing',
                        'description' => 'Designed for printing geographical information, maps and spatial representations.',
                        'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                        'alt' => 'GIS printing for geographical information, maps and spatial representations',
                        'sort_order' => 2,
                    ],
                    [
                        'title' => 'Proofing',
                        'description' => 'Suitable for proofing workflows requiring accurate visual reproduction and output evaluation.',
                        'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                        'alt' => 'Proofing workflows requiring accurate visual reproduction and output evaluation',
                        'sort_order' => 3,
                    ],
                    [
                        'title' => 'Screen Printing',
                        'description' => 'Suitable for selected screen printing positive and stencil creation processes.',
                        'image' => 'images/products/technologies/Screen.png',
                        'alt' => 'Screen printing positive and stencil creation processes',
                        'sort_order' => 4,
                    ],
                ],
                'features' => [
                    [
                        'title' => 'Precision for Technical Imaging',
                        'description' => 'Designed for technical applications requiring accurate reproduction of lines, fine details and graphical elements.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Specialised Film and Paper Options',
                        'description' => 'Offers film and paper-based media solutions to accommodate different technical imaging, proofing and printing requirements.',
                        'sort_order' => 2,
                    ],
                    [
                        'title' => 'CAD and Engineering Applications',
                        'description' => 'Suitable for computer-aided design workflows involving engineering drawings, architectural plans and technical documentation.',
                        'sort_order' => 3,
                    ],
                    [
                        'title' => 'GIS and Mapping Applications',
                        'description' => 'Designed to support geographical information system applications where clear representation of maps, layouts and spatial information is important.',
                        'sort_order' => 4,
                    ],
                ],
            ],
            'novadom' => [
                'name' => 'NovaDom',
                'slug' => 'novadom',
                'subtitle' => 'Desktop Offset Plate',
                'logo' => 'images/brands/logos/novadom.png',
                'alt' => 'NovaDom - Desktop Offset Plate',
                'url' => '#novadom',
                'banner' => 'images/products/banner-polyester-offset.jpg',
                'badge_description' => 'A range of laser and inkjet imageable plate solutions developed for selected offset-printing applications where imaging precision, print consistency and production efficiency are important.',
                'paragraphs' => "Designed to support different imaging requirements, NovaDom offers plate solutions that can be imaged using laser and inkjet technologies, providing flexibility across selected offset-printing workflows.\n\nThe range caters to specialised printing requirements where reliable plate imaging and consistent reproduction are essential to the overall print production process.",
                'statement' => 'NovaDom offers imageable plate solutions designed for selected offset-printing applications, supporting laser- and inkjet-based imaging workflows.',
                'compatibility_headline' => 'NovaDom supports different imaging technologies for selected offset-printing applications.',
                'brochure_url' => '#download-brochure',
                'compatibilities' => [
                    [
                        'title' => 'Laser Imaging',
                        'description' => 'Suitable for compatible laser-based imaging systems used in offset plate preparation.',
                        'image' => 'images/products/technologies/dry-toner.png',
                        'alt' => 'Laser-based imaging systems used in offset plate preparation',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Inkjet Imaging',
                        'description' => 'Designed for compatible inkjet-based imaging workflows for selected offset-printing applications.',
                        'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                        'alt' => 'Inkjet-based imaging workflows for selected offset-printing applications',
                        'sort_order' => 2,
                    ],
                    [
                        'title' => 'Offset Printing',
                        'description' => 'Developed for use in selected offset-printing processes requiring compatible imageable plate solutions.',
                        'image' => 'images/products/technologies/Offset.png',
                        'alt' => 'Selected offset-printing processes requiring compatible imageable plate solutions',
                        'sort_order' => 3,
                    ],
                ],
                'features' => [
                    [
                        'title' => 'Laser-Imageable Plate Solutions',
                        'description' => 'Designed to support laser-based imaging workflows for selected offset-printing applications.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Inkjet-Imageable Technology',
                        'description' => 'Supports inkjet-based imaging, offering an alternative approach for selected plate preparation requirements.',
                        'sort_order' => 2,
                    ],
                    [
                        'title' => 'Designed for Offset Printing',
                        'description' => 'Developed for use in selected offset-printing applications, supporting specialised print production workflows.',
                        'sort_order' => 3,
                    ],
                    [
                        'title' => 'Imaging Flexibility',
                        'description' => 'Offers both laser and inkjet imageable plate solutions, providing flexibility across different imaging requirements.',
                        'sort_order' => 4,
                    ],
                    [
                        'title' => 'Precision in Plate Imaging',
                        'description' => 'Designed for imaging applications where accurate reproduction of text, graphics and other visual elements is important.',
                        'sort_order' => 5,
                    ],
                ],
            ],
            'novasharp' => [
                'name' => 'NovaSharp',
                'slug' => 'novasharp',
                'subtitle' => 'Laser Printable Film',
                'logo' => 'images/brands/logos/novasharp.png',
                'alt' => 'NovaSharp - Laser Printable Film',
                'url' => '#novasharp',
                'banner' => 'images/products/banner-positive-films.jpg',
                'badge_description' => 'Dimensional laser positive films for screen printing, flexo, and offset plate exposing.',
                'paragraphs' => "NovaSharp laser film offers high UV opacity and heat stability to create sharp screen printing stencils and print masters on desktop laser printers.\n\nEliminates the cost and chemistry of traditional silver film imagesetters.",
                'statement' => 'NovaSharp makes desktop plate and stencil prepress chemical-free, fast, and accessible.',
                'brochure_url' => '#download-brochure',
                'features' => [
                    [
                        'title' => 'Chemical-Free Prepress Imaging',
                        'description' => 'Direct laser imaging removes darkroom chemical processors and silver-halide films completely.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'High Heat Stability',
                        'description' => 'Specially heat-stabilized polyester film avoids shrinkage or dimensional distortion inside laser printer fusers.',
                        'sort_order' => 2,
                    ],
                ],
            ],
            'polijet' => [
                'name' => 'PoliJet',
                'slug' => 'polijet',
                'subtitle' => 'Desktop Offset Plate',
                'logo' => 'images/brands/logos/polijet.png',
                'alt' => 'PoliJet - Desktop Offset Plate',
                'url' => '#polijet',
                'banner' => 'images/products/banner-polyester-offset.jpg',
                'badge_description' => 'Inkjet printable polyester offset plate solution offering quick turnaround and high run lengths.',
                'paragraphs' => "PoliJet enables commercial print shops to output offset plates directly on standard inkjet printers with outstanding ink reception.\n\nCombines fast job preparation with sharp dot reproduction on press.",
                'statement' => 'PoliJet turns standard desktop inkjet printers into productive offset plate setters.',
                'brochure_url' => '#download-brochure',
                'features' => [
                    [
                        'title' => 'Direct Inkjet Plate Output',
                        'description' => 'Image plates directly using standard aqueous inkjet printers without requiring expensive platesetters.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Press Run Durability',
                        'description' => 'High dimensional polyester base delivers consistent ink-water balance for up to 20,000 press impressions.',
                        'sort_order' => 2,
                    ],
                ],
            ],
            'posijet' => [
                'name' => 'PosiJet',
                'slug' => 'posijet',
                'subtitle' => 'Inkjet Positive Film',
                'logo' => 'images/brands/logos/posijet.png',
                'alt' => 'PosiJet - Inkjet Positive Film',
                'url' => '#posijet',
                'banner' => 'images/products/banner-positive-films.jpg',
                'badge_description' => 'Specialty microporous inkjet film for producing high-density screen printing positives and film masters.',
                'paragraphs' => "PosiJet delivers maximum UV density (Dmax > 4.0) with rapid drying ink reception for screen printers and PCB mask fabricators.\n\nEnsures crisp line work, smooth halftones, and minimal dot gain.",
                'statement' => 'PosiJet provides screen printers with ultra-black film positives directly from everyday inkjet printers.',
                'brochure_url' => '#download-brochure',
                'features' => [
                    [
                        'title' => 'Ultra-High Optical Density',
                        'description' => 'Reaches Dmax > 4.0 with standard pigment inks, ensuring 100% UV blockout during stencil exposure.',
                        'sort_order' => 1,
                    ],
                    [
                        'title' => 'Instant-Dry Microporous Coating',
                        'description' => 'Absorbs heavy ink loads without bleeding or smudging, ready for exposure immediately after printing.',
                        'sort_order' => 2,
                    ],
                ],
            ],
            'novatrace' => [
                'name' => 'NovaTrace',
                'slug' => 'novatrace',
                'subtitle' => 'Tracing Paper',
                'logo' => 'images/brands/logos/novatrace.png',
                'alt' => 'NovaTrace - Tracing Paper',
                'url' => '#novatrace',
                'banner' => 'images/products/banner-polyester-offset.jpg',
                'badge_description' => 'High-translucency drafting and tracing paper for CAD plotting, manual design, and reproduction.',
                'paragraphs' => "NovaTrace offers uniform transparency, smooth pen drag, and superior erasability for engineers, architects, and artists.\n\nEngineered to withstand aging without yellowing or becoming brittle.",
                'statement' => 'NovaTrace provides archival clarity and high transparency for technical drafting and overlays.',
                'brochure_url' => '#download-brochure',
                'features' => [
                    [
                        'title' => 'Uniform Translucency & High Contrast',
                        'description' => 'Even fiber distribution delivers clean transparency for technical tracing, Diazo copying, and overlays.',
                        'sort_order' => 1,
                    ],
                ],
            ],
        ];

        $brands = [];
        foreach ($brandsData as $key => $data) {
            $features = $data['features'] ?? [];
            unset($data['features']);

            $compatibilities = $data['compatibilities'] ?? [];
            unset($data['compatibilities']);

            $brand = Brand::updateOrCreate(['slug' => $data['slug']], $data);
            $brands[$key] = $brand;

            // Re-seed features
            $brand->features()->delete();
            foreach ($features as $f) {
                $brand->features()->create($f);
            }

            // Re-seed compatibilities
            $brand->compatibilities()->delete();
            foreach ($compatibilities as $c) {
                $brand->compatibilities()->create($c);
            }
        }

        $productBrandsMap = [
            'non-tear-media' => ['novalife', 'novajet', 'saraprint'],
            'gloss-art-paper-media' => ['novalife'],
            'inkjet-photo-media' => ['novajet'],
            'digital-labels' => ['novastick'],
            'multi-purpose-labels' => ['novajet'],
            'digital-wide-format-media' => ['novajet', 'novasign'],
            'reprographic-media' => ['novacad', 'novajet', 'saraprint'],
            'polyester-offset-plates' => ['novadom', 'saraprint', 'polijet'],
            'laser-and-inkjet-positive-films' => ['posijet', 'novasharp'],
        ];

        foreach ($productBrandsMap as $productSlug => $brandKeys) {
            $product = Product::where('slug', $productSlug)->first();
            if (! $product) {
                continue;
            }

            $syncData = [];
            foreach ($brandKeys as $order => $brandKey) {
                if (isset($brands[$brandKey])) {
                    $syncData[$brands[$brandKey]->id] = ['sort_order' => $order + 1];
                }
            }

            $product->brands()->sync($syncData);
        }
    }
}
