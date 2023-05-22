<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/App.css') }}" />
    @yield('Css')

    <title>
        @yield('pagetitle')
    </title>
</head>

<body>
    <header>
        <div class="appname">Rese</div>
        <nav>
            @if (Auth::check())
                <div class="nav_contents">
                    <a href="{{ route('home') }}">Home</a>
                </div>
                <form method="post" action="/logout">
                    @csrf
                    <button class = "nav_contents">Logout</button>
                </form>
                <form method="post" action="/mypage">
                    @csrf
                    <button class = "nav_contents">Mypage</button>
                </form>
            @else
                <div class="nav_contents">
                    <a href="{{ route('home') }}">Home</a>
                </div>
                <div class="nav_contents">
                    <a href="{{ route('register') }}">Registration</a>
                </div>
                <div class="nav_contents">
                    <a href="{{ route('login') }}">Login</a>
                </div>
            @endif
        </nav>
    </header>
    <div class="contents layout__center">
        @yield('contents')
    </div>
</body>
</html>