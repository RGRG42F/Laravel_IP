@extends('layouts.admin')

@section('content')
    @if ($recipes->count() > 0)
        <div class="cards-block">

            @foreach ($recipes as $recipe)
                <div class="card" style="width: 18rem;">

                    <a href="#" class="card-link">

                        <img src="/storage/recipes/{{ $recipe->image }}" class="card-img-top" alt="{{$recipe->image}}">

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
                                Автор:{{ $recipe->user->name }}
                            </p>
                        </div>

                    </a>

                    <div class="d-flex justify-content-between">
                        <form action="{{ route('admin.recipes.destroy', $recipe->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Удалить</button>
                        </form>
                        <a href="{{ route('admin.recipes.edit', $recipe->id) }}">
                            <button class="btn btn-danger">Изменить</button>
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

        <div class="pagination justify-content-center mt-4">
            {{ $recipes->links() }}
        </div>
    @else
        <p>Нет рецептов для отображения в этой категории.</p>
    @endif
@endsection
