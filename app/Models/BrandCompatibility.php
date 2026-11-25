<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrandCompatibility extends Model
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
        'image',
        'alt',
        'sort_order',
    ];

    /**
     * Get the brand this compatibility record belongs to.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get predefined compatibility presets for easy selection in dropdowns.
     *
     * @return array<string, array<string, string>>
     */
    public static function getPresets(): array
    {
        return [
            'hp-indigo' => [
                'title' => 'HP Indigo',
                'description' => 'Compatible with HP Indigo digital printing technology for applications requiring digital production printing.',
                'image' => 'images/products/technologies/hp-indigo.png',
                'alt' => 'HP Indigo digital printing technology compatibility',
            ],
            'dry-toner' => [
                'title' => 'Dry Toner',
                'description' => 'Suitable for compatible dry toner printing systems used in digital production environments.',
                'image' => 'images/products/technologies/dry-toner.png',
                'alt' => 'Dry toner digital printing technology compatibility',
            ],
            'inkjet-dye-pigment' => [
                'title' => 'Inkjet (Dye & Pigment)',
                'description' => 'Compatible with inkjet printing systems using both dye and pigment inks, supporting different printing requirements.',
                'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                'alt' => 'Inkjet dye and pigment ink printing compatibility',
            ],
            'laser-imaging' => [
                'title' => 'Laser Imaging',
                'description' => 'Suitable for compatible laser-based imaging systems used in offset plate preparation.',
                'image' => 'images/products/technologies/dry-toner.png',
                'alt' => 'Laser-based imaging systems used in offset plate preparation',
            ],
            'inkjet-imaging' => [
                'title' => 'Inkjet Imaging',
                'description' => 'Designed for compatible inkjet-based imaging workflows for selected offset-printing applications.',
                'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                'alt' => 'Inkjet-based imaging workflows for selected offset-printing applications',
            ],
            'offset-printing' => [
                'title' => 'Offset Printing',
                'description' => 'Developed for use in selected offset-printing processes requiring compatible imageable plate solutions.',
                'image' => 'images/products/technologies/Offset.png',
                'alt' => 'Selected offset-printing processes requiring compatible imageable plate solutions',
            ],
            'cad-printing' => [
                'title' => 'CAD Printing',
                'description' => 'Suitable for computer-aided design printing workflows involving technical drawings, engineering plans and architectural layouts.',
                'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                'alt' => 'CAD printing workflows involving technical drawings, engineering plans and architectural layouts',
            ],
            'gis-printing' => [
                'title' => 'GIS Printing',
                'description' => 'Designed for printing geographical information, maps and spatial representations.',
                'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                'alt' => 'GIS printing for geographical information, maps and spatial representations',
            ],
            'proofing' => [
                'title' => 'Proofing',
                'description' => 'Suitable for proofing workflows requiring accurate visual reproduction and output evaluation.',
                'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                'alt' => 'Proofing workflows requiring accurate visual reproduction and output evaluation',
            ],
            'screen-printing' => [
                'title' => 'Screen Printing',
                'description' => 'Suitable for selected screen printing positive and stencil creation processes.',
                'image' => 'images/products/technologies/Screen.png',
                'alt' => 'Screen printing positive and stencil creation processes',
            ],
            'uv-curable' => [
                'title' => 'UV-Curable Printing',
                'description' => 'Engineered for instant UV curing, high dot sharpness, and excellent ink adhesion on specialty substrates.',
                'image' => 'images/products/technologies/inkjet-dye-pigment.png',
                'alt' => 'UV-Curable digital printing technology compatibility',
            ],
            'latex-printing' => [
                'title' => 'Latex Printing',
                'description' => 'Optimized for water-based latex inks offering odorless prints and high scratch resistance.',
                'image' => 'images/products/technologies/dry-toner.png',
                'alt' => 'Latex digital printing technology compatibility',
            ],
        ];
    }
}
