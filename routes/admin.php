<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware("guest:admin")->group(function () {

    // ВОЙТИ
    Route::get('login', [AuthController::class, "index"])->name('login');
    Route::post('login_process', [AuthController::class, "login"])->name('login_process');
});



// // РЕЦЕПТЫ
// Route::get('/recipes/{category}', [App\Http\Controllers\Admin\RecipeController::class, 'RecipesByCategory'])->name('RecipesByCategory');



Route::middleware("auth:admin")->group(function () {

    // РЕЦЕПТЫ
    Route::resource('recipes', RecipeController::class)->except(['show']);
    Route::get('/recipes/{category}', [RecipeController::class, 'AdminRecipesByCategory'])->name('AdminRecipesByCategory');


    // НОВОСТИ
    Route::resource('news', NewsController::class);


    // РЕДАКТИРОВАТЬ РЕЦЕПТ
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('editUser');
    Route::put('users/{id}', [UserController::class, 'update'])->name('updateUser');


    // УДАЛИТЬ
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('destroyUser');


    // ВЫХОД
    Route::get('logout', [AuthController::class, "logout"])->name('logout');
});
