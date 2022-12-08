<?php

namespace App\Filters;

use App\Filters\AbstractFilter;

class ProductFilter extends AbstractFilter
{
    protected $filters = [
        'category' => CategoryFilter::class,
        'user' => UserFilter::class
    ];
}
