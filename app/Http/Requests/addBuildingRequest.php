<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addBuildingRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'sq' => 'required',
            'beds' => 'required',
            'baths' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'type' => 'required',
            'description' => 'required',
            'images' => 'required',
        ];
    }
}
