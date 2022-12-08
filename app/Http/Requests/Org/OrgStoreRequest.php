<?php

namespace App\Http\Requests\Org;

use Illuminate\Foundation\Http\FormRequest;

class OrgStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'inn' => 'required|string',
            'ogrn' => 'required|string',
            'desc' => 'nullable|string',
            'kpp' => 'required|string',
            'email' => 'nullable|email',
            'call' => 'nullable|string',

            'bank_bik' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'bank_ks' => 'nullable|string',
            'bank_rs' => 'nullable|string',

            'type.id' => 'required|numeric',
            'type.name' => 'required|string',
        ];
    }
}
