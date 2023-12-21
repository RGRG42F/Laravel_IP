@extends('layouts.app')

@section('title', "Страница {$recipe->title}")

@section('content')

    <div class="container">

        <div class="recipe-details">

            <div class="recipe-header">

                <h2 class="recipe-title">{{ $recipe->title }}</h2>

                <p class="recipe-description">{{ $recipe->description }}</p>

                <form action="{{ route('rateRecipe', $recipe->id) }}" method="POST">
                    @csrf
                    <input type="number" name="rating" min="1" max="5"> <!-- Позволяет пользователю выбирать оценку от 1 до 5 -->
                    <button type="submit">Оценить</button>
                </form>

                <!-- Показывает текущий рейтинг рецепта -->
                <p class="recipe-rating">Средний рейтинг: {{ $recipe->rating }}</p>

                <img class="recipe-image" src="/storage/recipes/{{ $recipe->image }}" alt="Изображение блюда">

            </div>

            <div class="recipe-ingredients">

                <div class="ingredients-info">

                    <h3 class="ingredients-title">Ингредиенты</h3>

                    <ol class="ingredients-list">
                        @foreach ($ingredients as $ingredient)
                            <li>{{ $ingredient }}</li>
                        @endforeach
                    </ol>

                </div>

                <div class="recipe-info">

                    <h4 class="info-title">Кол-во порций</h4>
                    <p class="info-portion">{{ $recipe->servings }}</p>

                    <h4 class="info-title">Время готовки</h4>
                    <p class="info-cooking-time">{{ $recipe->cook_time }} минут</p>

                </div>

            </div>

        </div>

        <div class="recipe-steps">

            <h3 class="steps-title">Пошаговое приготовление</h3>

            <ul class="steps-list">
                @foreach ($steps as $step)
                    <li>{{ $step }}</li>
                @endforeach
            </ul>
        </div>

        <div class="line"></div>

        <div class="recipe-comment">

            <h3 class="comment-title">Комментарии</h3>

            <form class="comment-form" action="{{ route('comment', $recipe->id) }}" method="POST">
                @csrf

                <textarea class="comment-textarea custom-textarea" name="text" id="comment" cols="50" rows="10"></textarea>
                @error('text')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <input type="submit" value="Опубликовать комментарий" class="comment-submit-btn">
            </form>


            @foreach ($recipe->comments as $comment)
                <div class="users-recipe-comment">

                    <div class="user-recipe-comment">

                        <a class="content-image-link" href="#">
                            <div class="content-author">
                                <img class="user-icon" src="/storage/users/{{  $comment->user->images }}" alt="Author-1">
                                <p>{{ $comment->user->name }}</p>
                            </div>
                            <p>{{ $comment->text }}</p>
                        </a>
                        <p>
                            {{$comment->created_at}}
                        </p>

                    </div>

                </div>
            @endforeach

        </div>


    </div>

@endsection
