<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('user.message.index');
    }
    public function show(Message $message)
    {
        abort_unless($message->user_id == auth()->id(), 403);
        return view('user.message.show', compact('message'));
    }
}
