<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\WithRelationships;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory, WithRelationships;

    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->slug = $model->id . '-' . Str::slug($model->title);
            $model->save();
        });

        static::updating(function ($model) {
            $model->slug = $model->id . '-' . Str::slug($model->title);
        });

        static::saved(function ($model) {
            if(request()->hasFile('image'))
                $model->uploadFile(request()->file('image'), 'blog');
        });
    }

    protected static $relationships = [
        'attachments',
    ];

    protected $fillable = [
        'title', 'sub_title', 'content', 'slug'
    ];

    public function attachments()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
}
