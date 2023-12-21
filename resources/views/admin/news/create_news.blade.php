@extends('layouts.admin')

@section('title', 'Добавить новость')

@section('content')

    <div class="container mt-4">
        <h2>Добавление новости</h2>
        <form action="{{route('admin.news.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Введите заголовок новости">
                @error('title')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Введите описание новости"></textarea>
                @error('description')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Добавить новость</button>

        </form>
    </div>

@endsection
