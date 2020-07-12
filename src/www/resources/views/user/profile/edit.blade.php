@extends('layouts.user')
@section('title', '登録情報変更')
@section('content')
<h1>登録情報変更</h1>
<form method="post">
    @csrf
    <ul>
        <li>
            <label>名前</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}">
            @error('name')
            <p class="err-box">{{ $message }}</p>
            @enderror
        </li>
        <li>
            <label>メールアドレス</label>
            <input type="text" name="email" value="{{ old('email', auth()->user()->email) }}">
            @error('email')
            <p class="err-box">{{ $message }}</p>
            @enderror
        </li>
    </ul>
    @if (session('status'))
    <p class="info-box">{{ session('status') }}</p>
    @endif
    <input type="submit" value="更新する">
</form>
@endsection