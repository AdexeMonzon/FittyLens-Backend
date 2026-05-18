<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteProduct extends Model
{
    /** @use HasFactory<\Database\Factories\UserFavoriteProductFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'notes',
    ];

    /**
     * Get the user associated with this favorite.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product associated with this favorite.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
