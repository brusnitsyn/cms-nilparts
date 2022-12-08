<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;

class Index extends Model 
{
    use HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];
    
}
