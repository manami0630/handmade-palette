<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handmade Palette</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header-title">
            <h1>Handmade Palette</h1>
        </div>
        <form class="nav-links" action="/logout" method="post">
        @csrf
            @if (Auth::check())
                <button class="btn" type="submit">ログアウト</button>
            @endif
        </form>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>