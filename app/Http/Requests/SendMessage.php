<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SendMessage extends Request
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
            'nom'        => 'required',
            'email'      => 'required|email',
            'remarque'   => 'required',
            'telephone'  => 'required'
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
            'nom.required'       => 'Votre nom est requis',
            'email.required'     => 'Votre e-mail est requis',
            'email.email'        => 'Votre e-mail n\'est pas valide',
            'remarque.required'  => 'Un message est requis'
        ];
    }
}
