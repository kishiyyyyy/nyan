@extends('layouts.master')
@section('content')
  <div class="hero-wrapper">

    <h1 class="hero-title">現実から目を逸らしたい<br>そんなときには、猫になる</h1>
    <img class="hero-icon" src="./img/cat01.svg" alt="">
    @if( !(Request::session()->has('cat_image_path')) )
      <p>
        <a href="form/nyan"
          class="btn m-b4 m-t2"><span class="fab fa-twitter"></span>
          にゃーん
        </a>
      </p>
    @else
      <p>
        <a href="form/returnReal"
          class="btn m-b4 m-t2"><span class="fab fa-twitter">
          現実に戻る
        </a>
      </p>
    @endif
  </div>

@endsection
