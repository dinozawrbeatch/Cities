<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'second_name' => 'required|string',
            'middle_name' => 'required|string',
            'phone' => 'required|digits:11|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'В имени должны быть только буквы и цифры',
            'name.required' => 'Это поле необходимо для заполнения',
            'second_name.string' => 'В имени должны быть только буквы и цифры',
            'second_name.required' => 'Это поле необходимо для заполнения',
            'middle_name.string' => 'В имени должны быть только буквы и цифры',
            'middle_name.required' => 'Это поле необходимо для заполнения',
            'phone.required' => 'Это поле необходимо для заполнения',
            'phone.unique' => 'Этот номер уже зарегистрирован',
            'phone.digits' => 'Номер телефона должен быть 11 цифр в формате 89ХХХХХХХХХ',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.email' => 'Некорректный формат email',
            'email.unique' => 'Такой email уже зарегистрирован',
            'password.required' => 'Это поле необходимо для заполнения',
            'password.string' => 'Пароль должен быть строкой',
        ];
    }
}
