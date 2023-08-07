@extends('template')
@section('title', 'Добавление книги')
@section('content')
    <div class="row col-8" style="font-family: monospace; color: #565656; background: black; box-shadow: 0 0 15px 15px black; opacity: 0.8; margin-top: 10%; margin-left: 18%">
        <h1 class="text-center" style="margin-top: 5%; margin-bottom: 5%">Добавление книги</h1>
        <div class="col-md-11 mx-auto">
            <form method="POST" action="/addBook" enctype="multipart/form-data">
                @csrf
                <!-- title -->
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label" style="font-size: large; margin-left: 3%">Название</label>
                    <div class="col-sm-9">
                        <input autofocus required name="title" type="text" class="form-control" style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%">
                    </div>
                </div>
                <!-- content -->
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label" style="font-size: large; margin-left: 3%">Аннотация</label>
                    <div class="col-sm-9">
                        <textarea name="contentField" type="text" class="form-control" style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%"></textarea>
                    </div>
                </div>
                <!-- book img -->
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label" style="font-size: large; margin-left: 3%">Изображение</label>
                    <div class="col-sm-9">
                        <input required type="file" name="bookImg" class="form-control" style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%">
                    </div>
                </div>
                <!-- author -->
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label" style="font-size: large; margin-left: 3%">Автор</label>
                    <div class="col-sm-9">
                        <input required name="author" type="text" class="form-control" style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%">
                    </div>
                </div>
                <!-- genre -->
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label" style="font-size: large; margin-left: 3%">Жанр</label>
                    <div class="col-sm-9">
                        <input required name="genre" type="text" class="form-control" style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%">
                    </div>
                </div>
                <!-- age limit -->
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label" style="font-size: large; margin-left: 3%">Возрастное ограничение</label>
                    <div class="col-sm-9">
                        <input required name="ageLimit" type="text" class="form-control" style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%">
                    </div>
                </div>
                <!-- comment from user -->
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label" style="font-size: large; margin-left: 3%">Ваш комментарий к книге (не обязательно)</label>
                    <div class="col-sm-9">
                        <textarea name="fromUser" type="text" class="form-control" style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%"></textarea>
                    </div>
                </div>
                <!-- btn -->
                <div class="mb-3">
                    <input type="submit" value="Добавить книгу" style="background: #565656; color: black; margin-top: 2%; margin-bottom: 1%" class="form-control btn">
                </div>
            </form>
        </div>
    </div>
@endsection
