@extends('layouts.app')

@section('title', $pagetitle)

@section('content')

    <h2 class="page-title">{{ $pagetitle }}</h2>

    <table>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <th>ユーザー名</th>
            <td>{{ $data['user_name'] }}</td>
        </tr>
    </table>

    <div class="action-area">
        @if ($data['can_update'])
            <a href="{{ route('userinfo.update', ['back' => $data['back_url'] ?? route('top')]) }}">ユーザー情報の更新および削除はこちら</a><br>
        @endif
        @if(!empty($data['from_word']))
            <a href="{{ route('word', [$data['from_word'], 'back' => $data['back_url'] ?? route('top')]) }}">ひとこと詳細に戻る</a><br>
        @endif
        <a href="{{ $data['back_url'] ?? route('top') }}">トップに戻る</a>
    </div>

@endsection