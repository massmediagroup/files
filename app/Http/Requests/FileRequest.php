<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'delete_after' => 'date|after:now'
        ];
    }

    public function messages()
    {
        return [
            'image' => 'Має бути картинка',
            'max' => 'Максимальний розмір поля 5мб',
            'after' => 'Дата маю бути після сьогодньої дати'
        ];
    }
}
