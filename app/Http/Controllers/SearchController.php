<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    // トップページを表示
    public function showTop(){

        $data = [
            'allow_redirect' => true,
            'start_station' => '',
            'way_stations' => [],
            'goal_station' => '',
            'message' => ''
        ];

        return view('top', ['data' => $data, 'pagetitle' => 'トップ']);
    }

    // ルート検索
    public function searchRoute(Request $request){

        $data = [
            'allow_redirect' => true,
            'start_station' => '',
            'way_stations' => [],
            'goal_station' => '',
            'message' => ''
        ];

        // 出発駅
        $startStation = trim($request['start_station']);

        // 途中駅
        $wayStations = $request->input('way_stations', []);

        // 到着駅
        $goalStation = trim($request['goal_station']);

        // 出発駅および到着駅が未入力
        if(empty($startStation) || empty($goalStation)) {

            $data = [
                'allow_redirect' => true,
                'start_station' => $startStation,
                'way_stations' => $wayStations,
                'goal_station' => $goalStation,
                'message' => '出発駅および到着駅を入力してください。'
            ];

            return view('top', ['data' => $data, 'pagetitle' => 'トップ']);
        }

        // 出発駅および到着駅が同一駅
        if($startStation === $goalStation) {

            $data = [
                'allow_redirect' => true,
                'start_station' => $startStation,
                'way_stations' => $wayStations,
                'goal_station' => $goalStation,
                'message' => '出発駅と到着駅に同一駅は指定できません。'
            ];

            return view('top', ['data' => $data, 'pagetitle' => 'トップ']);
        }

        // 途中駅に重複がある場合

        // 経路検索

        // 最短距離は除外

        // 検索結果一覧に遷移、検索結果を返す

    }
}
