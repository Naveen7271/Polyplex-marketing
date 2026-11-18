@php
    $brandsData = [
        'novajet' => [
            'id' => 'novajet',
            'title' => 'NovaJet',
            'banner' => 'images/products/banner-non-tear.jpg',
            'bannerAlt' => 'NovaJet Print Media Substrates',
            'badgeLogo' => 'images/brands/logos/novajet-wide.png',
            'badgeLogoAlt' => 'NovaJet - Digital Wide Format Media',
            'badgeSubtitle' => 'Digital Wide Format Media',
            'badgeDescription' => 'A range of durable non-tear media designed for photo and general commercial applications where resistance to tearing and long-lasting usability are important.',
            'paragraphs' => [
                'Developed for demanding digital printing applications, NovaJet offers media solutions that combine durability with printing versatility, making them suitable for applications requiring reliable and resilient printed materials.',
                'The range supports multiple digital printing technologies, including HP Indigo, dry toner and inkjet printing with both dye and pigment inks, providing flexibility across different production environments.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [
                [
                    'id' => 'durability-tear-resistance',
                    'title' => 'Durability and Tear Resistance',
                    'description' => 'Designed to withstand tearing during handling and use, helping printed materials maintain their usability across different applications.',
                ],
                [
                    'id' => 'versatile-application-potential',
                    'title' => 'Versatile Application Potential',
                    'description' => 'Suitable for photographic and general commercial applications where durable and reliable printed media is required.',
                ],
                [
                    'id' => 'digital-production-printing',
                    'title' => 'Digital Production Printing',
                    'description' => 'Developed for digital production printing environments, supporting different printing requirements and production workflows.',
                ],
                [
                    'id' => 'multiple-printing-technology-support',
                    'title' => 'Multiple Printing Technology Support',
                    'description' => 'Compatible with HP Indigo, dry toner and inkjet technologies, offering flexibility across different digital printing systems.',
                ],
                [
                    'id' => 'dye-pigment-ink-compatibility',
                    'title' => 'Dye and Pigment Ink Compatibility',
                    'description' => 'Supports inkjet printing with both dye and pigment inks, accommodating different inkjet printing requirements.',
                ],
            ],
            'statement' => 'NovaJet includes durable film media designed to provide tear resistance and support demanding photographic and general commercial printing applications.',
            'compatibilityOverline' => 'COMPATIBILITY',
            'compatibilityHeadline' => 'NovaJet supports multiple digital printing technologies, providing flexibility across different production environments.',
            'compatibility' => [
                [
                    'id' => 'hp-indigo',
                    'title' => 'HP Indigo',
                    'description' => 'Compatible with HP Indigo digital printing technology for applications requiring digital production printing.',
                    'image' => 'images/products/compatibility/hp-indigo.jpg',
                    'fallbackImage' => 'images/products/applications/commercial-prints.jpg',
                    'alt' => 'HP Indigo digital printing technology compatibility',
                ],
                [
                    'id' => 'dry-toner',
                    'title' => 'Dry Toner',
                    'description' => 'Suitable for compatible dry toner printing systems used in digital production environments.',
                    'image' => 'images/products/compatibility/dry-toner.jpg',
                    'fallbackImage' => 'images/products/applications/travel-albums.jpg',
                    'alt' => 'Dry toner digital printing technology compatibility',
                ],
                [
                    'id' => 'inkjet-dye-pigment',
                    'title' => 'Inkjet (Dye & Pigment)',
                    'description' => 'Compatible with inkjet printing systems using both dye and pigment inks, supporting different printing requirements.',
                    'image' => 'images/products/compatibility/inkjet.jpg',
                    'fallbackImage' => 'images/products/applications/family-portraits.jpg',
                    'alt' => 'Inkjet dye and pigment ink printing compatibility',
                ],
            ],
            'recommendationsTitle' => 'You Might Also Like',
            'recommendedBrands' => [
                [
                    'id' => 'novacad',
                    'name' => 'NovaCad',
                    'subtitle' => 'Reprographic Media',
                    'logo' => 'images/brands/logos/novacad.png',
                    'alt' => 'NovaCad - Reprographic Media',
                    'url' => route('products.show', 'novacad'),
                ],
                [
                    'id' => 'novadom',
                    'name' => 'NovaDom',
                    'subtitle' => 'Desktop Offset Plate',
                    'logo' => 'images/brands/logos/novadom.png',
                    'alt' => 'NovaDom - Desktop Offset Plate',
                    'url' => route('products.show', 'novadom'),
                ],
                [
                    'id' => 'novajet',
                    'name' => 'NovaJet',
                    'subtitle' => 'Digital Wide Format Media',
                    'logo' => 'images/brands/logos/novajet-wide.png',
                    'alt' => 'NovaJet - Digital Wide Format Media',
                    'url' => route('products.show', 'novajet'),
                ],
            ],
            'exploreBrandsUrl' => route('products'),
            'exploreBrandsText' => 'Explore all brands',
        ],

        'novadom' => [
            'id' => 'novadom',
            'title' => 'NovaDom',
            'banner' => 'images/products/banner-polyester-offset.jpg',
            'bannerAlt' => 'NovaDom Desktop Offset Plate Solutions',
            'badgeLogo' => 'images/brands/logos/novadom.png',
            'badgeLogoAlt' => 'NovaDom - Desktop Offset Plate',
            'badgeSubtitle' => 'Desktop Offset Plate',
            'badgeDescription' => 'A range of laser and inkjet imageable plate solutions developed for selected offset - printing applications where imaging precision, print consistency and production effeciency are important.',
            'paragraphs' => [
                'Designed to support different imaging requirements, NovaDom offers plate solutions that can be imaged using laser and inkjet technologies, providing flexibility across selected offset-printing workflows.',
                'The range caters to specialised printing requirements where reliable plate imaging and consistent reproduction are essential to the overall print production process.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [
                [
                    'id' => 'laser-imageable-plate-solutions',
                    'title' => 'Laser-Imageable Plate Solutions',
                    'description' => 'Designed to support laser-based imaging workflows for selected offset-printing applications.',
                ],
                [
                    'id' => 'inkjet-imageable-technology',
                    'title' => 'Inkjet-Imageable Technology',
                    'description' => 'Supports inkjet-based imaging, offering an alternative approach for selected plate preparation requirements.',
                ],
                [
                    'id' => 'designed-for-offset-printing',
                    'title' => 'Designed for Offset Printing',
                    'description' => 'Developed for use in selected offset-printing applications, supporting specialised print production workflows.',
                ],
                [
                    'id' => 'imaging-flexibility',
                    'title' => 'Imaging Flexibility',
                    'description' => 'Offers both laser and inkjet imageable plate solutions, providing flexibility across different imaging requirements.',
                ],
                [
                    'id' => 'precision-in-plate-imaging',
                    'title' => 'Precision in Plate Imaging',
                    'description' => 'Designed for imaging applications where accurate reproduction of text, graphics and other visual elements is important.',
                ],
                [
                    'id' => 'specialised-printing-applications',
                    'title' => 'Specialised Printing Applications',
                    'description' => 'Suitable for selected offset-printing requirements where compatible imageable plate solutions are needed.',
                ],
            ],
            'statement' => 'NovaDom offers imageable plate solutions designed for selected offset-printing applications, supporting laser- and inkjet-based imaging workflows.',
            'compatibilityOverline' => 'COMPATIBILITY',
            'compatibilityHeadline' => 'NovaDom supports different imaging technologies for selected offset-printing applications.',
            'compatibility' => [
                [
                    'id' => 'laser-imaging',
                    'title' => 'Laser Imaging',
                    'description' => 'Suitable for compatible laser-based imaging systems used in offset plate preparation.',
                    'image' => 'images/products/compatibility/novadom-laser-imaging.jpg',
                    'fallbackImage' => 'images/products/technologies/dry-toner.png',
                    'alt' => 'Laser-based imaging systems used in offset plate preparation',
                ],
                [
                    'id' => 'inkjet-imaging',
                    'title' => 'Inkjet Imaging',
                    'description' => 'Designed for compatible inkjet-based imaging workflows for selected offset-printing applications.',
                    'image' => 'images/products/compatibility/novadom-inkjet-imaging.jpg',
                    'fallbackImage' => 'images/products/technologies/hp-indigo.png',
                    'alt' => 'Inkjet-based imaging workflows for selected offset-printing applications',
                ],
                [
                    'id' => 'offset-printing',
                    'title' => 'Offset Printing',
                    'description' => 'Developed for use in selected offset-printing processes requiring compatible imageable plate solutions.',
                    'image' => 'images/products/compatibility/novadom-offset-printing.jpg',
                    'fallbackImage' => 'images/products/technologies/Offset.png',
                    'alt' => 'Selected offset-printing processes requiring compatible imageable plate solutions',
                ],
            ],
            'recommendationsTitle' => 'You Might Also Like',
            'recommendedBrands' => [
                [
                    'id' => 'novacad',
                    'name' => 'NovaCad',
                    'subtitle' => 'Reprographic Media',
                    'logo' => 'images/brands/logos/novacad.png',
                    'alt' => 'NovaCad - Reprographic Media',
                    'url' => route('products.show', 'novacad'),
                ],
                [
                    'id' => 'novadom',
                    'name' => 'NovaDom',
                    'subtitle' => 'Desktop Offset Plate',
                    'logo' => 'images/brands/logos/novadom.png',
                    'alt' => 'NovaDom - Desktop Offset Plate',
                    'url' => route('products.show', 'novadom'),
                ],
                [
                    'id' => 'novajet',
                    'name' => 'NovaJet',
                    'subtitle' => 'Digital Wide Format Media',
                    'logo' => 'images/brands/logos/novajet-wide.png',
                    'alt' => 'NovaJet - Digital Wide Format Media',
                    'url' => route('products.show', 'novajet'),
                ],
            ],
            'exploreBrandsUrl' => route('products'),
            'exploreBrandsText' => 'Explore all brands',
        ],

        'novacad' => [
            'id' => 'novacad',
            'title' => 'NovaCad',
            'banner' => 'images/products/banner-reprographic.jpg',
            'bannerAlt' => 'NovaCad Reprographic Media',
            'badgeLogo' => 'images/brands/logos/novacad.png',
            'badgeLogoAlt' => 'NovaCad - Reprographic Media',
            'badgeSubtitle' => 'Reprographic Media',
            'badgeDescription' => 'A specialised range of films and papers developed for CAD, GIS, proofing, screen printing and technical imaging application where precision, clarity and consistent print reproduction are important.',
            'paragraphs' => [
                'The range is designed to support technical and graphic workflows that require accurate image reproduction, fine details and reliable media performance. Its specialised film and paper options cater to different production requirements, from engineering drawings and geographical information systems to proofing and screen printing applications.',
                'NovaCad provides media solutions for professional printing environments, supporting diverse technical imaging and graphic reproduction requirements.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [
                [
                    'id' => 'precision-for-technical-imaging',
                    'title' => 'Precision for Technical Imaging',
                    'description' => 'Designed for technical applications requiring accurate reproduction of lines, fine details and graphical elements.',
                ],
                [
                    'id' => 'specialised-film-paper-options',
                    'title' => 'Specialised Film and Paper Options',
                    'description' => 'Offers film and paper-based media solutions to accommodate different technical imaging, proofing and printing requirements.',
                ],
                [
                    'id' => 'cad-engineering-applications',
                    'title' => 'CAD and Engineering Applications',
                    'description' => 'Suitable for computer-aided design workflows involving engineering drawings, architectural plans and technical documentation.',
                ],
                [
                    'id' => 'gis-mapping-applications',
                    'title' => 'GIS and Mapping Applications',
                    'description' => 'Designed to support geographical information system applications where clear representation of maps, layouts and spatial information is important.',
                ],
                [
                    'id' => 'proofing-applications',
                    'title' => 'Proofing Applications',
                    'description' => 'Suitable for proofing workflows requiring clear image reproduction and consistent output for evaluation and review.',
                ],
                [
                    'id' => 'screen-printing-applications',
                    'title' => 'Screen Printing Applications',
                    'description' => 'Offers specialised media options for screen printing workflows and related graphic reproduction requirements.',
                ],
            ],
            'statement' => 'Film and paper media designed for precise image reproduction across technical imaging, CAD, GIS, proofing and screen printing applications.',
            'compatibilityOverline' => 'COMPATIBILITY',
            'compatibilityHeadline' => 'NovaCAD is developed for specialised printing and imaging workflows across different technical applications.',
            'compatibility' => [
                [
                    'id' => 'cad-printing',
                    'title' => 'CAD Printing',
                    'description' => 'Suitable for computer-aided design printing workflows involving technical drawings, engineering plans and architectural layouts.',
                    'image' => 'images/products/compatibility/novacad-cad-printing.jpg',
                    'fallbackImage' => 'images/products/banner-reprographic.jpg',
                    'alt' => 'CAD printing workflows involving technical drawings, engineering plans and architectural layouts',
                ],
                [
                    'id' => 'gis-printing',
                    'title' => 'GIS Printing',
                    'description' => 'Designed for printing geographical information, maps and spatial representations.',
                    'image' => 'images/products/compatibility/novacad-gis-printing.jpg',
                    'fallbackImage' => 'images/products/reprographic-media.jpg',
                    'alt' => 'GIS printing for geographical information, maps and spatial representations',
                ],
                [
                    'id' => 'proofing',
                    'title' => 'Proofing',
                    'description' => 'Suitable for proofing workflows requiring accurate visual reproduction and output evaluation.',
                    'image' => 'images/products/compatibility/novacad-proofing.jpg',
                    'fallbackImage' => 'images/products/gallery/carousel-2.jpg',
                    'alt' => 'Proofing workflows requiring accurate visual reproduction and output evaluation',
                ],
                [
                    'id' => 'screen-printing',
                    'title' => 'Screen Printing',
                    'description' => 'Designed for compatible screen printing applications requiring specialised film and paper media.',
                    'image' => 'images/products/compatibility/novacad-screen-printing.jpg',
                    'fallbackImage' => 'images/products/technologies/screen.png',
                    'alt' => 'Compatible screen printing applications requiring specialised film and paper media',
                ],
            ],
            'recommendationsTitle' => 'You Might Also Like',
            'recommendedBrands' => [
                [
                    'id' => 'novacad',
                    'name' => 'NovaCad',
                    'subtitle' => 'Reprographic Media',
                    'logo' => 'images/brands/logos/novacad.png',
                    'alt' => 'NovaCad - Reprographic Media',
                    'url' => route('products.show', 'novacad'),
                ],
                [
                    'id' => 'novadom',
                    'name' => 'NovaDom',
                    'subtitle' => 'Desktop Offset Plate',
                    'logo' => 'images/brands/logos/novadom.png',
                    'alt' => 'NovaDom - Desktop Offset Plate',
                    'url' => route('products.show', 'novadom'),
                ],
                [
                    'id' => 'novajet',
                    'name' => 'NovaJet',
                    'subtitle' => 'Digital Wide Format Media',
                    'logo' => 'images/brands/logos/novajet-wide.png',
                    'alt' => 'NovaJet - Digital Wide Format Media',
                    'url' => route('products.show', 'novajet'),
                ],
            ],
            'exploreBrandsUrl' => route('products'),
            'exploreBrandsText' => 'Explore all brands',
            'statement' => 'Film and paper media designed for precise image reproduction across technical imaging, CAD, GIS, proofing and screen printing applications.',
            'compatibilityOverline' => 'COMPATIBILITY',
            'compatibilityHeadline' => 'NovaCAD is developed for specialised printing and imaging workflows across different technical applications.',
            'compatibility' => [
                [
                    'id' => 'cad-printing',
                    'title' => 'CAD Printing',
                    'description' => 'Suitable for computer-aided design printing workflows involving technical drawings, engineering plans and architectural layouts.',
                    'image' => 'images/products/compatibility/novacad-cad-printing.jpg',
                    'fallbackImage' => 'images/products/banner-reprographic.jpg',
                    'alt' => 'CAD printing workflows involving technical drawings, engineering plans and architectural layouts',
                ],
                [
                    'id' => 'gis-printing',
                    'title' => 'GIS Printing',
                    'description' => 'Designed for printing geographical information, maps and spatial representations.',
                    'image' => 'images/products/compatibility/novacad-gis-printing.jpg',
                    'fallbackImage' => 'images/products/reprographic-media.jpg',
                    'alt' => 'GIS printing for geographical information, maps and spatial representations',
                ],
                [
                    'id' => 'proofing',
                    'title' => 'Proofing',
                    'description' => 'Suitable for proofing workflows requiring accurate visual reproduction and output evaluation.',
                    'image' => 'images/products/compatibility/novacad-proofing.jpg',
                    'fallbackImage' => 'images/products/gallery/carousel-2.jpg',
                    'alt' => 'Proofing workflows requiring accurate visual reproduction and output evaluation',
                ],
                [
                    'id' => 'screen-printing',
                    'title' => 'Screen Printing',
                    'description' => 'Designed for compatible screen printing applications requiring specialised film and paper media.',
                    'image' => 'images/products/compatibility/novacad-screen-printing.jpg',
                    'fallbackImage' => 'images/products/technologies/screen.png',
                    'alt' => 'Compatible screen printing applications requiring specialised film and paper media',
                ],
            ],
            'recommendationsTitle' => 'You Might Also Like',
            'recommendedBrands' => [
                [
                    'id' => 'novacad',
                    'name' => 'NovaCad',
                    'subtitle' => 'Reprographic Media',
                    'logo' => 'images/brands/logos/novacad.png',
                    'alt' => 'NovaCad - Reprographic Media',
                    'url' => route('products.show', 'novacad'),
                ],
                [
                    'id' => 'novadom',
                    'name' => 'NovaDom',
                    'subtitle' => 'Desktop Offset Plate',
                    'logo' => 'images/brands/logos/novadom.png',
                    'alt' => 'NovaDom - Desktop Offset Plate',
                    'url' => route('products.show', 'novadom'),
                ],
                [
                    'id' => 'novajet',
                    'name' => 'NovaJet',
                    'subtitle' => 'Digital Wide Format Media',
                    'logo' => 'images/brands/logos/novajet-wide.png',
                    'alt' => 'NovaJet - Digital Wide Format Media',
                    'url' => route('products.show', 'novajet'),
                ],
            ],
            'exploreBrandsUrl' => route('products'),
            'exploreBrandsText' => 'Explore all brands',
        ],

        'novalife' => [
            'id' => 'novalife',
            'title' => 'NovaLife',
            'banner' => 'images/products/banner-non-tear.jpg',
            'bannerAlt' => 'NovaLife Premium Non-tear Media',
            'badgeLogo' => 'images/brands/logos/novalife.png',
            'badgeLogoAlt' => 'NovaLife - Premium Non-tear Media',
            'badgeSubtitle' => 'Premium Non-tear Media',
            'badgeDescription' => 'Engineered for exceptional tear resistance, durability and pristine print quality for demanding high-handling applications.',
            'paragraphs' => [
                'NovaLife synthetic papers provide unmatched longevity and tactile elegance for photo albums, certificates, cards and menus.',
                'Designed for flawless compatibility across leading commercial digital presses including HP Indigo and dry toner platforms.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [],
        ],

        'saraprint' => [
            'id' => 'saraprint',
            'title' => 'Saraprint',
            'banner' => 'images/products/banner-non-tear.jpg',
            'bannerAlt' => 'Saraprint Coloring Digitally with Innovation',
            'badgeLogo' => 'images/brands/logos/saraprint.png',
            'badgeLogoAlt' => 'Saraprint - Coloring Digitally with Innovation',
            'badgeSubtitle' => 'Coloring Digitally with Innovation',
            'badgeDescription' => 'Innovative digital printing substrates engineered for vivid colour reproduction and versatile operational performance.',
            'paragraphs' => [
                'Saraprint delivers brilliant color vibrancy and consistent surface finish across diverse digital production workflows.',
                'Engineered to meet the stringent quality demands of modern high-speed printing technologies.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [],
        ],

        'novasharp' => [
            'id' => 'novasharp',
            'title' => 'NovaSharp',
            'banner' => 'images/products/banner-positive-films.jpg',
            'bannerAlt' => 'NovaSharp Laser Printable Film',
            'badgeLogo' => 'images/brands/logos/novasharp.png',
            'badgeLogoAlt' => 'NovaSharp - Laser Printable Film',
            'badgeSubtitle' => 'Laser Printable Film',
            'badgeDescription' => 'Dimensional laser positive films for screen printing, flexo, and offset plate exposing.',
            'paragraphs' => [
                'NovaSharp laser film offers high UV opacity and heat stability to create sharp screen printing stencils and print masters on desktop laser printers.',
                'Eliminates the cost and chemistry of traditional silver film imagesetters.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [],
        ],

        'novasign' => [
            'id' => 'novasign',
            'title' => 'NovaSign',
            'banner' => 'images/products/banner-digital-wide-format.jpg',
            'badgeLogo' => 'images/brands/logos/novasign.png',
            'badgeLogoAlt' => 'NovaSign - Digital Wide Format Media',
            'badgeSubtitle' => 'Digital Wide Format Media',
            'badgeDescription' => 'Wide format graphic substrates crafted for eye-catching outdoor signage, vehicle wraps, and banners.',
            'paragraphs' => [
                'NovaSign media delivers exceptional weather resistance and colour brilliance for long-lasting signage.',
                'Engineered for compatibility with eco-solvent, UV-curable, and latex printing systems.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [],
        ],

        'novastick' => [
            'id' => 'novastick',
            'title' => 'NovaStick',
            'banner' => 'images/products/banner-digital-labels.jpg',
            'badgeLogo' => 'images/brands/logos/novastick.png',
            'badgeLogoAlt' => 'NovaStick - Self-Adhesive Labels',
            'badgeSubtitle' => 'Self-Adhesive Labels',
            'badgeDescription' => 'High-performance self-adhesive film label media for packaging, logistics, and retail labeling.',
            'paragraphs' => [
                'NovaStick label solutions provide strong permanent adhesion across plastics, metals, glass, and cartons.',
                'Optimised for commercial digital label presses and roll-to-roll conversion workflows.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [],
        ],

        'polijet' => [
            'id' => 'polijet',
            'title' => 'PoliJet',
            'banner' => 'images/products/banner-polyester-offset.jpg',
            'badgeLogo' => 'images/brands/logos/polijet.png',
            'badgeLogoAlt' => 'PoliJet - Desktop Offset Plate',
            'badgeSubtitle' => 'Desktop Offset Plate',
            'badgeDescription' => 'Inkjet printable polyester offset plate solution offering quick turnaround and high run lengths.',
            'paragraphs' => [
                'PoliJet enables commercial print shops to output offset plates directly on standard inkjet printers with outstanding ink reception.',
                'Combines fast job preparation with sharp dot reproduction on press.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [],
        ],

        'posijet' => [
            'id' => 'posijet',
            'title' => 'PosiJet',
            'banner' => 'images/products/banner-positive-films.jpg',
            'badgeLogo' => 'images/brands/logos/posijet.png',
            'badgeLogoAlt' => 'PosiJet - Inkjet Positive Film',
            'badgeSubtitle' => 'Inkjet Positive Film',
            'badgeDescription' => 'Specialty microporous inkjet film for producing high-density screen printing positives and film masters.',
            'paragraphs' => [
                'PosiJet delivers maximum UV density (Dmax > 4.0) with rapid drying ink reception for screen printers and PCB mask fabricators.',
                'Ensures crisp line work, smooth halftones, and minimal dot gain.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [],
        ],

        'novatrace' => [
            'id' => 'novatrace',
            'title' => 'NovaTrace',
            'banner' => 'images/products/banner-polyester-offset.jpg',
            'badgeLogo' => 'images/brands/logos/novatrace.png',
            'badgeLogoAlt' => 'NovaTrace - Tracing Paper',
            'badgeSubtitle' => 'Tracing Paper',
            'badgeDescription' => 'High-translucency drafting and tracing paper for CAD plotting, manual design, and reproduction.',
            'paragraphs' => [
                'NovaTrace offers uniform transparency, smooth pen drag, and superior erasability for engineers, architects, and artists.',
                'Engineered to withstand aging without yellowing or becoming brittle.',
            ],
            'brochureUrl' => '#download-brochure',
            'brochureText' => 'Download Brochure',
            'featuresOverline' => 'FEATURES',
            'features' => [],
        ],
    ];

    $currentSlug = $slug ?? 'novajet';
    $brand = $brandsData[$currentSlug] ?? $brandsData['novajet'];
@endphp

<x-layouts.app :title="$brand['title'] . ' | Polyplex DigiPrint - Synthetic Paper & Specialty Print Media'">
    {{-- Section 1: Hero with Dark Industrial Banner & Overlapping Circular Badge with Brand Logo --}}
    <x-product-detail-hero-section :product-title="$brand['title']" :banner-image="$brand['banner']"
        :badge-logo="$brand['badgeLogo'] ?? null" :badge-logo-alt="$brand['badgeLogoAlt'] ?? null"
        :badge-subtitle="$brand['badgeSubtitle'] ?? null"
        :badge-description="$brand['badgeDescription'] ?? null"
        :paragraphs="$brand['paragraphs']" :brochure-url="$brand['brochureUrl']"
        :brochure-text="$brand['brochureText'] ?? 'Download Brochure'" />

    {{-- Section 2: Features Section (When configured, as in NovaJet, NovaDom & NovaCad) --}}
    @if (!empty($brand['features']))
        <x-product-features-section :overline="$brand['featuresOverline'] ?? 'FEATURES'"
            :features="$brand['features']" />
    @endif

    {{-- Section 3: Statement / Callout Banner (When configured, as in NovaJet & NovaDom) --}}
    @if (!empty($brand['statement']))
        <x-product-statement-banner :statement="$brand['statement']" />
    @endif

    {{-- Section 4: Compatibility Section (When configured, as in NovaJet & NovaDom) --}}
    @if (!empty($brand['compatibility']))
        <x-product-compatibility-section :overline="$brand['compatibilityOverline'] ?? 'COMPATIBILITY'"
            :headline="$brand['compatibilityHeadline'] ?? null"
            :technologies="$brand['compatibility']" />
    @endif

    {{-- Section 5: Recommendations ("You Might Also Like") --}}
    @if (!empty($brand['recommendedBrands']))
        <x-brand-recommendations-section :title="$brand['recommendationsTitle'] ?? 'You Might Also Like'"
            :brands="$brand['recommendedBrands']"
            :explore-url="$brand['exploreBrandsUrl'] ?? route('products')"
            :explore-text="$brand['exploreBrandsText'] ?? 'Explore all brands'" />
    @endif

    {{-- Call to Action --}}
    <x-cta-section />
</x-layouts.app>
