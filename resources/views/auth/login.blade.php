@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

    <div class="form-container">

        <form class="log-reg-form" action="{{ route('login_process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email" class="input-label">Email</label>
                <input class="input-field" type="email" name="email" id="email">
            </div>
            @error('email')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="password" class="input-label">Пароль</label>
                <input class="input-field" type="password" name="password" id="password">
            </div>
            @error('password')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <input class="submit-btn" type="submit" value="Войти">
            <p>
                Ещё нет аккаунта? <a href="{{route('register')}}">Зарегистрироваться</a>
            </p>
        </form>

    </div>

@endsection
