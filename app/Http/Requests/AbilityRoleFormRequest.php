<?php

namespace App\Http\Requests;

use App\Models\AbilityRole;
use Illuminate\Foundation\Http\FormRequest;

class AbilityRoleFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

        // return Gate::allows('ability_management');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = AbilityRole::createRules();
        
        if (request()->method == 'PUT' || request()->method == 'PATCH') {
            $rules = array_merge($rules, AbilityRole::updateRules());
        }

        return $rules;
    }
}
