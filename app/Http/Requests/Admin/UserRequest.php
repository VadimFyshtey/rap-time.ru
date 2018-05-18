<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'nullable|string',
            'avatar' => 'dimensions:min_width=300,min_height=300,max_width=400,max_height=400|image|mimes:jpeg,jpg,png|max:500',
            'role_id' => 'integer',
            'is_banned' => 'nullable',
            'comment' => 'nullable|string',
        ];
    }

}
