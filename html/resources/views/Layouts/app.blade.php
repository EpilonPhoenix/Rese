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
                @if (!empty( $user -> id ))
                <form method="post" action="/">
                    @csrf
                    <button class = "nav_contents">Home</button>
                </form>
                <form method="post" action="/logout">
                    @csrf
                    <input type="hidden" name='user_id' value="{{$user -> id}}">
                    <button class = "nav_contents">Logout</button>
                </form>
                <form method="post" action="/mypage">
                    @csrf
                    <input type="hidden" name='users_id' value="{{$user -> id}}">
                    <button class = "nav_contents">Mypage</button>
                </form>
                @endif
            @else
                <form method="post" action="/">
                    @csrf
                    <button class = "nav_contents">Home</button>
                </form>
                <form method="post" action="/">
                    @csrf
                    <button class = "nav_contents">Registration</button>
                </form>
                <form method="post" action="/login">
                    @csrf
                    <button class = "nav_contents">Login</button>
                </form>
            @endif
        </nav>
    </header>
    <div class="contents layout__center">
        @yield('contents')
    </div>
</body>
</html>