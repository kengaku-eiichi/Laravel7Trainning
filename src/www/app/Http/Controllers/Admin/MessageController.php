<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->with('user')->get();
        return view('admin.message.index', compact('messages'));
    }
}
