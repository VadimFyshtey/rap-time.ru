<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LyricsRequest extends FormRequest
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
            'lyrics_name' => 'required|string|min:1|max:255',
            'text' => 'required|string|min:5',
            'translate' => 'nullable|string',
            'alias' => 'required|string|min:3|max:255',
            'status' => 'nullable',
            'category_id' => 'nullable|integer',
            'artistLyrics' => 'array',
            'video_url' => 'nullable|string',
            'title_seo' => 'required|string|min:5|max:150',
            'description_seo' => 'required|string|min:5|max:255',
        ];
    }

}
