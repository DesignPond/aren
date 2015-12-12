<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateIcon extends Request
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
            'titre' => 'required',
            'style' => 'required'
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
            'titre.required'  => 'Le titre est requis',
            'style.required'  => 'Le style est requis'
        ];
    }
}

