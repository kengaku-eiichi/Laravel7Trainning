<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>管理者ログイン</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h2>管理者ログイン</h2>
    <form method="post">
        @csrf
        <ul>
            <li>
                <label>ログインID</label>
                <input type="text" name="username" value="{{ old('username') }}">
                @error('username')
                <p class="err-box">{{ $message }}</p>
                @enderror
            </li>
            <li>
                <label>パスワード</label>
                <input type="password" name="password">
                @error('password')
                <p class="err-box">{{ $message }}</p>
                @enderror
            </li>
        </ul>
        <input type="submit" value="ログイン">
    </form>
</body>

</html>