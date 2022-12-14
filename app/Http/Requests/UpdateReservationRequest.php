<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'department_id' =>  'required',
            'user_id'       =>  'required',
            'date_start'    =>  'required',
            'date_end'      =>  'required',
            'rooms'         =>  'required',
            'doors'         =>  'nullable',
            'specials'      =>  'nullable',
            'status'        =>  'required'
        ];
    }
}
