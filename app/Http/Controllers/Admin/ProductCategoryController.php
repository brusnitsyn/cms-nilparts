<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ProductCategoryRepository;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class ProductCategoryController extends BaseModuleController
{
    protected $moduleName = 'productCategories';

    protected $indexOptions = [
        'permalink' => false,
        'publish' => false,
        'bulkPublish' => false
    ];

    protected $indexColumns = [
        'title' => [
            'title' => 'Наименование',
            'field' => 'title',
        ],
    ];

    protected function formData($request)
    {
        return [
            'categories' => app()->make(ProductCategoryRepository::class)->listAll()
        ];
    }
}
