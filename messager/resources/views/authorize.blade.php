@extends('layouts.app')
@section("title")
    Авторизация
@endsection
@section('content')
    <h1>Авторизация</h1>
    <form method="post" action="{{route('login')}}">
        @csrf
        <input name="email" type="text" placeholder="Введите email">
        @error('email')
        <div>{{$message}}</div>
        @enderror
        <input name="password" type="password" placeholder="Введите пароль">
        <button type="submit">Вход</button>
    </form>
    <p>Не зарегестрированы?<a href="{{route('registration')}}"> Регистрация</a></p>
@endsection
