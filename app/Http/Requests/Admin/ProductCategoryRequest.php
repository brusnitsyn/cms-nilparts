<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class ProductCategoryRequest extends Request
{
    public function rulesForCreate()
    {
        return [
            'title' => 'required|string|max:255',
            'category_parent_id' => 'nullable',
            'medias' => 'nullable',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => 'required|string|max:255',
            'category_parent_id' => 'nullable',
            'medias' => 'nullable'
        ];
    }
}
