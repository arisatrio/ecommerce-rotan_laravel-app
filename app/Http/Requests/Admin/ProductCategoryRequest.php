<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
            'name'          => 'string|required',
            'description'   => 'string|nullable',
            'photo'         => 'string|nullable',
            'status'        => 'required|in:active,inactive',
            'is_parent'     => 'in:1,0',
            'parent_id'     => 'nullable|exists:product_categories,id',
        ];
    }
}
