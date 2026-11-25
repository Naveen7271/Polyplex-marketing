<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrandFeature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'brand_id',
        'title',
        'description',
        'sort_order',
    ];

    /**
     * Get the brand this feature belongs to.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Common feature presets available across brands.
     *
     * @return array<string, array<string, string>>
     */
    public static function getPresets(): array
    {
        return [
            'tear-resistance' => [
                'title' => 'Durability and Tear Resistance',
                'description' => 'Designed to withstand tearing during handling and use, helping printed materials maintain their usability across different applications.',
            ],
            'tactile-finish' => [
                'title' => 'Exceptional Tactile Finish',
                'description' => 'Provides a luxurious, refined matte surface ideal for high-end photo albums, luxury menus, and archival certificates.',
            ],
            'waterproof-chemical' => [
                'title' => 'Waterproof & Chemical Resistance',
                'description' => 'Impervious to moisture, oils, and spills, ensuring long-term usability without requiring protective lamination.',
            ],
            'versatile-applications' => [
                'title' => 'Versatile Application Potential',
                'description' => 'Suitable for photographic and general commercial applications where durable and reliable printed media is required.',
            ],
            'digital-production' => [
                'title' => 'Digital Production Printing',
                'description' => 'Developed for digital production printing environments, supporting different printing requirements and production workflows.',
            ],
            'multi-tech-support' => [
                'title' => 'Multiple Printing Technology Support',
                'description' => 'Compatible with HP Indigo, dry toner and inkjet technologies, offering flexibility across different digital printing systems.',
            ],
            'dye-pigment-ink' => [
                'title' => 'Dye and Pigment Ink Compatibility',
                'description' => 'Supports inkjet printing with both dye and pigment inks, accommodating different inkjet printing requirements.',
            ],
            'static-controlled' => [
                'title' => 'Static-Controlled Sheet Feeding',
                'description' => 'Specially surface-treated for smooth, jam-free feeding in high-speed commercial digital presses without double feeds.',
            ],
            'laser-plate' => [
                'title' => 'Laser-Imageable Plate Solutions',
                'description' => 'Designed to support laser-based imaging workflows for selected offset-printing applications.',
            ],
            'inkjet-plate' => [
                'title' => 'Inkjet-Imageable Technology',
                'description' => 'Supports inkjet-based imaging, offering an alternative approach for selected plate preparation requirements.',
            ],
            'technical-precision' => [
                'title' => 'Precision for Technical Imaging',
                'description' => 'Designed for technical applications requiring accurate reproduction of lines, fine details and graphical elements.',
            ],
            'uv-opacity' => [
                'title' => 'High UV Density & Sharp Edge Definition',
                'description' => 'Delivers high optical density (Dmax > 4.0) with rapid drying ink reception for crisp screen printing and flexo prepress masters.',
            ],
            'permanent-adhesion' => [
                'title' => 'Permanent Adhesive Performance',
                'description' => 'Engineered for strong permanent bonding across plastics, glass, metals, and corrugated packaging.',
            ],
        ];
    }
}
