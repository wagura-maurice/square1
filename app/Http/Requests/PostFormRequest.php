<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

        // return Gate::allows('post_management');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Post::createRules();
        
        if (request()->method == 'PUT' || request()->method == 'PATCH') {
            $rules = array_merge($rules, Post::updateRules(request()->route()->originalParameters()['post']));
        }

        return $rules;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge(array_filter([
            'publication_date' => $this->publication_date ? Carbon::parse($this->publication_date)->toDateTimeString() : Carbon::now()->toDateTimeString(),
        ]));
    }
}
