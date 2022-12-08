<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class IndexSlideController extends BaseModuleController
{
    protected $moduleName = 'indexSlides';

    protected $indexOptions = [
        'permalink' => false,
        'publish' => false,
    ];

    protected $indexColumns = [
        'title' => [
            'title' => 'Наименование',
            'field' => 'title',
        ],
    ];
}
