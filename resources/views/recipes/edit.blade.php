@extends('layouts.app')

@section('title', 'Редактирование рецепта')

@section('content')

    <div class="form-container">

        {{-- <form enctype="multipart/form-data" class="edit-recipe-form" action="{{ route("update", $recipe->id) }}" method="POST"> --}}
        <form enctype="multipart/form-data" class="edit-recipe-form" action="{{ route('update', $recipe->id) }}" method="POST">
            <!-- Форма... -->
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="input-label">Название рецепта</label>
                <input class="input-field" type="text" name="title" id="title" value="{{ old('title', $recipe->title ?? '') }}">
            </div>
            @error('title')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror


            <div class="form-group">
                <label for="description" class="input-label">Описание</label>
                <textarea class="input-field" name="description" id="description" rows="4">{{ old('description', $recipe->description ?? '') }}</textarea>
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
                <input class="input-field" type="number" name="servings" id="servings"
                    value="{{ old('servings', $recipe->servings ?? '') }}">
            </div>
            @error('servings')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="cook_time" class="input-label">Время готовки</label>
                <input class="input-field" type="text" name="cook_time" id="cook_time"
                    value="{{ old('cook_time', $recipe->cook_time ?? '') }}">
            </div>
            @error('cook_time')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="ingredients" class="input-label">Ингредиенты</label>
                <textarea class="input-field" name="ingredients" id="ingredients" rows="4">{{ old('ingredients', $recipe->ingredients ?? '') }}</textarea>
            </div>
            @error('ingredients')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label for="steps" class="input-label">Шаги приготовления</label>
                <textarea class="input-field" name="steps" id="steps" rows="6">{{ old('steps', $recipe->steps ?? '') }}</textarea>
            </div>
            @error('steps')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror


            <div class="form-group">
                <label for="category_id" class="input-label">Категория</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <input class="submit-btn" type="submit" value="Редактировать рецепт">
        </form>

    </div>

@endsection
