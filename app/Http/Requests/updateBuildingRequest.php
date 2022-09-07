<?php

namespace App\Http\Requests;

use App\Models\Building;
use Illuminate\Foundation\Http\FormRequest;

class updateBuildingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $currBuilding = Building::FindOrFail($this->building);

        if (auth()->user()->hasRole('admin')) {
            return true;
        } else if ($currBuilding->user_id == auth()->id()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        dd($this->building);
        return [
            'name' => 'required',
            'price' => 'required',
            'sq' => 'required',
            'beds' => 'required',
            'baths' => 'required',
            'price_sq' => 'required',
            'year_built' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'type' => 'required',
            'description' => 'required',
            'images' => 'nullable',
        ];
    }
}
