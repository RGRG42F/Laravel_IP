@extends('layouts.admin')

@section('title', 'Админ панель')

@section('content')

    <div class="container">
        <form class="edit-user-form" action="{{ route('admin.updateUser', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="form-label">Имя пользователя</label>
                <input class="form-control" type="text" name="name" id="name"
                    value="{{ old('name', $user->name ?? '') }}">
            </div>
            @error('name')
                <div class="alert alert-danger mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <button class="btn btn-primary" type="submit">Редактировать пользователя</button>
        </form>
    </div>


@endsection
