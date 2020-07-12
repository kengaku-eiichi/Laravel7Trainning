<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Http\Requests\SaveMessage;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->with('user')->get();
        return view('admin.message.index', compact('messages'));
    }
    public function create(Message $message)
    {
        $userlist = User::list();
        return view('admin.message.edit', compact('message', 'userlist'));
    }
    public function store(SaveMessage $request, Message $message)
    {
        $message->fill($request->validated())->save();
        return redirect(route('admin.message.edit', $message))->with('status',  '登録しました');
    }
    public function edit(Message $message)
    {
        $userlist = User::list();
        return view('admin.message.edit', compact('message', 'userlist'));
    }
    public function update(SaveMessage $request, Message $message)
    {
        $message->fill($request->validated())->save();
        return redirect(route('admin.message.edit', $message))->with('status',  '変更しました');
    }
}
