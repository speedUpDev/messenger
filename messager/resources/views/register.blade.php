@extends('layouts.app')
@section("title")
    Регистрация
@endsection
@section('content')
    <h1>Регистрация</h1>
    <form method="post" action="{{route('registration')}}">
        @csrf
        <input name="email" type="text" placeholder="Введите email">
        @error('email')
        <div>{{$message}}</div>
        @enderror
        <input name="name" type="text" placeholder="Введите имя пользователя">
        <input name="pass" type="password" placeholder="Введите пароль">
        @error('password')
        <div>{{$message}}</div>
        @enderror
        <input name="pass_conf" type="password" placeholder="Повтор пароля">
        <button type="submit">Вход</button>
    </form>
    <p><a href="{{route('login')}}">К авторизации</a></p>
@endsection
