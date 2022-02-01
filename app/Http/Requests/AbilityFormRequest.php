<?php

namespace App\Http\Requests;

use App\Models\Ability;
use Illuminate\Foundation\Http\FormRequest;

class AbilityFormRequest extends FormRequest
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
        $rules = Ability::createRules();
        
        if (request()->method == 'PUT' || request()->method == 'PATCH') {
            $rules = array_merge($rules, Ability::updateRules());
        }

        return $rules;
    }
}
