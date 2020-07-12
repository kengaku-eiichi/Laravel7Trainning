<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.profile.edit');
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email:filter|unique:users,email,' . auth()->id(),
        ]);
        auth()->user()->update($data);
        return redirect(route('user.profile.edit'))->with('status', '更新しました');
    }
}
