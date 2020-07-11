<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SignupController extends Controller
{
    protected $sessionKey = 'SignupData';

    public function index(User $user)
    {
        if ($data = old() ?: session($this->sessionKey)) {
            $user->fill($data);
        }

        return view('signup.index', compact('user'));
    }

    public function postIndex(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email:filter|unique:users',
            'password' => 'required|confirmed|between:8,30|regex:/^[!-~]+$/',
            'reason' => 'checkBadGuy|max:255',
        ]);
        $data['password'] = bcrypt($data['password']);
        session([$this->sessionKey => $data]);
        return redirect(route('signup.confirm'));
    }

    public function confirm(User $user)
    {
        if (!$data = session($this->sessionKey)) {
            return redirect(route('signup.index'));
        }
        $user->fill($data);
        return view('signup.confirm', compact('user'));
    }

    public function postConfirm(User $user)
    {
        if (!$data = session($this->sessionKey)) {
            return redirect(route('signup.index'));
        }
        $user->fill($data)->save();
        auth('user')->login($user);
        session()->forget($this->sessionKey);
        return redirect(route('signup.thanks'));
    }

    public function thanks()
    {
        return view('signup.thanks');
    }
}
