<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
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
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
//            'quantity' => 'required|numeric|max:11',
//            'buy_price' => 'required|numeric',
//            'sell_price' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
//            'buy_price.is_double' => 'The value informed in the field Buy Price is invalid.',
//            'sell_price.is_double' => 'The value informed in the field Sell Price is invalid.',
        ];
    }
}
