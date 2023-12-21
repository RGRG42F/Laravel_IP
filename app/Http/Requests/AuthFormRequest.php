<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthFormRequest extends FormRequest
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
            "name" => ["required", "max:30"],
            "email" => ["required", "email", "string", "unique:users"],
            "password" => ["required", "confirmed"],
            "profile_picture" => ["image"],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя пользователя" обязательно для заполнения.',
            'name.max' => 'Имя пользователя не должно превышать 30 символов.',
            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.unique' => 'Этот адрес электронной почты уже занят.',
            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.confirmed' => 'Пароли не совпадают.',
            'profile_picture.image' => 'Фотография профиля должна быть изображением.',
        ];
    }
}
