@extends('layouts.user')
@section('title', 'メッセージ一覧')
@section('content')
<h1>メッセージ一覧</h1>
<table border="1">
    <tr>
        <th>No.</th>
        <th>登録日</th>
        <th>タイトル</th>
        <th>本文</th>
    </tr>
    @foreach (auth()->user()->messages as $key => $message)
    <tr>
        <td><a href="{{ route('user.message.show', $message) }}">{{ $key+1 }}</a></td>
        <td>{{ $message->created_at }}</td>
        <td>{{ $message->title }}</td>
        <td>{{ Str::limit($message->content, 50) }}</td>
    </tr>
    @endforeach
</table>
@endsection