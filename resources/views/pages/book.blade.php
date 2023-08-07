@extends('template')
@section('title', 'Книга')
@section('content')
    <style>
        .row{
            font-family: monospace;
            color: #565656;
            opacity: 0.8;
            box-shadow: 0 0 15px 15px black;
            margin: 8%;
            background: black;
        }
        #changeBtn{
            margin-right: 3%;
            margin-bottom: 3%;
            cursor: pointer;
            font-size: x-large;
        }
        #changeBtn:hover{
            color: white;
        }
        #addBtn:hover{
            background: white;
            color: black;
        }
        #addBtn{
            background: #565656;
            color: black;
        }
        #deleteBtn{
            cursor: pointer;
            font-size: x-large;
        }
        #deleteBtn:hover{
            color: white;
        }
        #deleteBookBtn{
            margin-right: 3%;
            margin-bottom: 3%;
            cursor: pointer;
            font-size: x-large;
        }
        #deleteBookBtn:hover{
            color: white;
        }
    </style>
    <div class="row">
        <div class="col-md-4" style="margin-top: 3%; margin-bottom: 3%">
            @if($book->img != null)
                <div>
                    <img src="/{{$book->img}}"  style="width: 100%" alt="обложка">
                </div>
            @else
                <div>
                    <p class="text-center" style="margin-top: 50%">Нет фото</p>
                </div>
            @endif

        </div>
        <div class="col-md-8" style="font-size: x-large; margin-top: auto; margin-bottom: auto">
            <p>Название: <span id="bookName">{{$book->title}}</span></p>
            <p>Автор: <span id="bookAuthor">{{$book->author}}</span></p>
            <p>Аннотация: <span id="bookContent">{{$book->content}}</span></p>
            <p>Жанр: <span id="bookGenre">{{$book->genre}}</span></p>
            <p>Возрастное ограничение: <span id="bookLimit">{{$book->age_limit}}</span></p>
            @if($book->from_user != null)
                <p>Комментарий от пользователя {{$book->user->name}}: <span>{{$book->from_user}}</span></p>
            @endif
            <p hidden id="textForImg" style="color: #8B0000; text-align: center">Вы не можете изменить или добавить обложку книги</p>
        </div>
        @auth()
            @if($book->author_id === auth()->user()->getAuthIdentifier())
                <div class="text-end">
                    <span id="changeBtn" onclick="renderInputBook(this)" type="submit">[Изменить]</span>
                    <span id="changeBtn" hidden onclick="saveBookData()" type="submit">[Сохранить]</span>
                    <form enctype="multipart/form-data"></form>
                    <span id="deleteBookBtn" onclick="deleteBook()" type="submit">[Удалить]</span>
                    <span id="bookID" hidden type="text">{{$book->id}}</span>
                </div>
            @elseif($book->author_id != auth()->user()->getAuthIdentifier())
                <div class="text-end">
                    <p>Нашли ошибку? Напишите об этом в комментариях</p>
                </div>
            @endif
        @endauth
    </div>
    <div class="row">
        <h2 class="text-center">Комментарии</h2>
        <!-- form add comm-->
        @auth()
            <form action="/addComment" method="post">
                @csrf
                <input type="hidden" name="bookID" value="{{$book->id}}">
                <div class="text-center" style="margin: 3%">
                    <textarea name="commentField" placeholder="Напишите свое мнение!" class="form-control" style="color: #565656; background: black; border: 1px solid #565656"></textarea>
                </div>
                <div class="text-center" style="margin-top: 3%; margin-bottom: 3%">
                    <button class="btn" id="addBtn">Добавить комментарий</button>
                </div>
            </form>
        @else
            <p style="color: #8B0000; text-align: center">Зарегистрируйтесь, чтобы писать комментарии!</p>
        @endauth
        <hr>
        <!-- block for comm -->
        @foreach($comments as $comment)
            <div class="card" style="background: black; border: 1px solid #565656; margin: 4%; width: 92%">
                <div class="card-header" style="margin-top: 2%">
                    <i class="fa-solid fa-user fa-lg"></i>
                    <i style="font-size: x-large"> {{$comment->author->name}}</i>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{$comment->comment}}</p>
                        <hr>
                        <footer style="font-size: large; text-align: end">Написано
                            <cite title="Заголовок источника">{{$comment->created_at}}</cite>
                            @if($comment->user_id == auth()->user()->getAuthIdentifier())
                                <br>
                                <span id="deleteBtn" onclick="deleteComm()" type="submit">[Удалить]</span>
                                <span id="commID" hidden type="text">{{$comment->id}}</span>
                            @endif
                        </footer>
                    </blockquote>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        // update book
        let bookName = document.getElementById('bookName');
        let bookAuthor = document.getElementById('bookAuthor');
        let bookContent = document.getElementById('bookContent');
        let bookGenre = document.getElementById('bookGenre');
        let bookLimit = document.getElementById('bookLimit');
        let text = document.getElementById('textForImg')
        function renderInputBook(btn){
            btn.nextElementSibling.hidden = false;
            btn.hidden = true;
            text.hidden = false;
            let valueName = bookName.innerText;
            let valueAuthor = bookAuthor.innerText;
            let valueContent = bookContent.innerText;
            let valueGenre = bookGenre.innerText;
            let valueLimit = bookLimit.innerText;

            bookName.innerHTML = `<input value="${valueName}" class="form-control" type="text" id="bookName_input" style="color: #565656; background: black; border: 1px solid #565656">`;
            bookAuthor.innerHTML = `<input value="${valueAuthor}" class="form-control" type="text" id="bookAuthor_input" style="color: #565656; background: black; border: 1px solid #565656">`;
            bookContent.innerHTML = `<textarea class="form-control" type="text" id="bookContent_input" style="color: #565656; background: black; border: 1px solid #565656">${valueContent}</textarea>`;
            bookGenre.innerHTML = `<input value="${valueGenre}" class="form-control" type="text" id="bookGenre_input" style="color: #565656; background: black; border: 1px solid #565656">`;
            bookLimit.innerHTML = `<input value="${valueLimit}" class="form-control" type="text" id="bookLimit_input" style="color: #565656; background: black; border: 1px solid #565656">`;
        }

        function saveBookData(){
            let token = document.querySelector('input[name="_token"]').value;
            let inputName = document.getElementById('bookName_input');
            let inputAuthor = document.getElementById('bookAuthor_input');
            let inputContent = document.getElementById('bookContent_input');
            let inputGenre = document.getElementById('bookGenre_input');
            let inputLimit = document.getElementById('bookLimit_input');
            let bookId = document.getElementById('bookID').innerText;
            let formData = new FormData();
            formData.append('bookName', inputName.value);
            formData.append('bookAuthor', inputAuthor.value);
            formData.append('bookContent', inputContent.value);
            formData.append('bookGenre', inputGenre.value);
            formData.append('bookLimit', inputLimit.value);
            formData.append('bookId', bookId);
            formData.append('_token', token);
            fetch('/updateBook', {
                method: "post",
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    if (result.result === "success"){
                        location.reload();
                    }
                })
        }
        // update book

        //delete book
        function deleteBook(){
            let bookId = document.getElementById('bookID').innerText;
            let token = document.querySelector('input[name="_token"]').value;
            let formData = new FormData();
            formData.append('bookId', bookId);
            formData.append('_token', token);
            fetch('/deleteBook', {
                method: "post",
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    if (result.result === 'success'){
                        location.replace('/catalog')
                    }
                })
        }
        // delete comment
        function deleteComm() {
            let commId = document.getElementById('commID').innerText;
            let token = document.querySelector('input[name="_token"]').value;
            let formData = new FormData();
            formData.append('commId', commId);
            formData.append('_token', token);
            fetch('/deleteComm', {
                method: "post",
                body: formData
            }).then(response => response.json())
                .then(result => {
                    if (result.result === 'success') {
                        location.reload();
                    }
                })
        }

    </script>
@endsection
