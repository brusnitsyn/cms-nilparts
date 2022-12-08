<?php

namespace App\Http\Requests\Basket;

use Illuminate\Foundation\Http\FormRequest;

class BasketStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required',
            'quantity' => 'required'
        ];
    }
}
