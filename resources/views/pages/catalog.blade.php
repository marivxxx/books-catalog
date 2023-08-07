@extends('template')
@section('title', 'Каталог')
@section('content')
    <div class="row" style="font-family: monospace; color: #565656; opacity: 0.8; box-shadow: 0 0 15px 15px black; margin: 8%; background: black">
        <h1 class="text-center" style="font-family: monospace; margin-top: 2%">Каталог</h1>
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
@endsection
