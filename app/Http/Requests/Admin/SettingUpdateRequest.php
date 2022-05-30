<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'short_des'     => 'required|string',
            'description'   => 'required|string',
            'photo'         => 'required',
            'logo'          => 'required',
            'address'       => 'required|string',
            'email'         => 'required|email',
            'phone'         => 'required|string',
        ];
    }
}