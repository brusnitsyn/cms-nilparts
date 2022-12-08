<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class ProductRequest extends Request
{
    public function rulesForCreate()
    {
        return [
            'title' => 'required|string|max:255',
            'article' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'machines' => 'nullable|string|max:550',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'category_id' => 'nullable|numeric',
            'images' => 'nullable|array',
            'in_stock' => 'nullable|boolean',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => 'required|string|max:255',
            'article' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'machines' => 'nullable|string|max:550',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'category_id' => 'nullable|numeric',
            'images' => 'nullable|array',
            'in_stock' => 'nullable|boolean',
        ];
    }
}
