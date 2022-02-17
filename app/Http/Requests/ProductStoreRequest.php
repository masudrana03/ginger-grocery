<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ( !isShopManager( $this->store_id ) && !isAdmin() ) {
            return false;
        }

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
            'name'         => 'required',
            'description'  => 'required',
            'excerpt'      => 'required',
            'price'        => 'required',
            'brand_id'     => 'required',
            'category_id'  => 'required',
            'unit_id'      => 'required',
            'types'        => 'required',
            'nutritions'   => 'required',
            'store_id'     => 'required',
            'files'        => 'required',
            // 'files'        => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=1100px,min_height=1100px',
        ];
    }
}
