<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\IndexSlide;

class IndexSlideRepository extends ModuleRepository
{
    use HandleSlugs, HandleMedias, HandleRevisions;

    public function __construct(IndexSlide $model)
    {
        $this->model = $model;
    }
}
