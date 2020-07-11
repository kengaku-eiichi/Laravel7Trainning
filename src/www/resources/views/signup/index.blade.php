<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>登録画面</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <form method="post">
        @csrf
        <ul>
            <li>
                <label>名前</label>
                <input type="text" name="name" value="{{ $user->name }}">
                @error('name')
                <p class="err-box">{{ $message }}</p>
                @enderror
            </li>
            <li>
                <label>メールアドレス</label>
                <input type="text" name="email" value="{{ $user->email }}">
                @error('email')
                <p class="err-box">{{ $message }}</p>
                @enderror
            </li>
            <li>
                <label>パスワード</label>
                <input type="password" name="password">（8～30文字）
                @error('password')
                <p class="err-box">{{ $message }}</p>
                @enderror
            </li>
            <li>
                <label>パスワード（確認用）</label>
                <input type="password" name="password_confirmation">
                @error('password_confirmation')
                <p class="err-box">{{ $message }}</p>
                @enderror
            </li>
            <li>
                <label>入会理由</label>
                <input type="text" name="reason" value="{{ $user->reason }}">
                @error('reason')
                <p class="err-box">{{ $message }}</p>
                @enderror
            </li>
        </ul>
        <input type="submit" value="確認画面へ">
    </form>
</body>

</html>