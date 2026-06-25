<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <h1><a href="{{ route('top') }}">大回り乗車ルート検索</a></h1>
            @auth
            こんにちは、<a href="{{ route('userinfo', ['public_id' => Auth::user()->public_id, 'back' =>  request()->fullUrl() ?? route('top')]) }}">{{ Auth::user()->user_name }}</a>さん
            <form action="{{ route('logout') }}" method="post">
                <button type="submit">ログアウト</button>
                <input type="hidden" name="allow_redirect" value="{{ $data['allow_redirect'] ?? false }}">
                <input type="hidden" name="back" value="{{ $data['back_url'] ?? route('top') }}">
            </form
            @endauth
            @guest
            こんにちは、ゲストさん<br>
            <a href="{{ route('login', ['redirect' => url()->current(), 'back' =>  request()->fullUrl() ?? route('top')]) }}">ログインはこちら</a>
            @endguest
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
        </footer>
    </body>
</html>