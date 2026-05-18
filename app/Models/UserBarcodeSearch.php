<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBarcodeSearch extends Model
{
    /** @use HasFactory<\Database\Factories\UserBarcodeSearchFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'barcode',
        'product_name',
        'is_match',
        'scanned_at',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'is_match' => 'boolean',
            'scanned_at' => 'datetime',
        ];
    }

    /**
     * Get the user that made this barcode search (null if done by a guest).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
