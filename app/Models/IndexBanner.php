<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class IndexBanner extends Model implements Sortable
{
    use HasRevisions, HasPosition;

    protected $fillable = [
        'published',
        'title',
        'text',
        'btn_link',
        'btn_text',
        'description',
        'position',
    ];

}
