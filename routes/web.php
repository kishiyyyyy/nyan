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
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Twitter
Route::view('twitterlogin', 'auth.twitterlogin')->name('twitterlogin');

Route::get('auth/login/{provider}', 'Auth\SocialAccountController@redirectToProvider');
//Route::get('auth/login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');
Route::get('oauth/callback/twitter', 'Auth\SocialAccountController@handleProviderCallback');
