<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Socialite;

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

            // twitter 情報が取得できているか、投稿ページができたら書き換える。
            dd($user, $twitter_user->getId(), $twitter_user->getNickname(), $twitter_user);


        } catch (\Exception $e) {
            dd($e);
            return redirect("/");
        }

    }

}
