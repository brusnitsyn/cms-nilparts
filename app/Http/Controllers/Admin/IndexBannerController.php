<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class IndexBannerController extends BaseModuleController
{
    protected $moduleName = 'indexBanners';

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
