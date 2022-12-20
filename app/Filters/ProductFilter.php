<?php

namespace App\Filters;

use App\Filters\AbstractFilter;

class ProductFilter extends QueryFilter
{
    public function category(string $categoryId)
    {
        $this->builder->where('category_id', $categoryId);
    }
}
