<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Socialite;
use Illuminate\Support\Facades\Storage;

use TweetService;

class SocialAccountController extends Controller
{
    // Twitter サービスへリダイレクト
    public function redirectToProvider() {

        return Socialite::driver('twitter')->redirect();

    }

    // Twitter サービスからのコールバック
    public function handleProviderCallback() {

        try {

            $twitter_user = Socialite::driver('twitter')->user();
            $user = User::where('twitter_id', $twitter_user->getId())->first();

            if ( blank($user) ) {

                $user = User::create([
                    'twitter_id' => $twitter_user->getId(),
                    'email' => $twitter_user->getEmail(),
                    'avatar' => $twitter_user->avatar_original,
                    'name' => $twitter_user->getName(),
                    'nickname' => $twitter_user->getNickname(),
                  ]);
            } else {
                $user->email = $twitter_user->getEmail();

                //ユーザが猫ではない時はavaterを上書きする
                if (!($user->is_cat_flg)){
                  $user->avatar = $twitter_user->avatar_original;
                }

                $user->name = $twitter_user->getName();
                $user->nickname = $twitter_user->getNickname();
                $user->save();

            }

            // 画像保存する
            $contents = file_get_contents($user->avatar);
            $disk = Storage::disk('public');
            $disk->put($user->image_path() . $user->image_file(), $contents);

            //Userテーブルのimgpathカラムに画像のパスを格納する
            $user->img_path =storage_path() . '/app/public/users_image/' . $user->image_file();

            //Userテーブルにtokenを保存する
            $user->token=$twitter_user->token;
            $user->token_secret=$twitter_user->tokenSecret;

            $user->save();

            // ログイン
            auth()->login($user, true);

            // 投稿画面へ遷移
            return redirect()->route('form');

        } catch (\Exception $e) {
            // エラー画面へ遷移
            dd($e);
            return redirect()->route('error');
        }
    }

    public function logout(){
      try {
       //ログイン済みユーザをセット
       $user = Auth::user();

        // プロフィール画像を元に戻す
        $token = $user->token;
        $token_secret = $user->token_secret;

        TweetService::uploadTwitterProfile($token, $token_secret, $user->img_path);

        $user->is_cat_flg=0;
        $user->save();

        Auth::logout();
        return redirect("/");
      } catch (\Exception $e) {
          // エラー画面へ遷移
          dd($e);
          return redirect()->route('error');
        }
    }
}
