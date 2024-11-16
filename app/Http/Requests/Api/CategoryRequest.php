<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:64'
        ];
    }
    public function messages(): array {
        return [
            'name.required' => 'Название категории не должно быть пустым',
            'name.max' => 'Название категории не должно превышать 64 символа',
        ];
    }
}
