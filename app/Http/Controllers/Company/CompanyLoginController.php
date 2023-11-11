<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CompanyLoginController extends Controller
{
    // ログイン画面呼び出し
    public function showLoginPage(): View
    {
        return view('companies.auth.login');
    }

    // ログイン実行
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('company')->attempt($credentials)) {
            return redirect()->route('portfolios.index')->with([
                'login_msg' => 'ログインしました。',
            ]);
        }

        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('company')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // セッション削除追加
        Session::flush();

        // ログアウトしたらログインフォームにリダイレクト
        return redirect()->route('jobs.index')->with([
            'logout_msg' => 'ログアウトしました',
        ]);
    }
}
