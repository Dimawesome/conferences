<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Laravel project - @yield('title')</title>
</head>
<body>
<div>
    <header class="m-10">
        @guest
            <a href="{{ route('login') }}">Login</a>
        @else
            <a href="{{ route('logout') }}" id="logout-btn">Logout ({{ auth()->user()->name }})</a>
            <form action="{{ route('logout') }}" method="post" id="logout-form" class="d-none">
                @csrf
            </form>
        @endguest
    </header>
    <main class="py-3">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
