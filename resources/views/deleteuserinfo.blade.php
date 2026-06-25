@extends('layouts.app')

@section('title', $pagetitle)

@section('content')

    <h2 class="page-title">{{ $pagetitle }}</h2>

    @if(isset($data['message']))
        {{ $data['message'] }}
    @endif

    <p>
        <a href={{ route('userinfo', ['public_id' => Auth::user()->public_id, 'back' => $data['back_url'] ?? route('top')]) }}>{{ Auth::user()->user_name }}</a>さん、ユーザ情報を削除します。<br>
        よろしいですか？
    </p>
    
    <form action="" method="post">
        @csrf
        <input type="hidden" name="back" value="{{ $data['back_url'] ?? route('top') }}">
        <button type="submit">削除</button>
    </form>

    <div class="action-area">
        <a href="{{ $data['back_url'] ?? route('top') }}">トップに戻る</a>
    </div>

@endsection