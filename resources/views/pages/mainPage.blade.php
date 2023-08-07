@extends('template')
@section('title', 'Главная страница')
@section('content')
    <div class="container">
        <div class="row col-6" id="block">
            <div class="text-center" id="block2">
                <h1>КНИЖНЫЙ КАТАЛОГ</h1>
                <hr>
                <p style="font-size: xx-large">Здесь вы найдете любую книгу! Или можете добавить свою и помочь другим в поиске нужной литературы!</p>
            </div>
        </div>
        <!-- Карусель -->
        <div class="col-12" id="block3">
            <div class="row" style="color: #565656; font-family: monospace;">
                <!-- Карточка -->
                <div class="card text mb-3 text-center" style="max-width: 18rem; margin-left: 2.5%; margin-top: 1%; background: black; border: 1px solid #565656">
                    <div class="card-header" style="margin-top: 5px"><i class="fa-regular fa-rectangle-list fa-3x"></i></div>
                    <div class="card-body">
                        <h5 class="card-title">Каталог</h5>
                        <p class="card-text" style="font-size: medium">Не знаешь точно, какой жанр или автор тебя интересуют или
                            хочешь найти что-то новое?<br>
                            Здесь ты сможешь увидеть все книги, которые у нас есть!
                            <br><a href="/catalog" class="card-link" style="color: #696969">Заходи в наш каталог!</a>
                        </p>
                    </div>
                </div>
                <!-- Карточка -->
                <div class="card text mb-3 text-center" style="max-width: 18rem; margin-left: 2.5%; margin-top: 1%; background: black; border: 1px solid #565656">
                    <div class="card-header" style="margin-top: 5px"><i class="fa-regular fa-rectangle-list fa-3x"></i></div>
                    <div class="card-body">
                        <h5 class="card-title">Регистрация</h5>
                        <p class="card-text" style="font-size: medium">Хочешь видеть больше книг? Оставлять комментарии и добавлять свои книги?<br>
                            Присоединяйся к нам!
                            <br><a href="/register" class="card-link" style="color: #696969">Регистрируйся</a>
                        </p>
                    </div>
                </div>
                <!-- Карточка -->
                <div class="card text mb-3 text-center" style="max-width: 18rem; margin-left: 2.5%; margin-top: 1%; background: black; border: 1px solid #565656">
                    <div class="card-header" style="margin-top: 5px"><i class="fa-solid fa-user-plus fa-3x"></i></div>
                    <div class="card-body">
                        <h5 class="card-title">Добавить</h5>
                        <p class="card-text" style="font-size: medium">Нет того, что ищешь?
                            Хочешь, чтобы другие увидели понравившуюся тебе книгу? Являешься автором книг?
                            Стань частью нашего сайта!
                            <br><a href="/addBook" class="card-link" style="color: #696969">Добавь свою книгу в каталог!</a>
                        </p>
                    </div>
                </div>
                <!-- Карточка -->
            </div>
        </div>
        <!---->
        <div class="container">
            <div class="row text-center" id="topBlock">
                <!-- блок с подборками книг -->
                <div class="card" style="background: black;">
                    <div class="card-header" style="font-size: xx-large; margin-top: 2%">
                        Несколько книг из каталога
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($books as $book)
                                <!---->
                                <div class="card col-5" style="max-width: 60%; max-height: 20%; margin-left: 5%; margin-bottom: 3%; background: black; border: 2px solid #565656; margin-top: 3%">
                                    <div class="row g-0">
                                        @if($book->img != null)
                                            <div class="col-md-4" style="border-right: 1px solid #565656">
                                                <img src="{{$book->img}}"  style="width: 100%" class="img-fluid rounded-start" alt="обложка">
                                            </div>
                                        @else
                                            <div class="col-md-4" style="border-right: 1px solid #565656">
                                                <p class="text-center" style="margin-top: 50%">Нет фото</p>
                                            </div>
                                        @endif
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$book->title}}</h5>
                                                <p class="card-text">{{$book->author}}</p>
                                                <p class="card-text"><small class="text-muted">{{mb_strimwidth($book->content, 0, 90, '...')}}</small></p>
                                                <a href="/book/{{$book->id}}" style="color: #565656">Перейти</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- блок с подборками книг -->

            </div>
        </div>
        <!---->
    </div>
@endsection
