<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateImage extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (\Auth::check())
        {
            return true;
        }

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
            'page_id'  => 'required',
            'style'    => 'required'
        ];
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'page_id.required' => 'La page est requise',
            'style.required'   => 'Le style est requis',
        ];
    }
}
