<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RecipeFormRequest;

class RecipeController extends Controller
{

    // РЕЦЕПТЫ



    public function RecipesByCategory($category)
    {
        $category = Category::findOrFail($category);
        $orderBy = request()->get('orderBy'); // Получаем параметр orderBy из запроса

        // Заготовка запроса для получения рецептов
        $recipesQuery = $category->recipes();

        // Применяем сортировку по дате создания
        if ($orderBy === 'desc') {
            $recipesQuery->orderBy('created_at', 'desc'); // Сортировка по убыванию даты
        } elseif ($orderBy === 'asc') {
            $recipesQuery->orderBy('created_at', 'asc'); // Сортировка по возрастанию даты
        }

        $recipes = $recipesQuery->paginate(3);
        $categories = Category::all();

        return view("recipes.recipes", [
            'category' => $category,
            'recipes' => $recipes,
            'categories' => $categories,
        ]);
    }


    // СТРАНИЦА РЕЦЕПТА

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        $categories = Category::all();

        // Предполагается, что ингредиенты хранятся в виде строки с разделением по символу перевода строки
        $ingredients = explode("\n", $recipe->ingredients);
        $steps = explode("\n", $recipe->steps);

        return view("recipes.show", [
            'recipe' => $recipe,
            'categories' => $categories,
            'ingredients' => $ingredients,
            'steps' => $steps,
        ]);
    }



    // ДОБАВИТЬ РЕЦЕПТ
    public function create()
    {
        $categories = Category::all();
        return view('recipes.create', [
            'categories' => $categories,
        ]);
    }

    public function store(RecipeFormRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id; // Устанавливаем user_id из текущего аутентифицированного пользователя

        // Проверяем, есть ли категория в запросе
        if ($request->has('category_id')) {
            $data['category_id'] = $request->input('category_id');
        } else {
            $data['category_id'] = 1;
        }

        if ($request->has("image")) {
            $image = str_replace("public/recipes", "", $request->file("image")->store("public/recipes"));
            $data["image"] = $image;
        }

        $recipe = Recipe::create($data);
        return redirect(route('create'));
    }





    // РЕДАКТИРОВАТЬ РЕЦЕПТ
    public function edit($id)
    {
        $categories = Category::all();
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', [
            'categories' => $categories,
            'recipe' => $recipe
        ]);
    }



    public function update(RecipeFormRequest $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $data = $request->validated();

        if ($request->has("image")) {
            $image = str_replace("public/recipes", "", $request->file("image")->store("public/recipes"));
            $data["image"] = $image;
        }

        $recipe->update($data);

        return redirect(route('profile', ['id' => $recipe->user_id]));
    }


    // ДОБАВЛЕНИЕ РЕЙТИНГА
    public function rateRecipe(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        // Получение оценки, отправленной пользователем
        $rating = $request->input('rating');

        // Добавление новой оценки к уже существующим оценкам (если они есть)
        $recipe->ratings()->create(['rating' => $rating]);

        // Пересчет среднего рейтинга на основе всех оценок рецепта
        $averageRating = $recipe->ratings()->average('rating');
        $recipe->rating = $averageRating;
        $recipe->save();

        return redirect()->back();
    }




    // УДАЛИТЬ РЕЦЕПТ
    public function destroy($id)
    {
        Recipe::destroy($id);
        return redirect(route('profile'));
    }



    // КОММЕНТАРИИ
    public function comment($id, CommentForm $request)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->comments()->create($request->validated());

        return redirect(route("show", $id));
    }
}
