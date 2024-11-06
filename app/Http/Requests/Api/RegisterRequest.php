<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ApiRequest
{
    // Правило авторизации
    public function authorize(): bool
    {
        return true;
    }

    //Правило валидации данных
    public function rules(): array
    {
        return [
            'surname' => 'required|string|min:2|max:32',
            'name' => 'required|string|min:2|max:32',
            'patronymic' => 'nullable|string|min:2|max:32',
            'sex' => 'required|boolean',
            'birthday' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:255',
            'nickname' => 'required|string|min:2|max:32|unique:users',
            'avatar' => 'nullable|mimes:jpeg,png,jpg,svg|max:4096',
            'phone' => 'nullable|string|min:10|max:16|unique:users'
        ];
    }

    // Кастомные сообщения об ошибках валидации
    public function messages(): array
    {
        return [
            'surname.required' => 'Поле Фамилия обязательно для заполнения',
            'name.required' => 'Поле Имя обязательно для заполнения',
            'sex.required' => 'Поле Пол обязательно для заполнения',
            'birthday.required' => 'Поле Дата рождения обязательно для заполнения',
            'email.required' => 'Поле Почта обязательно для заполнения',
            'password.required' => 'Поле Пароль обязательно для заполнения',
            'nickname.required' => 'Поле Никнейм обязательно для заполнения',

            'surname.min' => 'Поле Фамилия должно содержать минимум 2 символа',
            'surname.max' => 'Поле Фамилия должно содержать максимум 32 символа',
            'name.min' => 'Поле Имя должно содержать минимум 2 символа',
            'name.max' => 'Поле Имя должно содержать максимум 32 символа',
            'patronymic.min' => 'Поле Отчество должно содержать минимум 2 символа',
            'patronymic.max' => 'Поле Отчество должно содержать максимум 32 символа',
            'password.min' => 'Поле Пароль должно содержать минимум 2 символа',
            'password.max' => 'Поле ОПароль должно содержать максимум 32 символа',
            'nickname.min' => 'Поле Никнейм должно содержать минимум 2 символа',
            'nickname.max' => 'Поле Никнейм должно содержать максимум 32 символа',
            'phone.min' => 'Поле Телефон должно содержать минимум 2 символа',
            'phone.max' => 'Поле Телефон должно содержать максимум 32 символа',
            'avatar.max' => 'Поле Аватар должно содержать максимум 32 символа',
            'email.max' => 'Поле Почта должно содержать максимум 32 символа',
            'sex.boolean' => 'Поле Пол должно содержать значение 0 или 1',
            'birthday.date' => 'Дата рождения должна быть в формате YYYY-MM-DD',
            'email.email' => 'Поле почта должно быть в почтовом формате',
            'email.unique' => 'Данная почта уже используется',
            'nickname.unique' => 'Данный никнейм уже используется',
            'avatar.mimes' => 'Файл должен быть формата jpeg, png, jpg, svg',
            'phone.unique' => 'Данный номер телефона уже используется'
        ];
    }
}
