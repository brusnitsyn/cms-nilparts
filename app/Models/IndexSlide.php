<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class IndexSlide extends Model implements Sortable
{
    use HasSlug, HasMedias, HasRevisions, HasPosition;

    protected $fillable = [
        'published',
        'title',
        'btn_link',
        'btn_text',
        'position',
    ];

    public $slugAttributes = [
        'title',
    ];

    public function scopeMedia()
    {
        return $this->image('slide');
    }

    public $mediasParams = [
        'slide' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 0,
                ],
            ],
        ],
    ];
}
