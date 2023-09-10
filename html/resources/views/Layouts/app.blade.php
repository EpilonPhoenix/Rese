<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/App.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @yield('Css')
    
    @stack('scripts')
    <title>
        @yield('pagetitle')
    </title>
</head>

<body class="bg-light">
    <header>
        <nav class="navbar w-100 row justify-content-between">
            <div class="navbar-brand col-md-3 fs-1 fw-bold text-primary mx-4">Rese</div>
            <div class="col-md-auto row">
                @if (Auth::check())
                    <div class="col-auto fs-3 text-primary fw-bold">
                        <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
                    </div>
                    <form method="post" action="/logout" name="logout" class = "col-auto fs-3 text-primary fw-bold">
                        @csrf
                        <a href="javascript:logout.submit()" class="text-decoration-none">Logout</a>
                    </form>
                    <div class="col-auto fs-3 text-primary fw-bold">
                        <a href="{{ route('mypage') }}" class="text-decoration-none">Mypage</a>
                    </div>
                @else
                    <div class="col-auto fs-3 text-primary fw-bold">
                        <a href="{{ route('home') }}" class="text-decoration-none">Home</a>
                    </div>
                    <div class="col-auto fs-3 text-primary fw-bold">
                        <a href="{{ route('register') }}" class="text-decoration-none">Registration</a>
                    </div>
                    <div class="col-auto fs-3 text-primary fw-bold">
                        <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                    </div>
                @endif
            </div>
        </nav>
    </header>
    <div class="contents layout__center">
        @yield('contents')
    </div>
</body>
</html>
