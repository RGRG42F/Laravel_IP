<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RecipeFormRequest;
use App\Models\User;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.recipes.index',[
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    public function AdminRecipesByCategory($category)
    {
        $category = Category::findOrFail($category);
        $recipes = $category->recipes()->paginate(3);
        $categories = Category::all();

        return view("admin.recipes.recipes", [
            'category' => $category,
            'recipes' => $recipes,
            'categories' => $categories,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        // return view('admin.recipes.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ $request
     * @return \Illuminate\Http\Response
     */



    public function store(RecipeFormRequest $request)
    {
        // $recipe = Recipe::create($request->validated());
        // return redirect("admin.recipes.index");
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        $categories = Category::all();
        return view('admin.recipes.edit', [
            'categories' => $categories,
            'recipe' => $recipe
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function update(RecipeFormRequest $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $data = $request->validated();

        if($request->has("image")){
            $image = str_replace("public/recipes", "", $request->file("image")->store("public/recipes"));
            $data["image"] = $image;
        }

        $recipe -> update($data);
        return redirect(route('admin.recipes.index'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {
        Recipe::destroy($id);
        return redirect(route('admin.recipes.index'));
    }


}
