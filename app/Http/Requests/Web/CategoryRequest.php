<?php

namespace App\Http\Requests\Web;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'min:1|max:64'
        ];
    }
    public function messages(): array {
        return [
          'name.min' => 'Название категории не должно быть пустым',
          'name.max' => 'Название категории не должно превышать 64 символа',
        ];
    }
}
