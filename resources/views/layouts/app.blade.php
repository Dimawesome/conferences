<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel project - @yield('title')</title>

    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</head>
<body>
<div>
    <header style="margin: 10px">
        @guest
            <a href="{{ route('login') }}">Login</a>
        @else
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                ({{ auth()->user()->name }})</a>
            <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none">
                @csrf
            </form>
        @endguest
        <select class="form-control changeLang">
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
            <option value="lt" {{ session()->get('locale') == 'lt' ? 'selected' : '' }}>Lietuvių</option>
        </select>
    </header>
    <main class="py-3">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
</div>
<script type="text/javascript">

    var url = "{{ route('changeLang') }}";

    $('.changeLang').change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });

</script>
</body>
</html>
