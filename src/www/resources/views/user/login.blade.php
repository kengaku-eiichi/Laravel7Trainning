<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ユーザログイン</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h2>ユーザログイン</h2>
    <form method="post">
        @csrf
        <ul>
            <li>
                <label>メールアドレス</label>
                <input type="text" name="email" value="{{ old('email') }}">
                @error('email')
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