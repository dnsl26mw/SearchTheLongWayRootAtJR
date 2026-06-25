<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    // トップページを表示
    public function showTop(){

        $data = [
            'allow_redirect' => true
        ];

        return view('top', ['data' => $data, 'pagetitle' => 'トップ']);
    }
}
