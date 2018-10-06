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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Twitter
Route::view('twitterlogin', 'auth.twitterlogin')->name('twitterlogin');

Route::get('auth/login', 'Auth\SocialAccountController@redirectToProvider');
Route::get('oauth/callback/twitter', 'Auth\SocialAccountController@handleProviderCallback');
