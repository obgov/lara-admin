<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MainService;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Services\MainService', function($app){
            return new MainService();
        });
    }
}
