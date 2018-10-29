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
                $user->avatar = $twitter_user->avatar_original;
                $user->name = $twitter_user->getName();
                $user->nickname = $twitter_user->getNickname();
                $user->save();

            }

            // 画像保存する
            $contents = file_get_contents($user->avatar);
            $disk = Storage::disk('public');
            $disk->put($user->image_path() . $user->image_file(), $contents);

            //Userテーブルのimgpathカラムに画像のパスを格納する
            $user->img_path = storage_path();
            $user->save();

            //session()->put('profile_image_path', storage_path() . '/app/public/users_image/' . $user->image_file());

            // OAuth One プロバイダ
            $token = $twitter_user->token;
            $token_secret = $twitter_user->tokenSecret;

            // セッションにトークンを保存
            session()->put('token', $token);
            session()->put('tokenSecret', $token_secret);

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
        $token = session()->get('token');
        $token_secret = session()->get('tokenSecret');
        //$profile_image_path = session()->get('profile_image_path');
        //$profile_image_path = $user->imgpath;

        TweetService::uploadTwitterProfile($token, $token_secret, $user->img_path);
        $user->cat_flg=0;
        //session()->put('cat_image_path', null);
        //session()->put('profile_image_path', null);

        Auth::logout();
        return redirect("/");

        } catch (\Exception $e) {
           // エラー画面へ遷移
           dd($e);
           return redirect()->route('error');
       }
    }
}
