<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ログイン画面を表示
    public function showLogin() {

        // ログイン済みの場合は現在のページに留まる
        if(Auth::check()) {

            return back();
        }

        // ログイン前にアクセスしようとしていたURL
        $intended = session('url.intended');

        // デフォルトの戻り先にトップページを指定
        $backUrl = route('top');

        // ログイン前のアクセス先が存在する場合
        if($intended) {

            // intended URLからクエリ文字列を取得
            $query = parse_url($intended, PHP_URL_QUERY);

            // クエリ文字列を配列に変換
            parse_str($query, $params);

            // backパラメータが存在する場合はそのURLを、存在しない場合はトップページを戻り先とする
            $backUrl = $params['back'] ?? route('top');
        }

        $data = array();

        $data = [
            'email' => '',
            'back_url' => $backUrl,
            'message' => ''
        ];

        return view('login', ['data' => $data, 'pagetitle' => 'ログイン']);
    }

    // ログイン
    public function login(Request $request) {

        // ログイン済みの場合は現在のページに留まる
        if(Auth::check()) {

            return back();
        }

        // ログイン後の戻り先
        $backUrl = request()->input('back');

        $data = array();

        $data = [
            'email' => '',
            'back_url' => $backUrl,
            'message' => ''
        ];

        $email = $request->input('email');
        $password = $request->input('password');

        // メールアドレスまたはパスワードが未入力
        if(empty($email) || empty($password)) {

            $data = [
                'email' => $email,
                'back_url' => $backUrl,
                'message' => 'ユーザーIDおよびパスワードを入力してください。'
            ];

            return view('login', ['data' => $data, 'pagetitle' => 'ログイン']);
        }

        $loginData = [
            'email' => $email,
            'password' => $password
        ];

        // ログイン処理
        if(Auth::attempt($loginData)) {

            // セッションを有効化
            $request->session()->regenerate();

            // 元ページへ、元ページが存在しなければトップページへ遷移
            return redirect()->intended($backUrl ?: route('top'));
        }
            
        $data = [
            'email' => $email,
            'back_url' => $backUrl,
            'message' => 'メールアドレスまたはパスワードが違います。'
        ];

        return view('login', ['data' => $data, 'pagetitle' => 'ログイン']);
    }

    // ログアウト
    public function logout(Request $request) {

        // ログアウト後の戻り先
        $backUrl = request()->input('back');

        // ログアウト処理
        Auth::logout();

        // セッションを無効化
        $request->session()->invalidate();

        // CSRFトークンを再生性
        $request->session()->regenerateToken();

        // リダイレクト許可フラグ
        $allowRedirect = $request->boolean('allow_redirect');

        // 認証不要ページの場合は元ページに留まる
        if(!empty($allowRedirect) && $allowRedirect) {
            
            return redirect()->back();
        }

        // トップページへ遷移
        return redirect($backUrl ?: route('top'));
    }
}
