<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'barcode',
        'name',
        'brand',
        'ingredients',
        'allergens',
        'image_url',
        'nutriscore',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'allergens' => 'array',
        ];
    }

    /**
     * Get the users that have favorited this product.
     */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_favorite_products')
                    ->withPivot('notes')
                    ->withTimestamps();
    }

    /**
     * Get the recipes that recommend this product.
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_product')
                    ->withTimestamps();
    }
}
