<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FeedProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		
       $this->app->bind('Feed', function(){
            return new \App\Classes\Feed;
        });
    }
}