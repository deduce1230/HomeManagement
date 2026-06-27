<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>

<h2>ログイン</h2>

@if ($errors->any())
    <div style="color:red;">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        メールアドレス<br>
        <input type="email" name="email" required autofocus>
    </div>

    <br>

    <div>
        パスワード<br>
        <input type="password" name="password" required>
    </div>

    <br>

    <button type="submit">
        ログイン
    </button>
    <label>
        <input type="checkbox" name="remember">
        次回からログインを省略する
    </label>

</form>

</body>
</html>
