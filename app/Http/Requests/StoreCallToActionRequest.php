<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallToActionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'store'            => 'required',
            'action_location'  => 'required',
            'action_location'  => 'required',
            'status'           => 'required',
            'image'            => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=916px,min_height=500px',
        ];
    }
}
