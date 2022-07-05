@extends('layouts.app')
@section("title")
    Стенка
@endsection
@section('content')
    <h1>Стена с записями</h1>
    <a href="{{route('message')}}">Создать запись</a>
        @foreach($messages as $message)
                <p>Пользователь - <b>{{$message -> author}}</b>, сказал:</p>
                <p>{{$message -> text}}</p>
                <p>{{$message -> date}}</p>
                @if(Auth::user()->id == $message -> user_id)
                    <form action="{{route('message-delete', $message->id)}}" method="get">
                        <button href="{{route('message-delete', $message->id)}}">X</button>
                    </form>
                @endif
            <hr>


        @endforeach
    {{$messages->links()}}
@endsection
