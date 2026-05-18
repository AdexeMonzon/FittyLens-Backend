<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIntolerance extends Model
{
    /** @use HasFactory<\Database\Factories\UserIntoleranceFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'intolerance_id',
        'severity',
        'notes',
    ];

    /**
     * Get the user associated with this user intolerance record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the intolerance associated with this user intolerance record.
     */
    public function intolerance()
    {
        return $this->belongsTo(Intolerance::class);
    }
}
