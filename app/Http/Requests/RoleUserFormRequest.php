<?php

namespace App\Http\Requests;

use App\Models\RoleUser;
use Illuminate\Foundation\Http\FormRequest;

class RoleUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

        // return Gate::allows('user_role_management');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = RoleUser::createRules();
        
        if (request()->method == 'PUT' || request()->method == 'PATCH') {
            $rules = array_merge($rules, RoleUser::updateRules());
        }

        return $rules;
    }
}
