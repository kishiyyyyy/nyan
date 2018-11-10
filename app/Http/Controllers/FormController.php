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

        $user->cat_img_path = TweetService::selectedRandomImage();

        if (!$user->img_path) {
              return redirect()->route('error');
        }

        $user->is_cat_flg=1;
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
        //ログイン済みユーザをセッティング
        $user = Auth::user();

        // プロフィール画像を元に戻す
        $token = session()->get('token');
        $token_secret = session()->get('tokenSecret');

        TweetService::uploadTwitterProfile($token, $token_secret, $user->img_path);
        $user->is_cat_flg=0;
        $user->save();
        return redirect()->route('form');

    }

}
