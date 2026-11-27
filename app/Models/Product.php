<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
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
        'category',
        'description',
        'short_description',
        'banner_image',
        'brochure_url',
        'benefits_overline',
        'benefits_title',
        'benefits_description',
        'impact_title',
        'impact_description',
        'impact_banner',
        'is_active',
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
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Get all applications for this product.
     */
    public function applications(): HasMany
    {
        return $this->hasMany(ProductApplication::class)->orderBy('sort_order');
    }

    /**
     * Get all key benefits for this product.
     */
    public function benefits(): HasMany
    {
        return $this->hasMany(ProductBenefit::class)->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Get all application categories for this product.
     */
    public function applicationCategories(): HasMany
    {
        return $this->hasMany(ProductApplicationCategory::class)->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Get all brands associated with this product.
     */
    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class)
            ->withPivot('sort_order')
            ->withTimestamps()
            ->orderByPivot('sort_order');
    }
}
