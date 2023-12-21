@extends('layouts.app')

@section('title', 'Редактировать профиль')

@section('content')

    <div class="form-container">

        <form class="edit-recipe-form" action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="input-label">Имя</label>
                <input class="input-field" type="text" name="name" id="name">
            </div>
            @error('name')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

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
                @if (isset($user) && $user->images)
                    <img src="/storage/users/{{ $user->images }}" class="img-thumbnail" alt="{{ $user->images }}">
                @endif
                <label for="image" class="input-label">Изображение</label>
                <input class="input-field" type="file" name="image" id="image">
            </div>
            @error('images')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            {{-- <div class="form-group">
                <label for="password_repeat" class="input-label">Введите старый пароль</label>
                <input class="input-field" type="password" name="password_repeat" id="password_repeat">
            </div>
            @error('password_repeat')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror --}}

            <div class="form-group">
                <label for="password" class="input-label">Пароль</label>
                <input class="input-field" type="password" name="password" id="password">
            </div>
            @error('password')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror


            <input class="submit-btn" type="submit" value="Редактировать">
        </form>

    </div>

@endsection
