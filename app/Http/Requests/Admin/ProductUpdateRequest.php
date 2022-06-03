<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'primary_photo'         => 'nullable|string',
            'photos'                => 'nullable|string',
            'name'                  => 'required|string',
            'product_category_id'   => 'required|exists:product_categories,id',
            'summary'               => 'required|string',
            'description'           => 'required|string',
            'stock'                 => 'required|numeric',
            'price'                 => 'required',
            'discount'              => 'nullable|numeric',
            'dimension'             => 'nullable|string',
            'is_featured'           => 'nullable|in:0,1',
            'status'                => 'required|in:active,inactive',
            'user_id'               => 'required|exists:users,id',
        ];
    }
}
