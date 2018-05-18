<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'profileName' => 'nullable|min:5|max:30',
            'profileAvatar' => 'dimensions:min_width=100,min_height=100,max_width=400,max_height=400|image|mimes:jpeg,jpg,png|max:300'
        ];
    }

}
