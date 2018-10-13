@extends('layouts.master')

@section('content')
<div class="hero-wrapper">

  <h1 class="hero-title m-b4">現実から目を逸らしたい<br>そんなときには、猫になる</h1>
  <p class="hero-txt">Twitterで１時間限定で猫になり「にゃーん」とツイートできるサービスです。</p>
  <img class="hero-icon" src="./img/cat01.svg" alt="">
  @if (Auth::check())
    <a href="" class="btn">
    <span class="fab fa-twitter"></span>
      ログインしています
    </a>
  @else
    <a href="auth/login" class="btn">
    <span class="fab fa-twitter"></span>
      Twitterログイン
    </a>
  @endif
</div>

<div class="feature-wrapper">
  <div class="feature-content">
    <img class="feature-icon " src="./img/cat02.svg" alt="">
    <h2 class="feature-subtitle m-b1 m-t1">Twiterのアイコンが猫に</h2>
    <p class="feature-txt">Twitterのアイコンが猫になります。<br>
      １時間後に自動で元のアイコンに戻ります。</p>
  </div>
  <div class="feature-content">
    <img class="feature-icon" src="./img/twitter-white02.svg" alt="">
    <h2 class="feature-subtitle m-b1 m-t1">「にゃーん」とツイート</h2>
    <p class="feature-txt">猫の画像付きでツイートされます。<br>
      フォロワーにも束の間の癒しをプレゼント。</p>
  </div>

</div>
<div class="howto-wrapper">
  <h1 class="howto-title">猫になる方法</h1>
  <div class="howto-content">
    <img class="howto-img" src="./img/howto01.png" alt="">
    <h2 class="howto-subtitle m-b4 m-t2">1. ログインする</h2>
  </div>
  <div class="howto-content">
    <img class="howto-img" src="./img/howto02.png" alt="">
    <h2 class="howto-subtitle m-b4 m-t2">2. にゃーんボタンを押す</h2>
  </div>
  <div class="howto-content">
    <img class="howto-img" src="./img/howto03.png" alt="">
    <h2 class="howto-subtitle m-b4 m-t2">3. ツイートする</h2>
  </div>
</div>

<div class="when-wrapper">
  <h1 class="when-title">色んな場面で</h1>
  <div class="when-content">
    <img class="when-img" src="./img/when01.png" alt="">
    <p class="when-txt">働き疲れて会社に行きたくない時はにゃーんボタンを押して猫になりましょう。</p>
  </div>
  <div class="when-content">
    <img class="when-img" src="./img/when02.png" alt="">
    <p class="when-txt">現実から目を逸らしたい時も。猫になって一旦のんびり考えてみてはいかがですか。</p>
  </div>

</div>

<div class="adv-wrapper">
  <h1 class="adv-title">現実から目を逸らしたい<br>そんなときには、猫になる</h1>
  <a href="auth/login" class="btn">
    <span class="fab fa-twitter"></span>
    Twitterログイン
  </a>
</div>
@endsection
