<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Recipe;

class IndexController extends Controller
{


    // public function index(){
    //     $categories = Category::all();
    //     $news = News::all();
    //     return view('index',[
    //         "categories" => $categories,
    //         "news" => $news,
    //     ]);
    // }

    public function index()
    {
        $categories = Category::all();
        $randomNews = News::inRandomOrder()->limit(2)->get(); // Получение двух случайных новостей
        $randomRecipes = Recipe::inRandomOrder()->limit(3)->get();
        return view('index', [
            "categories" => $categories,
            "randomNews" => $randomNews,
            "randomRecipes" => $randomRecipes,
        ]);
    }


}
