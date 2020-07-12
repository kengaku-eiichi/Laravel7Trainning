@extends('layouts.admin')
@section('content')
<h1>メッセージ一覧</h1>
<table border="1">
    <tr>
        <th>変更</th>
        <th>誰宛</th>
        <th>タイトル</th>
        <th>本文</th>
    </tr>
    @foreach($messages as $message)
    <tr>
        <td><a href="{{ route('admin.message.edit', $message) }}">変更</a> </td>
        <td>{{ $message->user->name }}</td>
        <td>{{ $message->title }}</td>
        <td>{{ Str::limit($message->content, 50) }}</td>
    </tr>
    @endforeach
</table>
@endsection