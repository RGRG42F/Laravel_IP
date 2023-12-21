@extends('layouts.app')

@section('title', 'Добавление рецепта')

@section('content')

    <div class="form-container">

        <form enctype="multipart/form-data" class="add-recipe-form" action="{{route('store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title" class="input-label">Название рецепта</label>
                <input class="input-field" type="text" name="title" id="title">
            </div>
            @error('title')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="description" class="input-label">Описание</label>
                <textarea class="input-field" name="description" id="description" rows="4"></textarea>
            </div>
            @error('description')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <img src="..." class="img-thumbnail" alt="...">
                <label for="image" class="input-label">Изображение</label>
                <input class="input-field" type="file" name="image" id="image">
            </div>
            @error('image')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="servings" class="input-label">Кол-во порций</label>
                <input class="input-field" type="number" name="servings" id="servings">
            </div>
            @error('servings')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="cook_time" class="input-label">Время готовки</label>
                <input class="input-field" type="text" name="cook_time" id="cook_time">
            </div>
            @error('cook_time')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="ingredients" class="input-label">Ингредиенты</label>
                <textarea class="input-field" name="ingredients" id="ingredients" rows="4"></textarea>
            </div>
            @error('ingredients')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="steps" class="input-label">Шаги приготовлению</label>
                <textarea class="input-field" name="steps" id="steps" rows="6"></textarea>
            </div>
            @error('steps')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="category_id" class="input-label">Категория</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <input class="submit-btn" type="submit" value="Добавить рецепт">
        </form>

    </div>

@endsection
