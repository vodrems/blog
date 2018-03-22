<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Quickstart - Basic</title>
    <!-- CSS и JavaScript -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default">
        <!-- Содержимое Navbar -->
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