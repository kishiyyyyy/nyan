<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Socialite;

class SocialAccountController extends Controller
{
    // Twitter サービスへリダイレクト
    public function redirectToProvider() {

        return Socialite::driver('twitter')->redirect();

    }

    // 認証サービスからのコールバック
    public function handleProviderCallback() {

        try {
            
            $providerUser = Socialite::driver('twitter')->user();

            // とりあえず、twitter 情報が取得できているか。
            dd($providerUser);


        } catch (\Exception $e) {
            return redirect("/");
        }

    }

}
