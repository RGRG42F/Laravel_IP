@extends('layouts.app')

@section('title', 'Профиль')

@section('content')

    <div class="container">

        <div class="profile-container">

            <div class="profile-details">

                <h2 class="profile-title">Профиль</h2>

                <img src="/storage/users/{{ $user->images }}" alt="AVATARKA" class="profile-image">

            </div>

            <div class="profile-info">

                <p class="info-item">{{ $user->name }}</p>

                <p class="info-item">{{ $user->email }}</p>

                <a href="{{ route('editProfile') }}" class="edit-link">
                    <button class="edit-button">
                        Редактировать
                    </button>
                </a>

            </div>

        </div>


        <div class="user-item">

            <!-- Кнопки "Мои рецепты" и "Мои комментарии" -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#recipesModal">
                Мои рецепты
            </button>

            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#commentsModal">
                Мои комментарии
            </button>

            <!-- Модальное окно для "Моих рецептов" -->
            <div class="modal fade" id="recipesModal" tabindex="-1" aria-labelledby="recipesModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="recipesModalLabel">Мои рецепты</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                            @if ($recipes && count($recipes) > 0)
                                @foreach ($recipes as $recipe)
                                    <div class="d-flex align-items-center mb-3">

                                        <img src="/storage/recipes/{{ $recipe->image }}" alt="{{ $recipe->title }}" class="me-3" style="max-width: 100px; height: auto;">

                                        <div class="flex-grow-1">
                                            <h5>{{ $recipe->title }}</h5>

                                            <div class="btn-group" role="group" aria-label="Recipe Actions">

                                                <form action="{{route('destroy', $recipe->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>

                                                <a href="{{ route('edit', $recipe->id) }}">
                                                    <button type="button" class="btn btn-primary">Изменить</button>
                                                </a>


                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Нет рецептов для отображения</p>
                            @endif

                        </div>



                    </div>
                </div>
            </div>

            <!-- Модальное окно для "Моих комментариев" -->
            <div class="modal fade" id="commentsModal" tabindex="-1" aria-labelledby="commentsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="commentsModalLabel">Мои комментарии</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            @if ($comments && count($comments) > 0)
                                @foreach ($comments as $comment)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <!-- Название рецепта, к которому относится комментарий -->
                                            <h4 class="card-title">{{ $comment->recipe->title }}</h4>

                                            <!-- Содержание комментария -->
                                            <p class="card-text">{{ $comment->text }}</p>

                                            <!-- Другие детали комментария, например, информация о пользователе, дата добавления и т. д. -->
                                            <p class="card-text">Добавлено: {{ $comment->created_at->format('d.m.Y H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Нет комментариев для отображения</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
