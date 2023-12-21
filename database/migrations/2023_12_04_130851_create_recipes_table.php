<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Название рецепта
            $table->text('description')->nullable(); // Короткое описание
            $table->integer('rating')->default(0); // Рейтинг
            $table->integer('servings')->unsigned()->nullable(); // Количество порций
            $table->integer('cook_time')->unsigned()->nullable(); // Время готовки в минутах
            $table->text('ingredients')->nullable(); // Ингредиенты
            $table->text('steps')->nullable(); // Шаги приготовления
            $table->unsignedBigInteger('user_id'); // Внешний ключ для связи с таблицей users
            $table->unsignedBigInteger('category_id'); // Внешний ключ для связи с таблицей categories
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('recipes');
    }
};
