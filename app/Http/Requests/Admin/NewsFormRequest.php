<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("admin")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => ["required"],
            "description" => ["required"],
            "image" => ["image"],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'image.image' => 'Файл должен быть изображением.',
        ];
    }
}
