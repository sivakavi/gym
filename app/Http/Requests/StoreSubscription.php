<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;


class StoreSubscription  extends FormRequest
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
        $amt = Input::get('amt');
        return [
            'sdate' => 'required|date',
            'edate' => 'required|date|after:sdate',
            'category_type' => 'required', 
            'amt' => 'required',
            'phno' => 'required',
        ];
    }
}
