@extends('layouts.app')

@section('title', $pagetitle)

@section('content')

    <h2 class="page-title">{{ $pagetitle }}</h2>

    @if(isset($data['message']))
        {{ $data['message'] }}
    @endif

    <form action="" method="POST">
        @csrf
        <input type="text" value = "{{$data['email']}}" name="email" placeholder="メールアドレス"><br>
        <input type="password" name="password" placeholder="パスワード"><br>
        <input type="hidden" name="back" value="{{ $data['back_url'] ?? route('top') }}">
        <button class="submit-button" type="submit" name="loginBtn">ログイン</button><br> 
    </form>
    
    <div class="action-area">
        <a href="{{ route('userinfo.regist', ['back' => $data['back_url'] ?? route('top')]) }}">ユーザー登録はこちら</a><br>
        <a href="{{ $data['back_url'] ?? route('top') }}">トップに戻る</a>    
    </div>

@endsection
