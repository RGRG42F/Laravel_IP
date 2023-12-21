@extends('layouts.admin')

@section('title', 'Редактировать новость')

@section('content')

    <div class="container mt-4">
        <h2>Редактирование новости</h2>

        <form action="{{route('admin.news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Введите заголовок новости" value="{{ old('title', $news->title ?? '')}}">
                @error('title')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="editDescription">Описание</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Введите описание новости">{{ old('description', $news->description ?? '') }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                @if (isset($news) && $news->images)
                    <img src="/storage/news/{{ $news->images }}" class="img-thumbnail" alt="{{ $news->images }}">
                @endif
                <label for="editImage">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>

@endsection
