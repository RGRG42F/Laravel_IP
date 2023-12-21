@extends('layouts.app')

@section('title', 'Рецепты')

@section('content')

    <div class="container">

        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-md-auto">
                <!-- Кнопка для вызова модального окна -->
                <button type="button" class="btn btn-warning style-btn" data-bs-toggle="modal" data-bs-target="#filterModal">
                    Фильтр
                </button>
            </div>
            <div class="col-md-auto">
                <div class="btn-group" role="group" aria-label="Sort recipes">
                    <a href="{{ url()->current() }}?orderBy=asc" class="btn btn-secondary">По возрастанию</a>
                    <a href="{{ url()->current() }}?orderBy=desc" class="btn btn-secondary">По убыванию</a>
                </div>
            </div>
        </div>


        <!-- Модальное окно -->
        <div class="modal fade style-modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Фильтр рецептов</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form class="filter-form" action="#" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="recipe-name" class="form-label">Название рецепта</label>
                                <input type="text" class="form-control" id="recipe-name" name="recipe-name">
                            </div>

                            <div class="mb-3">
                                <label for="cook-time" class="form-label">Время приготовления</label>
                                <input type="text" class="form-control" id="cook-time" name="cook-time">
                            </div>

                            <div class="mb-3">
                                <label for="desired-ingredients" class="form-label">Желаемые ингредиенты</label>
                                <input type="text" class="form-control" id="desired-ingredients"
                                    name="desired-ingredients">
                            </div>

                            <div class="mb-3">
                                <label for="exclude-ingredients" class="form-label">Исключить ингредиенты</label>
                                <input type="text" class="form-control" id="exclude-ingredients"
                                    name="exclude-ingredients">
                            </div>

                            <button type="submit" class="btn btn-warning">Применить</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>


        @if ($recipes->count() > 0)
            <div class="cards-block">

                @foreach ($recipes as $recipe)
                    <div class="card" style="width: 18rem;">

                        <a href="{{ route('show', $recipe->id) }}" class="card-link">

                            <img src="/storage/recipes/{{ $recipe->image }}" class="card-img-top" alt="...">

                            <div class="block-comment-star">

                                <div class="star-rating-block">
                                    <img src="/images/main/Star.svg" alt="Star">
                                    <p>{{ $recipe->rating }}</p>
                                </div>

                                <div class="comment-count-block">
                                    <img src="/images/main/Comment.svg" alt="Comment">
                                    <p>5</p>
                                </div>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">{{ $recipe->title }}</h5>
                                <p class="card-text">
                                    {{ $recipe->description }}
                                </p>
                                <p class="card-text">
                                    {{-- {{$recipe->user_id}} --}}
                                    Автор:{{ $recipe->user->name }}
                                </p>
                            </div>

                        </a>

                    </div>
                @endforeach

            </div>

            <div class="pagination justify-content-center mt-4">
                {{ $recipes->links() }}
            </div>
        @else
            <p>Нет рецептов для отображения в этой категории.</p>
        @endif
    </div>

    <x-mailing />

@endsection
