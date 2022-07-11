<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    // Validate kuralları
    public function rules()
    {
        // form içerisindeki name göre validate edildi
        return [
            'email' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:20'
        ];
    }

    public function messages()
    {
        //TODO: validate mesajları default olarak lang/en içerisinden gönderilir
        return [
            'email.required' => 'Lütfen email adresinizi girin',
            'email.min' => 'Minimum email alanı için 3 karakter girmelisiniz.',
            'email.max' => 'Maksimum email alanı için 20 karakter girmelisiniz.',
            'password.required' => 'Lütfen parola girin',
            'password.min' => 'Minimum parola alanı için 3 karakter girmelisiniz.',
            'password.max' => 'Maksimum parola alanı için 20 karakter girmelisiniz.'
        ];
    }
}
