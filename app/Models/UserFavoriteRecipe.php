<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteRecipe extends Model
{
    /** @use HasFactory<\Database\Factories\UserFavoriteRecipeFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recipe_id',
    ];

    /**
     * Get the user associated with this favorite recipe.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the recipe associated with this favorite.
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
