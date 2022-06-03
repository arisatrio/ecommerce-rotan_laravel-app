<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShippingStoreRequest extends FormRequest
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
            'type'          => 'required|string',
            'destination'   => 'required|string',
            'price'         => 'required|numeric',
            'status'        => 'required|in:active,inactive',
            'user_id'       => 'required',
        ];
    }
}
