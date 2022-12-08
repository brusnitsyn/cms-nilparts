<?php

namespace App\Models;

use App\Traits\Uploadable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::created(function($model)
        {
            $model->uploadFile(request()->file('image'), 'slides');
        });
    }

    protected $fillable = [
      'text',
      'url'
    ];
}
