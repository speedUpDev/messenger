@extends('layouts.app')
@section("title")
    Новая запись
@endsection
@section('content')
    <h1>Создайте свою запись</h1>
    @if($errors->any())
        <div class="errors">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
    <form action="{{route('message-post')}}" method="post">
        @csrf
        <label for="message">Ваше сообщение</label>
        <textarea type="" placeholder="Введите ваше сообщение" id="message" name="message"></textarea>
        <button type="submit">Отправить</button>
    </form>
@endsection
