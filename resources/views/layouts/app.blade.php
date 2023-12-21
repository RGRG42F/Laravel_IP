<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    {{-- ШАПКА --}}
    <header>

        <div class="header-block">

            <div class="container">

                <div class="header-head">

                    <div class="logo">

                        <img src="/images/header/Logo.svg" alt="Logo">

                        <a class="logo-link" href="{{route('index')}}">

                            <p>ВкусНЯ</p>

                        </a>

                    </div>

                    <div class="header-search">

                        <input class="input-search" type="text" placeholder="Поиск">
                        <button class="button-search">
                            <img src="/images/header/Loupe.svg" alt="Loupe">
                        </button>

                    </div>

                    <div class="header-button">

                        @auth("web")
                            <div class="button-account">

                                <a href="{{route('logout')}}">

                                    <button>
                                        <img src="/images/header/Logout.svg" alt="Account">
                                    </button>
                                    <p class="px-3">Выход</p>

                                </a>

                            </div>

                            <div class="button-account">
                                <a href="{{ route('profile', Auth::id()) }}">
                                    <button>
                                        <img src="/images/header/Profile.svg" alt="Account">
                                    </button>
                                    <p class="px-3">Профиль</p>
                                </a>
                            </div>


                            <div class="button-create">

                                <a href="{{route('create')}}">

                                    <button>
                                        <img src="/images/header/Create.svg" alt="Create">
                                    </button>
                                    <p>Добавить</p>

                                </a>

                            </div>
                        @endauth

                        @guest("web")

                            <div class="button-account">

                                <a href="{{route('login')}}">

                                    <button>
                                        <img src="/images/header/Profile.svg" alt="Account">
                                    </button>
                                    <p class="px-3">Вход</p>

                                </a>

                            </div>
                        @endguest

                    </div>

                </div>

            </div>

        </div>

        <div class="container">

                <nav class="header-nav">

                    <ul class="header-menu list-unstyled d-flex flex-wrap">

                        @foreach ($categories as $category_item)
                            <li class="heeader-item">
                                <a class="header-link" href="{{route('RecipesByCategory', ['category' => $category_item->id])}}">
                                    {{ $category_item->title }}
                                </a>
                            </li>
                        @endforeach

                    </ul>

                </nav>

                <div class="line"></div>

        </div>

    </header>

    {{-- КОНТЕНТ СЕКЦИЯ --}}
    <section>

        <div class="container">

            @yield('content')

        </div>

    </section>

    {{-- ПОДВАЛ --}}
    <footer>

        <div class="container">

            <div class="footer-latest-content">

                <p class="our-motto">
                    Рецепты с любовью. Вдохновение на каждой странице.<br>
                    Добро пожаловать в наш мир вкуса!
                </p>

                <div class="social-media-links">

                    <div>

                        <a href="#">
                            <img src="/images/footer/Social-1.svg" alt="Social-1">
                            <p>Одноклассники</p>
                        </a>

                    </div>

                    <div>

                        <a href="#">
                            <img src="/images/footer/Social-2.svg" alt="Social-2">
                            <p>Вконтакте</p>
                        </a>

                    </div>

                    <div>

                        <a href="#">
                            <img src="/images/footer/Social-3.svg" alt="Social-3">
                            <p>Яндекс Дзен</p>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>
</html>
