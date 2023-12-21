<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function storeNewslatter(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email"]
        ],[
            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.email' => 'Введите корректный адрес электронной почты.',
        ]);

        $email = Newsletter::where('email', $data['email'])->first();
        if($email)
        {
            return back()->with('success', 'Вы уже подписаны на рассылку');
        }

        $data['user_id'] = auth()->user()->id; // Устанавливаем user_id из текущего аутентифицированного пользователя

        $newsletter = new Newsletter;
        $newsletter->email = $data['email'];
        $newsletter->user_id = $data['user_id'];
        $newsletter->save();

        return back()->with('success', 'Спасибо за подписку!');

    }
}
