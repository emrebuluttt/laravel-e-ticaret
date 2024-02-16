<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'name' => 'required|max:50',
            'price' => 'required|max:4',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Kitabın adı zorunludur',
            'price.required' => 'Kitabın fiyatı zorunludur',
            'name.max' => 'Kitabın adı 50 karakterden fazla olamaz',
            'price.max' => 'Kitabın fiyatı 4 karakterden fazla olamaz',
        ];
    }
}
