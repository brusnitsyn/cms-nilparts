<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Traits\WithRelationships;

class ProductCategory extends Model implements Sortable
{
    use HasSlug, HasMedias, HasFiles, HasPosition, WithRelationships;

    protected static $relationships = [
        'medias',
        'products',
        'parent',
        'children'
    ];

    protected $fillable = [
        'published',
        'title',
        'category_parent_id',
        'position',
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'active',
    ];

    public $slugAttributes = [
        'title',
    ];

    // Relations
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'category_parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'category_parent_id', 'id');
    }

    public function childrens()
    {
        return $this->children()->with('childrens');
    }

    public function scopeMedia()
    {
        return $this->image('preview');
    }

    public $mediasParams = [
        'preview' => [
            'default' => [
                [
                    'name' => 'Свободная трансформация',
                    'ratio' => 0,
                ],
            ],
        ],
    ];

    public function setCategoryParentIdAttribute($value)
    {
        if($value === 0)
            $this->attributes['category_parent_id'] = null;
        else
            $this->attributes['category_parent_id'] = $value;
    }
}
