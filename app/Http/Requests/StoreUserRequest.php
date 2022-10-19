<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'pernum'        => 'required|unique:users',
            'user_name'     => 'required|max:100',
            'email'         => 'required|unique:users',
            'date_birth'    => 'nullable',
            'password'      => 'required|max:100',
        ];
    }
}
