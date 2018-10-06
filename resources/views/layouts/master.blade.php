<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <title>nyan | 猫になる</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
  <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <header>
    <h1 class="logo-wrapper">
      <div class="left-space"></div>
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
