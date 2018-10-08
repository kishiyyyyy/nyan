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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>nyan | 猫になる</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
  <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>
  <header>
    <h1 class="logo-wrapper">
      <div class="left-space"> 　　</div>
      <div class="center-logo"><a href="#"><img class="logo" src="./img/nyan.png" alt=""></a></div>
      <div class="right-user"><a href="#"><img class="user-icon" src="{{ Auth::user()->avatar }}" alt=""></a>
    </h1>
  </header>

@yield('content')

<footer>
  <p><a href="#">利用規約</a>　｜　<a href="#">プライバシーポリシー</a></p>
  <p>©irie development. All rights reserved.</p>
</footer>

</body>
</html>
