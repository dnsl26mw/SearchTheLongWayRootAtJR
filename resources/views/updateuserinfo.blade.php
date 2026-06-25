@extends('layouts.app')

@section('title', $pagetitle)

@section('content')

    <h2 class="page-title">{{ $pagetitle }}</h2>

    @if(isset($data['message']))
        {{ $data['message'] }}
    @endif

    <form action="" method="post">
        @csrf
        <table>
            <tr>
                <th>メールアドレス</th>
                <td><input type="text" name="email" value="{{ $data['email'] }}"></td>
            </tr>
            <tr>
                <th>ユーザー名</th>
                <td><input type="text" name="user_name" value="{{ $data['user_name'] }}"></td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td>
                    <input type="radio" name="updatepassword" value="notupdatepassword" id="notupdatepassword" {{ $data['updatepassword'] === 'notupdatepassword' ? 'checked' : '' }}>更新しない
                    <input type="radio" name="updatepassword" value="updatepassword" id="updatepassword" {{ $data['updatepassword'] === 'updatepassword' ? 'checked' : '' }}>更新する
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="password" name="oldpassword" id="oldpasswordtextbox" placeholder="現在のパスワード"><br>
                    <input type="password" name="newpassword" id="newpasswordtextbox" placeholder="新しいパスワード">
                </td>
            </tr>
        </table>
        <button type="submit">更新</button>
    </form>

    <div class="action-area">
        <a href="{{ route('userinfo.delete', ['back' => $data['back_url'] ?? route('top')]) }}">ユーザー情報の削除はこちら</a><br>
        <a href="{{ $data['back_url'] ?? route('top') }}">トップに戻る</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // 更新しないラジオボタン
            const notUpdatePassRadio = document.getElementById('notupdatepassword');

            // 更新するラジオボタン
            const updatePassRadio = document.getElementById('updatepassword');

            // 現在のパスワード入力ボックス
            const oldPasswordTextbox = document.getElementById('oldpasswordtextbox');

            // 新しいパスワード入力ボックス
            const newPasswordTextbox = document.getElementById('newpasswordtextbox');

            // パスワード入力ボックス有効化制御
            function switchingEnablePasswordFields() {

                const disable = notUpdatePassRadio.checked;

                if(disable) {

                    oldPasswordTextbox.disabled = true;
                    newPasswordTextbox.disabled = true;
                    oldPasswordTextbox.value = '';
                    newPasswordTextbox.value = '';
                } else {

                    oldPasswordTextbox.disabled = false;
                    newPasswordTextbox.disabled = false;
                }
            }

            // 読み込み時にパスワード入力ボックス有効化制御を呼び出す
            switchingEnablePasswordFields();

            // 更新しないラジオボタン選択イベント
            notUpdatePassRadio.addEventListener('change', switchingEnablePasswordFields);

            // 更新するラジオボタン選択イベント
            updatePassRadio.addEventListener('change', switchingEnablePasswordFields);
        });
    </script>

@endsection