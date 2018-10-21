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

        // 初回のみ、ランダムなネコ画像を取得
        if ( !session()->has('cat_image_path') ) {
            $img_path = TweetService::selectedRandomImage();

            if (!$img_path ) {
                return redirect()->route('error');
            }

            $cat_image_path = $img_path;

            // 状態
            session()->put('cat_image_path', $cat_image_path); //私はネコです。

            // プロフィール画像変更
            TweetService::uploadTwitterProfile($token, $token_secret, $cat_image_path);
        }

        // ツイート作成
        $message = self::makeTweet();

        // ツイート
        TweetService::updateTweet($token, $token_secret, $message );

        return redirect()->route('form');

    }

    /**
     *
     * ツイート文言の作成
     *
     */
    public function makeTweet() {

        $message = "";

        // deplication エラー回避のため
        $j = rand(0, 50);
        $message = "にゃ";
        for ($i = 0; $i <= $j; $i++ ) {
            $message = $message . "〜";
        }
        $message = $message . "ん";

        //ランダムでカタカナに変換
        $kana = false;
        if (rand(0,2) == 2) {
            $kana = true;
        }

        if ($kana) {
            $message = mb_convert_kana($message, "KVC");
        }

        // エクステンションつける
        if (rand(0,3) == 1) {
            $message = $message . "！";
        }

        $message = $message . " #nyan";

        return $message;

    }


    /**
     *
     *  現実に戻るボタン押下
     *
     */
    public function returnReal()
    {

        session()->put('cat_image_path', null); // 私はネコではない

        // プロフィール画像を元に戻す
        $token = session()->get('token');
        $token_secret = session()->get('tokenSecret');
        $image_path = session()->get('profile_image_path');

        TweetService::uploadTwitterProfile($token, $token_secret, $image_path);

        return redirect()->route('form');

    }

}
