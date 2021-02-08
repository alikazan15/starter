<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class offerRequest extends FormRequest
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

            'name_ar' => 'required|max:100',
            'name_en' => 'required|max:100',
            'price' => 'required|numeric',
            'details_ar' => 'required',
            'details_en' => 'required',
    
        ];
    }

    public function messages()
    {

        return [
            
            'name.required' =>__( 'messages.offer name required'),
            'name.unique' => __('messages.offer name must be unique'),
            'price.numeric' => __('messages.price must be numeric'),
            'price.required' => __('messages.price is required'),
            'details.required' => __('messages.details is required'),

        ];
    }
}
