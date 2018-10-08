<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <title>nyan | 猫になる</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" type="text/css" href="./css/normalize.css">
  <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <header>
      <a href="#"><img class="logo" src="./img/nyan.png" alt=""></a>
      @if(Auth::check())
        <details class="account">
          <summary>
            <a href="#"><img class="user-icon" src="./img/user.png" alt=""></a>
          </summary>
          <div class="account-nav">
            <a href="#" class="account-nav-item">ログアウト</a>
          </div>
        </details>
      @endif
  </header>


@yield('content')

<footer>
  <p><a href="#">利用規約</a>　｜　<a href="#">プライバシーポリシー</a></p>
  <p>©irie development. All rights reserved.</p>
</footer>

</body>
</html>
