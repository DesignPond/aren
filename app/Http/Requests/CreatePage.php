<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePage extends Request
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
           // 'auteur'     => 'required',
           // 'ouvrage'    => 'required',
           // 'page'       => 'required',
           // 'paragraphe' => 'required',
            'title'      => 'required',
           // 'content'    => 'required'
        ];
    }
}

