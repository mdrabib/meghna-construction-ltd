<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            // 'docuname' =>'required',
            // 'docufile' => 'required|mimes:jpg,jpeg,png,bmp,tiff,gif|max:4096'
        ];
    }

    /**
     * Custome message
     */

    public function message(){
        return [
            'required' => "The :attribute field is required"
        ];
    }
}
