@extends('layouts.admin')

@section('title', 'Админ панель')

@section('content')

    <div class="container mt-4">
        <h2>Таблица пользователей</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Имя пользователя</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            @foreach ($users as $user_item)
                <tbody>
                    <tr>
                        <th scope="row">{{ $user_item->id }}</th>
                        <td>{{ $user_item->name }}</td>
                        <td>{{ $user_item->created_at }}</td>
                        <td>
                            <form action="{{route('admin.destroyUser', $user_item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                            <a href="{{route('admin.editUser', $user_item->id)}}">
                                <button class="btn btn-primary">Изменить</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>


@endsection
