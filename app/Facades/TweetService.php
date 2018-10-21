<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TweetService extends Facade{
  protected static function getFacadeAccessor(){
  return 'tweetservice';
  }
}
