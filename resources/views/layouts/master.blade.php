<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127122553-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-127122553-1');
</script>

  <meta charset="utf-8">
  <title>nyan | 猫になる</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" type="text/css" href="./css/normalize.css">
  <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
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
            <a href="/auth/logout" class="account-nav-item">ログアウト</a>
          </div>
        </details>
      @endif
  </header>


@yield('content')

<footer>
  <p><a href="{{ route('identity') }}">サービス理念</a> ｜ <a href="{{ route('kiyaku') }}">利用規約</a> ｜ <a href="{{ route('privacy') }}">プライバシーポリシー</a> ｜ <a href="https://form.run/@iritec-nyan-2222">お問い合わせ</a></p>
  <div class="offical-account-link">
    <a href="https://twitter.com/nyan_iritec" target="_blank"><span class="fab fa-twitter"></span>nyan公式アカウント</a>
  </div>
  <p>©irie development. All rights reserved.</p>
</footer>

</body>
</html>
