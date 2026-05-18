<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intolerance extends Model
{
    /** @use HasFactory<\Database\Factories\IntoleranceFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the users that have this intolerance.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_intolerances')
                    ->withPivot('severity', 'notes')
                    ->withTimestamps();
    }
}
