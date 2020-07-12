<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>管理者</title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<ul>
    <li><a href="/admin/user">ユーザ一覧</a></li><!-- ToDo route に変更する -->
    <li><a href="{{ route('admin.message.create') }}">メッセージ登録</a></li>
    <li><a href="{{ route('admin.message') }}">個別ユーザへのメッセージ</a></li>
    <li><a href="{{ route('admin.logout') }}">ログアウト</a></li>
</ul>
@yield('content')

</html>