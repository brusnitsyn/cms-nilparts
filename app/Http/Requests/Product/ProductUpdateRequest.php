<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'article' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'machines' => 'nullable|string|max:550',
            'desc' => 'nullable',
            'price' => 'nullable',
            'categoryId' => 'nullable|numeric',
            'images[]' => 'nullable|array|image|size:10000',
            'nds' => 'nullable|numeric',
            'cost_per' => 'nullable|numeric',
            'in_stock' => 'nullable',
            'unit_id' => 'nullable|numeric',
        ];
    }
}
