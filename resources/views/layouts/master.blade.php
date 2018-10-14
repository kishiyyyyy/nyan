<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

  <!--  Meta  -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name=viewport content="width=device-width,initial-scale=1">
	<meta name="description" content="現実から目を逸らしたい そんなときには、猫になる。
  Twitterで１時間限定で猫になり「にゃーん」とツイートできるサービスです。">
	<meta name="keywords" content="nyan">
	<meta property="og:title" content="nyan"/>
	<meta property="og:description" content="現実から目を逸らしたい そんなときには、猫になる。
  Twitterで１時間限定で猫になり「にゃーん」とツイートできるサービスです。"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="https://nyan-iritec.herokuapp.com"/>
	<meta property=”og:locale” content=”ja_JP”/>
	<meta property="og:image" content="https://nyan-iritec.herokuapp.com/public/img/ogp.png"/>
	<meta property="image_src" content="https://nyan-iritec.herokuapp.com/public/img/ogp.png">
	<meta property="fb:app_id" content="2251191688483866"/>
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@nyan_iritec">
	<meta name="twitter:title" content="nyan | 猫になる">
	<meta name="twitter:description" content="現実から目を逸らしたい そんなときには、猫になる。
  Twitterで１時間限定で猫になり「にゃーん」とツイートできるサービスです。"/>
	<meta name="twitter:image" content="https://nyan-iritec.herokuapp.com/public/img/ogp.png">
=======
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127122553-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-127122553-1');
</script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  
  <title>nyan | 猫になる</title>
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
  <p><a href="{{ route('identity') }}">サービス理念</a> ｜ <a href="{{ route('kiyaku') }}">利用規約</a> ｜ <a href="{{ route('privacy') }}">プライバシーポリシー</a> ｜ <a href="https://nyan-iritec.booth.pm/">nyan公式グッズショップ</a> ｜ <a href="https://form.run/@iritec-nyan-2222">お問い合わせ</a></p>
  <div class="offical-account-link">
    <a href="https://twitter.com/nyan_iritec" target="_blank"><span class="fab fa-twitter"></span>nyan公式アカウント</a>
  </div>
  <p>©irie development. All rights reserved.</p>
</footer>

</body>
</html>
