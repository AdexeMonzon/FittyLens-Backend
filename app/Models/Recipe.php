<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /** @use HasFactory<\Database\Factories\RecipeFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'instructions',
        'prep_time',
        'difficulty',
        'image_url',
        'ingredients',
        'allergens',
        'is_ai_generated',
        'search_query',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'ingredients' => 'array',
            'allergens' => 'array',
            'is_ai_generated' => 'boolean',
        ];
    }

    /**
     * Get the users that have favorited this recipe.
     */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_favorite_recipes')
                    ->withTimestamps();
    }

    /**
     * Get the recommended products associated with this recipe.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'recipe_product')
                    ->withTimestamps();
    }
}
