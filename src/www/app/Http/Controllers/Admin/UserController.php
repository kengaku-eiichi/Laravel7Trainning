<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->withCount('messages')->get();
        return
            view('admin.user.index', compact('users'));
    }
    public function delete(Request $request)
    {
        User::findOrFail($request->input('id'))->delete();
        return ['success' => true];
    }
}
