<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('top');
});


Route::get('/home', 'HomeController@index')->name('home');

// Twitter login
Route::get('auth/login', 'Auth\SocialAccountController@redirectToProvider');
Route::get('oauth/callback/twitter', 'Auth\SocialAccountController@handleProviderCallback');

//twitter logout
Route::get('auth/logout', 'Auth\SocialAccountController@logout')->name('logout');

// 投稿ページ
Route::get('/form', function() {
    // ログイン済み
    if ( Auth::check()) {
        return view('form');
    }
})->name('form');

// サービス理念
Route::get('/identity', function () {
    return view('identity');
})->name('identity');


// 利用規約
Route::get('/kiyaku', function () {
    return view('kiyaku');
})->name('kiyaku');

// プライバシーポリシー
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

// エラー画面
Route::get('/error', function () {
    return view('error');
})->name('error');

