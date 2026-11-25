<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'subtitle',
        'logo',
        'alt',
        'url',
        'banner',
        'badge_description',
        'paragraphs',
        'statement',
        'compatibility_headline',
        'brochure_url',
    ];

    /**
     * Get products associated with this brand.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('sort_order')
            ->withTimestamps()
            ->orderByPivot('sort_order');
    }

    /**
     * Get the features for this brand.
     */
    public function features(): HasMany
    {
        return $this->hasMany(BrandFeature::class)->orderBy('sort_order');
    }

    /**
     * Get the compatibility technologies for this brand.
     */
    public function compatibilities(): HasMany
    {
        return $this->hasMany(BrandCompatibility::class)->orderBy('sort_order');
    }
}
