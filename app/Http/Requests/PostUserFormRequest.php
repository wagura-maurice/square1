<?php

namespace App\Http\Requests;

use App\Models\PostUser;
use Illuminate\Foundation\Http\FormRequest;

class PostUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

        // return Gate::allows('post_user_management');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = PostUser::createRules();
        
        if (request()->method == 'PUT' || request()->method == 'PATCH') {
            $rules = array_merge($rules, PostUser::updateRules());
        }

        return $rules;
    }
}
