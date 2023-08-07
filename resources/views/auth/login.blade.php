@extends('template')
@section('content')
    <div class="row col-8" style="font-family: monospace; color: #565656; background: black; box-shadow: 0 0 15px 15px black; opacity: 0.8; margin-top: 10%; margin-left: 18%">
        <h1 class="text-center" style="margin-top: 5%">Авторизация</h1>
        <div class="col-md-11 mx-auto">
            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <il>{{$error}}</il>
                        @endforeach
                    </ul>

                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- email -->
                <div class="input-group flex-nowrap mb-3">
                <span  style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%" class="input-group-text" id="addon-wrapping">
                    <i class="fa-solid fa-at"></i>
                </span>
                    <input  style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%" autofocus required type="email" class="form-control" name="email" placeholder="Адрес электронной почты" aria-label="email" aria-describedby="addon-wrapping">
                </div>
                <!-- password -->
                <div class="input-group flex-nowrap mb-3">
                <span style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%" class="input-group-text" id="addon-wrapping">
                    <i class="fa-solid fa-key"></i>
                </span>
                    <input style="background: black; color: #565656; border: 2px solid #565656; margin-top: 1%" required type="password" class="form-control" name="password" placeholder="Пароль" aria-label="password" aria-describedby="addon-wrapping">
                </div>
                <!-- btn -->
                <div class="mb-3">
                    <input type="submit" value="Войти" style="background: #565656; color: black; margin-top: 2%; margin-bottom: 1%" class="form-control btn">
                    <a class="lost_pass" style="margin-bottom: 3%; color: #565656; text-decoration: none;" href="#">Забыли пароль?</a>
                </div>
            </form>
        </div>
    </div>
@endsection

