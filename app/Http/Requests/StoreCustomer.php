<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
            'name' => 'required',
            'dob' => 'required|date|before:today',
            'mobilenumber' => 'required|unique:customers', 
            'doj' => 'required|date',
            'photo' => 'sometimes|required|mimes:jpeg,png,jpg',
            'address' => 'required',
            'email' => 'required|unique:customers'
        ];
    }
}
