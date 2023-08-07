@extends('template')
@section('title', 'Профиль')
@section('content')
    <style>
        .changeBtn{
            cursor: pointer;
        }
        .changeBtn:hover{
            color: white;
        }
    </style>
    <div class="row text-center" style="font-family: monospace; color: #565656; opacity: 0.8; box-shadow: 0 0 15px 15px black; margin: 8%; background: black">
        <p style="margin-top: 5%; font-size: xxx-large">Личный кабинет</p>
        <div class="card mb-3" style="max-width: 90%; margin: 5%; background: #000000">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{$user->img}}" alt="" style="width: 100%">
                    <form action="/changeUserAvatar" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="userAvatar">
                        <input type="submit">
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="font-size: x-large; margin-top: auto; margin-bottom: auto">
                        <p>
                            <strong>Имя пользователя: </strong>
                            <span id="nameSpan">{{$user->name}}</span>
                        <br>
                            <span class="changeBtn" onclick="renderInput(this)">[изменить]</span>
                            <span class="changeBtn" hidden onclick="saveUserData()">[сохранить]</span>
                        </p>
                        <p>
                            <strong>Электронная почта: </strong>
                            <span>{{$user->email}}</span>
                        </p>
                        <p>
                            <strong>ID: </strong>
                            <span>{{$user->id}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center" style="font-family: monospace; color: #565656; opacity: 0.8; box-shadow: 0 0 15px 15px black; margin: 8%; background: black">
        <p style="margin-top: 5%; font-size: xx-large">Книги, которые вы опубликовали</p>
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
{{--        <hr>--}}
{{--        <p style="font-size: x-large">Вы еще не опубликовали ни одной книги--}}
{{--            <br> Вы можете перейти на страницу добавления книги <a  style="color: #565656" href="/addBook"> по этой ссылке</a>--}}
{{--        </p>--}}
    </div>


    <script>
        let nameSpan = document.getElementById('nameSpan');
        function renderInput (btn){
            btn.nextElementSibling.hidden = false;
            btn.hidden = true;
            nameSpan.innerHTML = '<input type="text" id="nameSpan_input" style="color: #565656; background: black; border: 1px solid #565656">';
        }

        function saveUserData(){
            let input = document.getElementById('nameSpan_input');
            let token = document.querySelector('input[name="_token"]').value;
            let formData = new FormData();
            formData.append('nameSpan', input.value);
            formData.append('_token', token);
            fetch('/updateUserData', {
                method: "post",
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    if (result.result === 'success'){
                        location.reload();
                    }
                })
        }
    </script>
@endsection
