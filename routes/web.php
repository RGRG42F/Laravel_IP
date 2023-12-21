<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RecipeController;
use GuzzleHttp\Promise\Create;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ГЛАВНАЯ
Route::get('/', [IndexController::class, 'index'])->name('index');



// РЕЦЕПТЫ
Route::get('/recipes/{category}', [RecipeController::class, 'RecipesByCategory'])->name('RecipesByCategory');



// СТРАНИЦА РЕЦЕПТА
Route::get('/show/{id}', [RecipeController::class, 'show'])->name('show');


// СТРАНИЦА НОВОСТИ
Route::get('/news/{id}', [RecipeController::class, 'show'])->name('news');






// ДЛЯ АВТОРИЗОВАННЫХ ПОЛЬЗОВАТЕЛЕЙ
Route::middleware("auth")->group(function () {

    // ВЫХОД
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



    // КОММЕНТАРИИ
    Route::post('/recipes/comment/{id}', [RecipeController::class, 'comment'])->name('comment');



    // ДОБАВИТЬ РЕЦЕПТ
    Route::get('/add_recipe', [RecipeController::class, 'create'])->name('create');
    Route::post('/store', [RecipeController::class, 'store'])->name('store');



    // РЕДАКТИРОВАТЬ РЕЦЕПТ
    Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('edit');
    Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('update');



    // СОЗДАНИЕ РАССЫЛКИ
    Route::post('/storeNewslatter', [NewsletterController::class, 'storeNewslatter'])->name('storeNewslatter');



    // УДАЛИТЬ
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('destroy');



    // ПРОФИЛЬ
    Route::get('/user_profile/{id}', [AuthController::class, 'profile'])->name('profile');


    // РЕДАКТИРОВАТЬ ПРОФИЛЬ
    Route::get('/edit_profile', [AuthController::class, 'editProfile'])->name('editProfile');
    // Route::put('/update_profile', [AuthController::class, 'updateUserProfile'])->name('updateProfile');

    //ДОБАВЛЕНИЕ РЕЙТИНГА
    Route::post('/recipes/{id}/rate', [RecipeController::class, 'rateRecipe'])->name('rateRecipe');


});





// ДЛЯ НЕ АВТОРИЗОВАННЫХ ПОЛЬЗОВАТЕЛЕЙ
Route::middleware("guest")->group(function () {

    // РЕГИСТРАЦИЯ
    Route::get('/register', [AuthController::class, 'ShowRegisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');



    // ВХОД
    Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');
});





// // АДМИН РЕЦЕПТЫ
// Route::get('/admin/recipes', function () {
//     return view('admin.recipe.recipes');
// });

// // АДМИН СТРАНИЦА РЕЦЕПТА
// Route::get('/admin/page_recipe', function () {
//     return view('admin.recipe.page_recipe');
// });

// // АДМИН ПАНЕЛЬ
// Route::get('/admin/admin_panel', function () {
//     return view('admin.admin_panel');
// });



// // РЕДАКТИРОВАТЬ ПРОФИЛЬ
// Route::get('/edit_profile', function () {
//     return view('profile.edit_profile');
// });
