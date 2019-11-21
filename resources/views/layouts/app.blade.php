<!DOCTYPE html>
<html lang="en">
<head>
    <title>Todo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div class="container" id="app">
    <nav class="navbar navbar-default">
        <ul>
            @if(!Auth::check())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('regForm') }}">Registration</a></li>
            @endif
            @if(Auth::check())
            <li><a href="{{ route('tasks.index') }}">All Tasks</a></li>
            <li><a href="{{ route('tasks.create') }}">Create Task</a></li>
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
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>