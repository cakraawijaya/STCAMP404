<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class REQSTCAMP extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users|max:30',
            'password' => 'required|confirmed|min:6'
        ];
    }
}
