<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'      => 'string|required|max:30',
            'email'     => 'string|required|unique:users,email,NULL,id,deleted_at,NULL',
            'phone'     => 'string|required|unique:users,phone,NULL,id,deleted_at,NULL',
            'password'  => 'string|required',
            'status'    => 'required|in:active,inactive',
            'photo'     => 'nullable|string',
        ];
    }
}
