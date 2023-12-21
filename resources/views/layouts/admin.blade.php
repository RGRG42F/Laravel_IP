<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow admin-panel">

        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">ВкусНЯ</a>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="{{ route('admin.logout') }}">Выйти</a>
            </div>
        </div>

    </header>

    <section class="admin-panel-content">

        <div class="container-fluid">

            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">

                            @foreach ($categories as $category_item)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.AdminRecipesByCategory', ['category' => $category_item->id])}}">
                                        <span data-feather="file"></span>
                                        {{$category_item->title}}
                                    </a>
                                </li>
                            @endforeach


                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('admin.recipes.index')}}">
                                    <span data-feather="home"></span>
                                    Пользователи
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('admin.news.index') }}">
                                    <span data-feather="home"></span>
                                    Новости
                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>
            </div>

            <section>
                @yield('content')
            </section>

        </div>

    </section>

    {{-- <section>
        @yield('content')
    </section> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
