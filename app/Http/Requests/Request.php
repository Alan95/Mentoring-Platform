<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
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
        $userId = Auth::id();

        return [
            'username' => 'required|unique:users,username,'.$userId,
            'email' => 'required|email|unique:users,email,'.$userId,
            'password' => 'confirmed',
            'firstname' => 'required|unique:users,first_name,'.$userId,
            'lastname' => 'required|unique:users,last_name,'.$userId,
            'programming_languages' => 'required, programming_languages,'.$userId,
            'speaking_languages' => 'required, speaking_languages,'.$userId,
        ];
    }
}
