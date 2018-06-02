<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            'artist_name' => 'required|string|min:1|max:255',
            'album_name' => 'required|string|min:1|max:255',
            'short_text' => 'nullable|string|min:3|max:255',
            'short_content' => 'string|min:5|max:255',
            'full_content' => 'required|string|min:5',
            'image' => 'dimensions:min_width=300,min_height=300,max_width=400,max_height=400|image|mimes:jpeg,jpg,png|max:500',
            'alias' => 'required|string|min:3|max:255',
            'status' => 'nullable',
            'category_id' => 'nullable|integer',
            'artistAlbum' => 'array',
            'link_first' => 'nullable|url',
            'link_second' => 'nullable|url',
            'title_seo' => 'required|string|min:5|max:150',
            'description_seo' => 'required|string|min:5|max:255',
        ];
    }

}
