<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
        
            'picture_path' => ['required'],
            'phone' => ['required',  'min:11', 'max:11','regex:/(01)[0-9]{9}/'],
            'email' => ['required', 'min:10', 'max:30','email','unique:teachers'],
        ];
    }
}
