<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100);
            $table->unsignedBigInteger('user_id'); // Внешний ключ
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Если пользователь удаляется, удалить и связанные рассылки
        });
    }

    public function down()
    {
        Schema::table('newsletters', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('newsletters');
    }
};
