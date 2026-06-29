@extends('layouts.app')

@section('title', $pagetitle)

@section('content')

    <h2 class="page-title">{{ $pagetitle }}</h2>

    <p>
        首都圏近郊区間内の大回り乗車のルートを検索します。<br>
        始発駅および到着駅、必要に応じて途中駅を入力してください。
    </p>

    @if(isset($data['message']))
        <p>{{ $data['message'] }}</p>
    @endif

    <div class="route-search-area">
        <form action="{{ route('routelist') }}" method="GET">
            出発駅
            <input type="text" value="{{ $data['start_station'] }}" name="start_station"><br>
            <div id="way_stations"></div>
            <button type="button" id="add_station_button">+途中駅を追加</button><br>
            到着駅
            <input type="text" value="{{ $data['goal_station'] }}" name="goal_station"><br>
            <button>検索</button>
        </form>
    </div>

    <div class="action-area">
    </div>

    <script>
        // 途中駅入力欄の生成
        function createWayStation(value = "") {

            // nullの場合は空文字列に変換
            value = value ?? "";

            // 途中駅入力欄全体を格納するdiv要素を作成
            const div = document.createElement("div");

            // 途中駅入力欄のHTMLを作成
            div.innerHTML = `
                途中駅
                <input type="text" name="way_stations[]" value="${value}">
                <button type="button">-削除</button>
            `;

            // 作成された入力欄内の削除ボタンを取得
            const removeButton = div.querySelector("button");

            // 削除ボタンクリック時、対応する途中駅入力欄を削除
            removeButton.addEventListener("click", function () {

                div.remove();
            });

            // 作成した途中駅入力欄を返す
            return div;
        }

        // サーバから受け取った途中駅一覧を取得
        const stations = @json($data['way_stations']);

        // 保持されている途中駅を画面に復元
        stations.forEach(function(station){

            document.getElementById("way_stations").appendChild(createWayStation(station));
        });

        // 途中駅を追加ボタンクリック時の処理
        document.getElementById("add_station_button").addEventListener("click", function () {

            // 途中駅入力欄を追加
            document.getElementById("way_stations").appendChild(createWayStation());
        });
    </script>

@endsection