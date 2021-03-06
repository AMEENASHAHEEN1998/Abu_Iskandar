<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistributorRequest extends FormRequest
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
            'name_en' =>'required',
            'name_ar' =>'required',
            'city_id' =>'required',

            'distributor_type_id' =>'required',
            'phone_number' =>'required|max:10',

        ];
    }
}
