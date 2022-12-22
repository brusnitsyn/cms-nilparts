<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductFilter extends QueryFilter
{
    public function category(int $categoryId)
    {
        if ($categoryId === 0)
            return;

        $this->builder->where('category_id', $categoryId);
    }
}
