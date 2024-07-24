<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCartItem extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'quantity'=>'required|integer|between:1,10'

        ];
    }
    public function messages()
    {
        return[
            'quantity.between'=>'數量必須小於 10 '
        ];
    }
}
