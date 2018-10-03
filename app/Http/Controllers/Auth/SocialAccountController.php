<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Socialite;

class SocialAccountController extends Controller
{
    // Twitter サービスへリダイレクト
    public function redirectToProvider($provider) {
//dd($provider);

        return Socialite::driver($provider)->redirect();

        // return Socialite::driver('twitter')->with(['fource_url' => true ])->redirect();
    }

    // 認証サービスからのコールバック
    public function handleProviderCallback() {
dd('aa');

        try {
            $providerUser = Socialite::driver($provider)->user();

            // とりあえず、twitter 情報が取得できているか。
            dd($providerUser);


        } catch (\Exception $e) {
            return redirect("/");
        }

    }

}
