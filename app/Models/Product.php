<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Media;
use A17\Twill\Models\Model;
use App\Traits\WithRelationships;
use Intervention\Image\Facades\Image;

class Product extends Model implements Sortable
{
    use HasSlug, HasMedias, HasFiles, HasRevisions, HasPosition, WithRelationships;

    protected static $relationships = [
        'medias',
    ];

    protected $fillable = [
        'published',
        'title',
        'short_description',
        'full_description',
        'position',
        'article',
        'manufacturer',
        'machines',
        'pub_user_id',
        'category_id',
        'in_stock',
        'price'
    ];

    public $slugAttributes = [
        'title',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function scopeCover()
    {
        // $collection = collect($this->medias);
 
        // $collection->contains(function ($value, $key) {
        //     return $value->pivot->role === 'cover';
        // });

        // $url = 'storage/' . $collection[0]->uuid;

        // $image = Image::make($url)
        //     ->crop($collection[0]->pivot->crop_w, $collection[0]->pivot->crop_h, 
        //     $collection[0]->pivot->crop_x, $collection[0]->pivot->crop_y);

        return $this->image('cover');
    }

    public function scopeMedia()
    {
        // $collection = collect($this->medias);
 
        // $collection->contains(function ($value, $key) {
        //     return $value->pivot->role === 'preview';
        // });
        
        // $image = Image::make($url)
        //     ->crop($collection[0]->pivot->crop_w, $collection[0]->pivot->crop_h, 
        //         $collection[0]->pivot->crop_x, $collection[0]->pivot->crop_y)
        //     ->encode('data-url');

        // return $image;

        return $this->images('preview');
    }

    public $filesParams = [
        'attachment',
        'attachments',
    ];

    public $mediasParams = [
        'cover' => [
            'default' => [
                [
                    'name' => 'Свободная трансформация',
                    'ratio' => 0,
                ],
            ],
        ],
        'preview' => [
            'default' => [
                [
                    'name' => 'Свободная трансформация',
                    'ratio' => 0
                ]
            ]
        ]
    ];
}
