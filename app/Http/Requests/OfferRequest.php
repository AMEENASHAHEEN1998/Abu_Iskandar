<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'offer_title_ar' => 'required',
            'description_ar' => 'required',
            'offer_title_en' => 'required',
            'description_en' => 'required',
            'price' => 'required',
            // 'image' => 'required',
        ];
    }
}
