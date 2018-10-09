<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Socialite;
use Illuminate\Support\Facades\Storage;

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
                    'avatar' => $twitter_user->getAvatar(),
                    'name' => $twitter_user->getName(),
                    'nickname' => $twitter_user->getNickname(),
                ]);

            } else {

                $user->email = $twitter_user->getEmail();
                $user->avatar = $twitter_user->getAvatar();
                $user->name = $twitter_user->getName();
                $user->nickname = $twitter_user->getNickname();

                $user->save();

            }

            // ログイン
            auth()->login($user, true);

            // 画像保存
            $contents = file_get_contents($user->avatar);
            $disk = Storage::disk('public');
            $disk->put($user->image_path() . $user->image_file(), $contents);

            // 投稿画面へ遷移
            return redirect()->route('form');

        } catch (\Exception $e) {
            // エラー時の表示は検討する。
            dd($e);
            return redirect("/");
        }
    }

    public function logout(){
      Auth::logout();
      return redirect("/");
    }
}
