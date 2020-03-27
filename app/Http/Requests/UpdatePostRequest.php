<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required', 'min:3',
                $this->post ? Rule::unique('posts')->ignore($this->post) : 'unique:posts',

            ],
            'description' => 'required|min:10'
        ];
    }
    public function messages()
    {
        return [
            'title.min' => 'Title Must be at least Five char',
            'title.reuired' => 'Title is required'
        ];
    }
}
