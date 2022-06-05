<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
        //dd($this->user);
        return [
            'name'      => 'string|required|max:30',
            'email'     => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->user()->email)->whereNull('deleted_at')->WhereNotNull('deleted_at'),
            ],
            'phone'     => [
                'nullable',
                Rule::unique('users', 'phone')->ignore(auth()->user()->phone)->whereNull('deleted_at')->WhereNotNull('deleted_at'),
            ],
            'photo'     => 'nullable|string',
            'status'    => 'required|in:active,inactive',
        ];
    }
}
