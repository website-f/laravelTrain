<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'card' => 'unique:students|max:10',
            'name' => 'max:50',
        ];
    }

    public function attributes()
    {
        return [
            'card' => 'ID Card',
        ];
    }

    public function messages()
    {
        return [
            'card.unique' => 'ID Card has been taken',
        ];
    }
}
