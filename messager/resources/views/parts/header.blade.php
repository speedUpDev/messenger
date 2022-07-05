<header>
    <nav>
        <a href="{{route('home')}}">Главная</a>
        <a href="{{route('wall')}}">К записям</a>
        @if(!\Illuminate\Support\Facades\Auth::check())
            <a href="{{route('login')}}">Войти</a>
        @else
            <a href="{{route('logout')}}">Выйти</a>
        @endif
    </nav>
</header>
