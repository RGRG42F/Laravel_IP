@extends('layouts.admin')

@section('title', 'Новости')

@section('content')

    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">
        Добавить
    </a>

    <div class="row">
        @foreach ($news_data as $news_item)
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card">
                        <img src="/storage/news/{{ $news_item->images }}" class="card-img-top" alt="{{ $news_item->images }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $news_item->title }}</h5>
                            <p class="card-text">{{ $news_item->description }}</p>
                            <div class="d-flex justify-content-between">
                                <form action="{{route('admin.news.destroy', $news_item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Удалить</button>
                                </form>
                                <a href="{{route('admin.news.edit', $news_item->id)}}">
                                    <button class="btn btn-danger">Изменить</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endsection
