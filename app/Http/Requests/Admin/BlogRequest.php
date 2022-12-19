<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class BlogRequest extends Request
{
    public function rulesForCreate()
    {
        return [
            'title' => ['string'],
            'sub_title' => ['string'],
            'description' => ['string'],
            'creator_id' => ['nullable']
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => ['string'],
            'sub_title' => ['string'],
            'description' => ['string'],
            'creator_id' => ['nullable']
        ];
    }
}
