<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@section('title')@show - Laravle7Trainning</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <p>ようこそ、{{ auth()->user()->name }}さん</p>
    <ul>
        <li><a href="{{ route('user.top') }}">ユーザTOP</a></li>
        <li><a href="{{ route('user.profile.edit') }}">登録情報変更</a></li>
        <li><a href="{{ route('user.message') }}">メッセージ一覧</a></li>
        <li><a href="{{ route('user.logout') }}">ログアウト</a></li>
    </ul>
    @yield('content')
</body>

</html>