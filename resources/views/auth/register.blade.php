@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')

    <div class="form-container">

        <form class="log-reg-form" action="{{route('register_process')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name" class="input-label">Имя</label>
                <input class="input-field" type="text" name="name" id="name">
            </div>
            @error('name')
                <div class="alert alert-danger mt-1" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="form-group">
                <label for="email" class="input-label">Email</label>
                <input class="input-field" type="email" name="email" id="email">
            </div>
            @error('email')
                <div class="alert alert-danger mt-1" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="form-group">
                <label for="profile_picture" class="input-label">Аватарка</label>
                <input class="input-field" type="file" name="profile_picture" id="profile_picture">
            </div>
            @error('profile_picture')
                <div class="alert alert-danger mt-1" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="form-group">
                <label for="password" class="input-label">Пароль</label>
                <input class="input-field" type="password" name="password" id="password">
            </div>
            @error('password')
                <div class="alert alert-danger mt-1" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="form-group">
                <label for="password_confirmation" class="input-label">Повторите пароль</label>
                <input class="input-field" type="password" name="password_confirmation" id="password_confirmation">
            </div>
            @error('password_confirmation')
                <div class="alert alert-danger mt-1" role="alert">
                    {{$message}}
                </div>
            @enderror

            <input class="submit-btn" type="submit" value="Зарегистрироваться">
            <p>
                Уже есть аккаунт? <a href="{{route('login')}}">Войти</a>
            </p>
        </form>

    </div>

@endsection
