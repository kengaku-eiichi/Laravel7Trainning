<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laravel7Trainning</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h2>links</h2>
    <ul>
        <li>
            <a href="{{ route('signup.index') }}" target="_blank">ユーザ登録</a>
        </li>
        <li>
            <a href="{{ route('user.login') }}" target="_blank">ユーザログイン</a>
        </li>
        <li>
            <a href="{{ route('admin.login') }}" target="_blank">管理者ログイン</a>
        </li>
    </ul>
</body>

</html>