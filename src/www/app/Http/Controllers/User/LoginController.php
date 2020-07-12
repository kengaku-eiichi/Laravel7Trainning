<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function redirectTo()
    {
        return route('user.top');
    }
    public function showLoginForm()
    {
        return view('user.login');
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ], [
            $this->username() . '.required' => 'メールアドレスを入力して下さい。',
            'password.required' => 'パスワードを入力して下さい。',
        ]);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        if (auth('admin')->guest()) {
            $request->session()->invalidate();
        }
        return redirect(route('user.login'));
    }
    protected function guard()
    {
        return auth('user');
    }
}
