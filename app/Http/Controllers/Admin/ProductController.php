<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Repositories\ProductCategoryRepository;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class ProductController extends BaseModuleController
{
    protected $moduleName = 'products';

    protected $indexOptions = [
        'permalink' => false,
    ];

    protected $indexColumns = [
        'title' => [
            'title' => 'Наименование',
            'field' => 'title',
        ],
    ];

    protected $browserColumns = [
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
