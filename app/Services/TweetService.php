<?php

namespace App\Services;

/**
 * Tweet関連の処理を記載する.
 *
 * Class TweetService
 * @package App\Services
 */

use Abraham\TwitterOAuth\TwitterOAuth;

class TweetService
{

    /**
     * image フォルダから1件のファイル名を選択する
     *
     * @return 画像あり：ファイル名　画像なし：false
     */
    public static function selectedRandomImage()
    {
        $image_list = glob(public_path() . '/img/cats/*');

        if (!$image_list) {
            return false;
        }

        $image_name = $image_list[array_rand($image_list, 1)];

        return $image_name;
    }

    /**
     *
     * Twitterにプロフィール画像をアップロード
     *
     */
    public function uploadTwitterProfile($token, $token_secret, $image_path) {

        $consumer_key = env('TWITTER_CLIENT_ID');
        $consumer_secret = env('TWITTER_CLIENT_SECRET');
        $image = base64_encode(file_get_contents( $image_path ));

        $to = new TwitterOAuth( $consumer_key,
                                $consumer_secret,
                                $token,
                                $token_secret);

        $req = $to->post('account/update_profile_image', array('image' => $image));
        return $req;

    }

    /**
     *
     *  つぶやく
     *
     */
    public function updateTweet($token, $token_secret, $status) {

        $consumer_key = env('TWITTER_CLIENT_ID');
        $consumer_secret = env('TWITTER_CLIENT_SECRET');

        $to = new TwitterOAuth( $consumer_key,
                                $consumer_secret,
                                $token,
                                $token_secret);

        $req = $to->post("statuses/update", array("status" => $status));

        return $req;

    }

}
