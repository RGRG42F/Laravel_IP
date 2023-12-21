<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\AuthFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // РЕГИСТРАЦИЯ
    public function ShowRegisterForm()
    {
        $categories = Category::all();
        return view('auth.register', [
            'categories' => $categories,
        ]);
    }

    public function register(AuthFormRequest $request)
    {
        $data = $request->validated();

        if ($request->has("profile_picture")) {
            $image = str_replace("public/users", "", $request->file("profile_picture")->store("public/users"));
            $data["images"] = $image;
        }

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if ($user) {
            auth("web")->login($user);
        }

        return redirect(route('index'));
    }



    // ВОЙТИ
    public function ShowLoginForm()
    {
        $categories = Category::all();
        return view('auth.login', [
            'categories' => $categories,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],
        ], [
            "email.required" => "Поле обязательно для заполнения",
            "password.required" => "Поле обязательно для заполнения",
        ]);

        $credentials = $request->only('email', 'password');

        if (auth("web")->attempt($credentials)) {
            return redirect(route('index'));
        }

        return redirect(route('login'))->withErrors(["password" => "Пользователь не найден, либо данные введены неверно"]);
    }




    // ВЫЙТИ
    public function logout()
    {
        auth("web")->logout();
        return redirect(route('index'));
    }



    // ПРОФИЛЬ


    public function profile()
    {
        $user = Auth::user(); // Получение текущего аутентифицированного пользователя
        $recipes = $user->recipes; // Получение рецептов пользователя
        $comments = $user->comments; // Получение комментариев пользователя
        $categories = Category::all();

        return view('profile.show', [
            'user' => $user,
            'recipes' => $recipes,
            'comments' => $comments,
            'categories' => $categories,
        ]);
    }



    // РЕДАКТИРОВАТЬ ПРОФИЛЬ
    public function editProfile()
    {
        $categories = Category::all();
        return view('profile.edit', [
            'categories' => $categories,
        ]);
    }

    // public function updateUserProfile(Request $request)
    // {
    //     $user = Auth::user();

    //     $validatedData = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
    //         'image' => ['image', 'max:2048'], // Проверка на изображение, максимальный размер 2MB
    //         'password' => ['nullable', 'string', 'min:8', 'confirmed'], // Если требуется обновление пароля
    //     ]);

    //     // Обновление имени и email
    //     $user->name = $validatedData['name'];
    //     $user->email = $validatedData['email'];

    //     // Если пользователь загружает новое изображение
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('public/users');
    //         $user->images = str_replace('public/', '', $imagePath);
    //     }

    //     // Если требуется обновление пароля
    //     if ($request->filled('password')) {
    //         $user->password = Hash::make($validatedData['password']);
    //     }

    //     // Сохранение обновленных данных пользователя
    //     $user->save();

    //     return redirect()->route('profile', ['id' => $user->id])->with('success', 'Профиль успешно обновлен');
    // }

}
