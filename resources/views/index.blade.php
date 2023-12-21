@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    <div class="featured-content">

        <h2 class="content-title">Самое актуальное</h2>

        <div class="content-group-image">

            @foreach ($randomNews as $news_item)
                <div class="news">

                    <a class="content-image-link" href="#">
                        <img src="/storage/news/{{ $news_item->images }}" alt="{{$news_item->images}}">
                        <h3>
                            {{$news_item->title}}
                        </h3>
                    </a>

                </div>
            @endforeach

        </div>

    </div>

    <div class="featured-content">

        <h2 class="content-title">Рецепты наших авторов</h2>

        <div class="content-author-group">

            @foreach ($randomRecipes as $randomRecipes_item)
                <div class="image-container">

                    <a class="image-link" href="#">

                        <div>
                            <img class="content-image" src="/storage/recipes/{{ $randomRecipes_item->image }}" alt="Images-3">
                            <h5>{{$randomRecipes_item->title}}</h5>
                        </div>

                        <div class="author-info">
                            <img class="avatar"  src="/storage/users/{{ $randomRecipes_item->user->images}}" alt="Author-1">
                            <p>{{$randomRecipes_item->user->name}}</p>
                        </div>

                    </a>

                </div>
            @endforeach

        </div>

        <div class="line"></div>

    </div>

    <x-mailing/>

@endsection
