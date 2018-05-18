<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
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
            'full_name' => 'nullable|min:3|max:70',
            'birthday' => 'nullable|date',
            'location' => 'nullable|min:3|max:100',
            'nickname' => 'required|string|min:5|max:120',
            'short_text' => 'nullable|min:5|max:255',
            'biography' => 'min:5',
            'image' => 'dimensions:min_width=300,min_height=300,max_width=400,max_height=400|image|mimes:jpeg,jpg,png|max:500',
            'alias' => 'required|string|min:3|max:255|unique:artists,alias,' . $this->id .' ',
            'status' => 'nullable',
            'category_id' => 'nullable|integer',
            'official_site' => 'nullable|url|min:3',
            'fan_site' => 'nullable|url|min:3',
            'social_vk' => 'nullable|url|min:3',
            'social_facebook' => 'nullable|url|min:3',
            'social_instagram' => 'nullable|url|min:3',
            'social_twitter' => 'nullable|url|min:3',
            'social_soundcloud' => 'nullable|url|min:3',
            'social_youtube' => 'nullable|url|min:3',
            'title_seo' => 'required|string|min:5|max:150',
            'description_seo' => 'required|string|min:5|max:255',
        ];
    }

}
