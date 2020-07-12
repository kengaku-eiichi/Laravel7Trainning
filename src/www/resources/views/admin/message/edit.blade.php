@extends('layouts.admin')
@section('content')
<h1>メッセージ{{ $message->exists ? '変更' : '登録' }}</h1>
<form method="post">
    @csrf
    <ul>
        <li>
            <label>誰宛</label>
            <select name="user_id">
                <option value="">選択…</option>
                @foreach ($userlist as $user_id => $username)
                <option value="{{ $user_id }}" @if (old('user_id', $message->user_id) == $user_id) selected @endif>{{ $username }}</option>
                @endforeach
            </select>
            @error('user_id')
            <p class="err-box">{{ $message }}</p>
            @enderror
        </li>
        <li>
            <label>タイトル</label>
            <input type="text" name="title" size="50" value="{{ old('title', $message->title) }}">
            @error('title')
            <p class="err-box">{{ $message }}</p>
            @enderror
        </li>
        <li>
            <label>本文</label>
            <textarea name="content" cols="60" rows="10">{{ old('content', $message->content) }}</textarea>
            @error('content')
            <p class="err-box">{{ $message }}</p>
            @enderror
        </li>
    </ul>
    @if (session('status'))
    <p class="info-box">{{ session('status') }}</p>
    @endif
    <input type="submit" value="{{ $message->exists ? '変更する' : '登録する' }}">
</form>
@endsection