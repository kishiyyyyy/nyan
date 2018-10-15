<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TweetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'tweetservice',
            'App\Services\TweetService'
        );
    }
}
