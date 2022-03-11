<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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

            'name' => ['required', 'min:3', 'max:30'],
            'username' => ['required', 'min:5', 'max:15','unique:users'],
           
            'password' => ['required',  'min:8', 'max:20'],
            'government' => ['required','min:4', 'max:10'],
            'city' => ['required','min:4', 'max:10'],
            'street' => ['required' ,'min:4', 'max:10'],
        
            'picture_path' => 'image|mimes:jpeg,pmb,png,jpg|max:88453',
            'phone' => ['required',  'min:11', 'max:11','regex:/(01)[0-9]{9}/'],
    
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'username.required' => 'username is required',
            'password.required' => 'A password is required',
            'government.required' => 'A government is required',
            'city.required' => 'A city is required',
            'street.required' => 'A street is required',

            'phone.required' => 'A phone is required',

            
        ];
    }
}
