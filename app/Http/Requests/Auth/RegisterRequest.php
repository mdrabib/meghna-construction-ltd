<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'userFullName' => ['required', 'string'],
            'userEmailAddress' => 'required|email|unique:users,email',
            'userRoles' => 'required',
            'userPhoneNumber' => 'required|numeric|unique:users,phone',
            'userPassword' => ['required', 'string','min:8','max:40'],
            'userAvatar' => 'mimes:jpg,jpeg,png|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'field', 'Something is wrong with this field!',
            'same' => 'The :attribute and :other must match.',
            'size' => 'The :attribute must be exactly :size.',
            'between' => 'The :attribute value :input is not between :min - :max.',
            'in' => 'The :attribute must be one of the following types: :values',
            'max' => 'Your :attribute is too long!',
            'min' => 'Your :attribute is too sort!',
            'mimes' => 'Only JPG or PNG are allowed'
        ];
    }
}
