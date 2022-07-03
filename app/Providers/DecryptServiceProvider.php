<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DecryptServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\DecryptServiceInterface', 'App\Service\DecryptService');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
