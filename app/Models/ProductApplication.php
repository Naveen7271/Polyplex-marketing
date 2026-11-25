<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductApplication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_id',
        'title',
        'description',
        'image',
        'alt',
        'sort_order',
    ];

    /**
     * Get the product this application belongs to.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get predefined application presets for easy selection in dropdowns.
     *
     * @return array<string, array<string, string>>
     */
    public static function getPresets(): array
    {
        return [
            'wedding-albums' => [
                'title' => 'Wedding Albums',
                'description' => 'Durable media for preserving wedding photographs and creating premium album pages designed for repeated viewing and handling.',
                'image' => 'images/products/applications/wedding-albums.jpg',
                'alt' => 'Wedding Albums durable synthetic photo album pages',
            ],
            'travel-albums' => [
                'title' => 'Travel Albums',
                'description' => 'Suitable for travel memories and photo albums where pages need greater resistance to everyday handling.',
                'image' => 'images/products/applications/travel-albums.jpg',
                'alt' => 'Travel Albums resistant to frequent handling and flipping',
            ],
            'newborn-photo-albums' => [
                'title' => 'Newborn Photo Albums',
                'description' => 'Designed for premium newborn and baby photography albums where image quality and durability are important.',
                'image' => 'images/products/applications/newborn-photo-albums.jpg',
                'alt' => 'Newborn Photo Albums archival keepsake prints',
            ],
            'family-portraits' => [
                'title' => 'Family Portraits',
                'description' => 'Suitable for preserving family portraits and creating durable printed photo products.',
                'image' => 'images/products/applications/family-portraits.jpg',
                'alt' => 'Family Portraits durable keepsake printing',
            ],
            'commercial-prints' => [
                'title' => 'Commercial Prints',
                'description' => 'Can be used for applications such as bag tags, certificates and playing cards where non-tear performance can add value.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Commercial Prints luggage tags, certificates and playing cards',
            ],
            'lookbooks-catalogues' => [
                'title' => 'Lookbooks & Catalogues',
                'description' => 'High gloss art paper media engineered for vibrant color reproduction in premium retail and fashion catalogues.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Lookbooks and commercial catalogue printing',
            ],
            'art-reproductions' => [
                'title' => 'Art Reproductions',
                'description' => 'Faithful fine art and photography reproductions requiring sharp contrast and deep saturation.',
                'image' => 'images/products/applications/family-portraits.jpg',
                'alt' => 'Art reproductions on gloss paper',
            ],
            'packaging-bottle-labels' => [
                'title' => 'Packaging & Bottle Labels',
                'description' => 'Durable self-adhesive labels for gourmet packaging, cosmetics, beverages, and retail jars.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Product packaging and bottle labels',
            ],
            'industrial-asset-id' => [
                'title' => 'Industrial Asset Identification',
                'description' => 'Robust labeling for machinery, barcode tags, logistics tracking, and asset management.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Industrial asset and inventory tags',
            ],
            'office-shipping-labels' => [
                'title' => 'Office & Shipping Labels',
                'description' => 'On-demand laser and inkjet labels for mailings, file organization, and package routing.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Office mailing and shipping labels',
            ],
            'retail-price-tags' => [
                'title' => 'Retail Price & Barcode Tags',
                'description' => 'Clean peel-and-stick labels for retail store displays, price tagging, and shelf labeling.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Retail price tags and barcode labels',
            ],
            'roll-up-banners' => [
                'title' => 'Roll-Up Banners & POP Displays',
                'description' => 'Stay-flat media for indoor promotional banners, trade show booths, and point-of-purchase signage.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Roll-up banner and retail POS displays',
            ],
            'backlit-graphics' => [
                'title' => 'Backlit Graphics',
                'description' => 'Vivid light dispersion for illuminated advertising panels and retail lightboxes.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Backlit illuminated graphics',
            ],
            'blueprints-renderings' => [
                'title' => 'Architectural & Engineering Blueprints',
                'description' => 'High dimensional accuracy and line sharpness for CAD drawings, architectural schematics, and GIS maps.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Architectural blueprints and engineering schematics',
            ],
            'offset-plates-publishing' => [
                'title' => 'Commercial Book & Form Printing',
                'description' => 'Cost-effective, chemistry-free offset printing plates for single-color and spot-color commercial press runs.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Commercial books and business forms offset printing',
            ],
            'screen-printing-positives' => [
                'title' => 'Screen Printing Positives',
                'description' => 'High optical density film positives for t-shirt, garment, textile, and ceramic silkscreen stencil exposure.',
                'image' => 'images/products/applications/commercial-prints.jpg',
                'alt' => 'Silkscreen textile and garment printing positives',
            ],
        ];
    }
}
