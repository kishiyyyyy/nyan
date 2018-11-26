@extends('layouts.master')
@section('content')
  <div class="hero-wrapper">

    <h1 class="hero-title">現実から目を逸らしたい<br>そんなときには、猫になる</h1>
    <img class="hero-icon" src="./img/cat01.svg" alt="">
    @if( Auth::user()->is_cat_flg )
      <p>
        <a href="form/returnReal"
          class="btn m-t2"><span class="fab fa-twitter">
            現実に戻る
          </a>
        </p>
        ※Twitterのアイコンが元に戻ります
    @else
    <p>
      <a href=""
        class="btn m-t2"><span class="fab fa-twitter"></span>
        にゃーん
      </a>
    </p>
    ※現在、猫になることはできません。サービス再開までしばらくおまちください。
    @endif
  </div>

@endsection
