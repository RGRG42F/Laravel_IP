@extends('layouts.admin')

@section('title', 'Админ панель')

@section('content')

<div class="container">
    <form class="edit-recipe-form" action="{{route('admin.recipes.update', $recipe->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label">Название рецепта</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $recipe->title ?? '') }}">
        </div>
        @error('title')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="description" rows="4">{{ old('description', $recipe->description ?? '') }}</textarea>
        </div>
        @error('description')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            @if (isset($recipe) && $recipe->image)
                <img src="/storage/recipes/{{ $recipe->image }}" class="img-thumbnail" alt="{{ $recipe->image }}">
             @endif
            <label for="image" class="form-label">Изображение</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        @error('image')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <label for="servings" class="form-label">Количество порций</label>
            <input class="form-control" type="number" name="servings" id="servings" value="{{ old('servings', $recipe->servings ?? '') }}">
        </div>

        <div class="form-group">
            <label for="cook_time" class="form-label">Время готовки</label>
            <input class="form-control" type="text" name="cook_time" id="cook_time" value="{{ old('servings', $recipe->cook_time ?? '') }}">
        </div>
        @error('cook_time')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <label for="ingredients" class="form-label">Ингредиенты</label>
            <textarea class="form-control" name="ingredients" id="ingredients" rows="4">{{ old('ingredients', $recipe->ingredients ?? '') }}</textarea>
        </div>
        @error('ingredients')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <label for="steps" class="form-label">Шаги приготовления</label>
            <textarea class="form-control" name="steps" id="steps" rows="6">{{ old('steps', $recipe->steps ?? '') }}</textarea>
        </div>
        @error('steps')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <label for="category" class="form-label">Категория</label>
            <select class="form-select" name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        @error('image')
            <div class="alert alert-danger mt-1" role="alert">
                {{ $message }}
            </div>
        @enderror

        <button class="btn btn-primary" type="submit">Редактировать рецепт</button>
    </form>
</div>


@endsection
