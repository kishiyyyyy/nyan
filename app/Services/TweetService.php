<?php

namespace App\Services;

/**
 * Tweet関連の処理を記載する.
 *
 * Class TweetService
 * @package App\Services
 */
class TweetService
{

    /**
     * image フォルダから1件のファイル名を選択する
     *
     * @return 画像あり：ファイル名　画像なし：false
     */
    public static function selectedRandomImage()
    {
        $image_list = glob('images/*');

        if (!$image_list) {
            return false;
        }

        $image_name = $image_list[array_rand($image_list, 1)];

        return $image_name;
    }
}
