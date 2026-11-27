<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ProductApplicationCategory extends Model
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
        'slug',
        'has_carousel',
        'sort_order',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'has_carousel' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Get the product this application category belongs to.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get all application items belonging to this category.
     */
    public function items(): HasMany
    {
        return $this->hasMany(ProductApplicationCategoryItem::class)->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Standard pre-filled application categories with their items and images.
     *
     * @return array<string, array{
     *     title: string,
     *     has_carousel: bool,
     *     items: list<array{title: string, image: string}>
     * }>
     */
    public static function getPresets(): array
    {
        return [
            'photography-imaging' => [
                'title' => 'Photography & Imaging',
                'has_carousel' => true,
                'items' => [
                    ['title' => 'Photo Books', 'image' => 'images/products/applications/Photobooks.png'],
                    ['title' => 'Memory Books', 'image' => 'images/products/applications/MemoryBooks.jpg'],
                    ['title' => 'Wedding Albums', 'image' => 'images/products/applications/WeddingAlbums.jpg'],
                ],
            ],
            'medical-diagnostic-imaging' => [
                'title' => 'Medical & Diagnostic Imaging',
                'has_carousel' => true,
                'items' => [
                    ['title' => 'Chest X-Ray Films', 'image' => 'images/products/applications/ChestX-RayFilms.jpg'],
                    ['title' => 'Dental X-Ray Films', 'image' => 'images/products/applications/DentalX-RayFilms.jpg'],
                    ['title' => 'General X-Ray Films', 'image' => 'images/products/applications/GeneralX-RayFilms.jpg'],
                ],
            ],
            'cards-personal-identification' => [
                'title' => 'Cards & Personal Identification',
                'has_carousel' => true,
                'items' => [
                    ['title' => 'Business Cards', 'image' => 'images/products/applications/BusinessCards.png'],
                    ['title' => 'Visiting Cards', 'image' => 'images/products/applications/VisitingCards.png'],
                    ['title' => 'Identity Cards', 'image' => 'images/products/applications/IdentityCards.png'],
                ],
            ],
            'tags-labels' => [
                'title' => 'Tags & Labels',
                'has_carousel' => true,
                'items' => [
                    ['title' => 'Industrial Tags', 'image' => 'images/products/applications/IndustrialTags.jpg'],
                    ['title' => 'Material Tags', 'image' => 'images/products/applications/MaterialTags.jpg'],
                    ['title' => 'Baggage Tags', 'image' => 'images/products/applications/BaggageTags.jpg'],
                ],
            ],
            'books-documents-publications' => [
                'title' => 'Books, Documents & Publications',
                'has_carousel' => true,
                'items' => [
                    ['title' => 'Brochures', 'image' => 'images/products/applications/Brochures.jpg'],
                    ['title' => 'Catalogues', 'image' => 'images/products/applications/Catalogues.jpg'],
                    ['title' => 'Book Covers', 'image' => 'images/products/applications/BookCovers.jpg'],
                ],
            ],
            'retail-advertising-signage' => [
                'title' => 'Retail, Advertising & Signage',
                'has_carousel' => true,
                'items' => [
                    ['title' => 'POS Banners', 'image' => 'images/products/applications/POSBanners .png'],
                    ['title' => 'Placards', 'image' => 'images/products/applications/Placards.png'],
                    ['title' => 'Danglers', 'image' => 'images/products/applications/Danglers .png'],
                ],
            ],
            'educational-recreational-reference' => [
                'title' => 'Educational, Recreational & Reference',
                'has_carousel' => true,
                'items' => [
                    ['title' => 'Floor Plans', 'image' => 'images/products/applications/FloorPlans.png'],
                    ['title' => 'Personalised Rulers', 'image' => 'images/products/applications/PersonalisedRulers.png'],
                    ['title' => 'Mouse Pads', 'image' => 'images/products/applications/MousePads.png'],
                ],
            ],
            'specialised-outdoor-applications' => [
                'title' => 'Specialised & Outdoor Applications',
                'has_carousel' => false,
                'items' => [
                    ['title' => 'Airplane Tray Liners', 'image' => 'images/products/applications/AirplaneTrayLiners.png'],
                    ['title' => 'Sporting Bibs', 'image' => 'images/products/applications/SportingBibs.jpg'],
                    ['title' => 'Table Mats & Coasters', 'image' => 'images/products/applications/TableMats&Coasters.jpg'],
                ],
            ],
        ];
    }

    /**
     * Flat lookup of pre-filled application items keyed by slug.
     *
     * @return array<string, array{title: string, image: string, category: string}>
     */
    public static function getItemPresets(): array
    {
        $items = [];
        foreach (self::getPresets() as $category) {
            foreach ($category['items'] as $item) {
                $slug = Str::slug($item['title']);
                $items[$slug] = [
                    'title' => $item['title'],
                    'image' => $item['image'],
                    'category' => $category['title'],
                ];
            }
        }

        return $items;
    }
}
