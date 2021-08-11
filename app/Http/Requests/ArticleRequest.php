<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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

            'article_name_ar'  => 'required',
            'article_name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
        ];
    }
}
