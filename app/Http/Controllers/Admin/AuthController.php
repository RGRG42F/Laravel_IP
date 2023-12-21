<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ВОЙТИ
    public function index()
    {
        $categories = Category::all();
        return view('admin.auth.login', [
            'categories' => $categories,
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],
        ], [
            "email.required" => "Поле обязательного заполнения",
            "password.required" => "Поле обязательного заполнения",
        ]);

        if (auth("admin")->attempt($data)) {
            return redirect(route('admin.recipes.index'));
        }

        return redirect(route('admin.login'))->withErrors(["password" => "Пользователь не найлен, либо данные введены не верно"]);
    }

    // ВЫЙТИ
    public function logout()
    {
        auth("admin")->logout();
        return redirect(route('index'));
    }
}
