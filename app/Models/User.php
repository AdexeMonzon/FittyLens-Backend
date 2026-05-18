<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's intolerances.
     */
    public function intolerances()
    {
        return $this->belongsToMany(Intolerance::class, 'user_intolerances')
                    ->withPivot('severity', 'notes')
                    ->withTimestamps();
    }

    /**
     * Get the user's favorite products.
     */
    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'user_favorite_products')
                    ->withPivot('notes')
                    ->withTimestamps();
    }

    /**
     * Get the user's favorite recipes.
     */
    public function favoriteRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'user_favorite_recipes')
                    ->withTimestamps();
    }

    /**
     * Get the user's barcode searches.
     */
    public function barcodeSearches()
    {
        return $this->hasMany(UserBarcodeSearch::class);
    }
}
