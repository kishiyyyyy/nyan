<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Socialite;

class SocialAccountController extends Controller
{
    // 各認証サービスへリダイレクト
    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    // 認証サービスからのコールバック
    public function handleProviderCallback($provider) {

        try {
            $providerUser = Socialite::driver($provider)->user();

            // とりあえず、twitter 情報が取得できているか。
            dd($providerUser);


        } catch (\Exception $e) {
            return redirect("/");
        }

    }

}
