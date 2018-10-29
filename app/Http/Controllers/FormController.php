<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use TweetService;
use App\User;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    //

    /**
     *
     *  にゃーんボタン押下
     *
     */
    public function commandNyan()
    {

      //ログイン済みユーザをセッティング
      $user = Auth::user();

      $token = session()->get('token');
      $token_secret = session()->get('tokenSecret');

      //$img_path = $user->imgpath;
      $user->cat_img_path = TweetService::selectedRandomImage();

      if (!$user->img_path) {
              return redirect()->route('error');
      }

      $cat_image_path = $user->cat_imgpath;

      // セッションに猫状態を保持
      //session()->put('cat_image_path', $cat_image_path);

      // プロフィール画像変更
      TweetService::uploadTwitterProfile($token, $token_secret, $user->cat_img_path);
      $user->cat_flg=1;
      $user->save();

      // ツイート作成
      $message = self::makeTweet();
      // ツイート
      TweetService::updateTweet($token, $token_secret, $message);

      return redirect()->route('form');


    }

    /**
    *
    * ツイート文言の作成
    *
    */
    public function makeTweet()
    {
      $message = "にゃーん #nyan https://nyan-iritec.herokuapp.com";
      return $message;
    }

    /**
     *
     *  現実に戻るボタン押下
     *
     */
    public function returnReal()
    {

        // セッションに人間状態を保持
        //session()->put('cat_image_path', null);

        //ログイン済みユーザをセッティング
        $user = Auth::user();

        // プロフィール画像を元に戻す
        $token = session()->get('token');
        $token_secret = session()->get('tokenSecret');

        //$image_path = $user->imgpath;
        //$profile_image_path = $user->imgpath;

        TweetService::uploadTwitterProfile($token, $token_secret, $image_path);
        $user->cat_flg=1;
        $user->save();

        return redirect()->route('form');

    }

}
