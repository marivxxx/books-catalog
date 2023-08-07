<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <style>
            #block {
                background: black;
                margin-top: 8%;
                margin-left: 25%;
                height: 550px;
                opacity: 0.8;
                border-radius: 45%;
                box-shadow: 0 0 15px 15px black;
            }
            #block3{
                background: black;
                margin-left: 13%;
                margin-top: 10%;
                height: 50%;
                width: 75%;
                opacity: 0.8;
                box-shadow: 0 0 15px 15px black;
            }
            #block2{
                font-family: monospace;
                color: #565656;
                opacity: 1;
                margin-top: 160px;
            }
            body{
                background-image: url('/images/background3.jpg');
                height: 100%;
                width: 100%;
            }
            #topBlock{
                font-family: monospace;
                color: #565656;
                opacity: 0.8;
                box-shadow: 0 0 15px 15px black;
                margin: 8%;
            }
            #footerField{
                font-family: monospace;
                width: 100%;
                position:relative;
                background: black;
                opacity: 0.8;
                box-shadow: 0 0 15px 15px black;
                justify-content: center;
                align-items: center;
                display: flex;
                flex-direction: column;
                margin-top: 15%;
                color: #565656;
            }
            .menu{
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                list-style: none;
                margin: 2%;
            }
            #footerLi{
                margin: 5%;
            }
            #search{
                border: 1px solid #565656;
                cursor: pointer;
                color: #565656;
            }
            #search:hover{
                background: #565656;
                color: black;
            }
        </style>
        <script src="https://kit.fontawesome.com/71535ed277.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        {{-- header  --}}
        <header class="masthead sticky-top">
            <nav class="navbar" style="background: black; opacity: 0.7">
                <div class="container-fluid">
                    <i class="fa-solid fa-book fa-3x" style="color: #565656"> <a class="navbar-brand" style="color: #565656">books</a></i>
                    {{-- search  --}}
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                        <button class="btn btn-outline" id="search" type="submit">Поиск</button>
                    </form>
                    {{-- search --}}
                    <div class="btn-group dropstart">
                        <button type="button" style="color: #565656" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars fa-xl"></i>
                        </button>
                        <ul class="dropdown-menu" style="background: black; border: 3px solid #565656">
                            <li><a class="dropdown-item" style="color: #565656" href="/">Главная</a></li>
                            <li><a class="dropdown-item" style="color: #565656" href="/catalog">Каталог</a></li>
                            @auth
                                <li><a class="dropdown-item" style="color: #565656" href="/addBook">Добавить книгу</a></li>
                                <li><a class="dropdown-item" style="color: #565656" href="/profile">Личный кабинет</a></li>
                                <form id="logoutFrom" action="/logout" method="post">
                                    @csrf
                                </form>
                                <li>
                                    <a class="dropdown-item" style="color: #565656" href="#" onclick="logoutFrom.submit()">Выход</a>
                                </li>
                            @else
                                <li><a class="dropdown-item" style="color: #565656" href="/register">Pегистрация</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        {{-- header  --}}

        <div class="container">
            @yield('content')
        </div>
        <!-- footer -->
        <footer id="footerField">
            <ul class="menu">
                <li id="footerLi"><a style="color: #565656; text-decoration: none;" href="/">Главная</a></li>
                <li id="footerLi"><a style="color: #565656; text-decoration: none;" href="/catalog">Каталог</a></li>
                <li id="footerLi"><a style="color: #565656; text-decoration: none;" href="/addBook">Добавить книгу</a></li>
                <li id="footerLi"><a style="color: #565656; text-decoration: none;" href="/register">Регистрация</a></li>
            </ul>
            <p style="margin-bottom: 3%">©2023 Books Catalog PH-1901</p>
        </footer>
        <!-- footer -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
