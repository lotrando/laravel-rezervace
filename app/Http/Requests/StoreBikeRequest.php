<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBikeRequest extends FormRequest
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
			'item_id'       =>  'required',
            'user_id'       =>  'required',
			'phone'       	=>  'required',
            'pernum'        =>  'required',
            'date_born'     =>  'required',
            'date_start'    =>  'required|date|after_or_equal:today',
            'date_end'      =>  'required|date|after_or_equal:date_start',
            'status'        =>  'required'
        ];
    }
}
