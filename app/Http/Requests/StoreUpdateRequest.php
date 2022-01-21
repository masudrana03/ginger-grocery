<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
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
            'name'           => 'required',
            'type'           => 'required',
            'phone'          => 'required',
            'city'           => 'required',
            'zip'            => 'required|numeric',
            'address'        => 'required',
            'description'    => 'required',
            'zone_id'        => 'required|numeric',
            'latitude'       => 'required',
            'longitude'      => 'required',
        ];
    }
}
