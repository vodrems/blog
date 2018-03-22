<!DOCTYPE html>
<html lang="en">
<head>
    <title>Todo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default">
        <ul>
            @if(!Auth::check())
                <li><a href="{{ route('loginForm') }}">Login</a></li>
                <li><a href="{{ route('regForm') }}">Registration</a></li>
            @endif
            @if(Auth::check())
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Logout">
                </form>
            </li>
            @endif
        </ul>
    </nav>
    <div class="row">
        <div class="col-md-12">
            @if (session('msg'))
                {{ session('msg') }}
            @endif

            @yield('content')
        </div>
    </div>
</div>
</body>
</html>