<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TweetService;

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

        $token = session()->get('token');
        $token_secret = session()->get('tokenSecret');

        $img_path = TweetService::selectedRandomImage();

        if (!$img_path ) {
                return redirect()->route('error');
        }

        $cat_image_path = $img_path;

        // セッションに猫状態を保持
        session()->put('cat_image_path', $cat_image_path);

        // プロフィール画像変更
        TweetService::uploadTwitterProfile($token, $token_secret, $cat_image_path);

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
        session()->put('cat_image_path', null);

        // プロフィール画像を元に戻す
        $token = session()->get('token');
        $token_secret = session()->get('tokenSecret');
        $image_path = session()->get('profile_image_path');

        TweetService::uploadTwitterProfile($token, $token_secret, $image_path);

        return redirect()->route('form');

    }

}
