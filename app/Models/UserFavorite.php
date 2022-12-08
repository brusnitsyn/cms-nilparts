<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'favoriteable_id',
        'favoriteable_type',
        'user_id',
    ];

    /**
     * Получить все модели, обладающие favoriteable.
     */
    public function favoriteable()
    {
        return $this->morphTo();
    }
}
