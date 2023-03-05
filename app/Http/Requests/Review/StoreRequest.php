<?php

namespace App\Http\Requests\Review;

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
            'title' => 'required|string|max:100',
            'text' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'image' => 'nullable|file',
            'city_id' => 'required|integer|exists:cities,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'В заголовке должны быть только буквы и цифры',
            'title.required' => 'Это поле необходимо для заполнения',
            'text.required' => 'Это поле необходимо для заполнения',
            'rating.integer' => 'Это может содержать только цифры',
            'rating.required' => 'Это поле необходимо для заполнения',
            'rating.between' => 'Оцените по 5 бальной шкале от 1 до 5',
        ];
    }
}
