<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\UserFormRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //РЕДАКТИРОВАТЬ ПОЛЬЗОВАТЕЛЯ

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $categories = User::all();
        return view('admin.users.edit_user', [
            'categories' => $categories,
            'user' => $user
        ]);
    }


    public function update(UserFormRequest $request, $id)
    {
        $recipe = User::findOrFail($id);
        $data = $request->validated();

        $recipe -> update($data);
        return redirect(route('admin.recipes.index'));
    }

    //УДАЛИТЬ ПОЛЬЗОВАТЕЛЯ
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('admin.recipes.index'));
    }

}
