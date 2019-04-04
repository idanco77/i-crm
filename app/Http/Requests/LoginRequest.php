<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class LoginRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'userName' => 'required|min:2|max:70',
            'password' => 'required|min:6|max:70',
        ];
    }

    public function messages() {
        return [
            'userName.required' => 'Invalid user name',
            'userName.min' => 'User name must contains atleast 2 chars',
            'userName.max' => 'User name must contains max 70 chars',
            'password.required' => 'Invalid password',
            'password.min' => 'Password must contains atleast 6 chars',
            'password.max' => 'Password must contains max 70 chars',
            
        ];
    }

}
