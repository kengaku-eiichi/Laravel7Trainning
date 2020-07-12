<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function redirectTo()
    {
        return route('admin.top');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    protected function validateLogin(Request $request)
    {
        $messages = [
            $this->username() . '.required' => 'ログインIDを入力して下さい。',
            'password.required' => 'パスワードを入力して下さい。',
        ];
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ], $messages);
    }
    public function username()
    {
        return 'username';
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        if (auth('user')->guest()) {
            $request->session()->invalidate();
        }
        return redirect(route('admin.login'));
    }
    protected function guard()
    {
        return auth('admin');
    }
}
