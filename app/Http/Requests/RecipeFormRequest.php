<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return auth("web")->check();
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
            "servings" => ["required", "max:30"],
            "cook_time" => ["required", "max:50"],
            "ingredients" => ["required"],
            "steps" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'image.image' => 'Файл изображения должен быть файлом изображения.',
            'servings.required' => 'Поле "Порций" обязательно для заполнения.',
            'servings.max' => 'Поле "Порций" не должно превышать 30 символов.',
            'cook_time.required' => 'Поле "Время приготовления" обязательно для заполнения.',
            'cook_time.max' => 'Поле "Время приготовления" не должно превышать 50 символов.',
            'ingredients.required' => 'Поле "Ингредиенты" обязательно для заполнения.',
            'steps.required' => 'Поле "Шаги" обязательно для заполнения.',
        ];
    }
}
