<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'twitter_id', 'email', 'avatar', 'name', 'nickname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // ユーザー画像保存フォルダ
    public function image_path() : string {
        return 'users_image\\';
    }

    // ユーザー画像ファイル名
    public function image_file() :string {
        return $this->twitter_id . '.jpg';
    }
}
