<?php

namespace App\Http\Requests\Org;

use App\Models\Org;
use App\Models\OrgUser;
use Illuminate\Foundation\Http\FormRequest;

class OrgUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user();
        $orgUser = OrgUser::where('user_id', $user->id)->first();
        $org = Org::whereId($orgUser->org_id)->first();
        if(auth('sanctum')->check() && $org->creator->id == $user->id) return true;
        else return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'nullable|string',
            'inn' => 'nullable|string',
            'ogrn' => 'nullable|string',
            'desc' => 'nullable|string',
            'kpp' => 'nullable|string',
            'email' => 'nullable|email',
            'call' => 'nullable|string',

            'bank_bik' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'bank_ks' => 'nullable|string',
            'bank_rs' => 'nullable|string',

            'type.id' => 'nullable|numeric',
            'type.name' => 'nullable|string',
        ];
    }
}
