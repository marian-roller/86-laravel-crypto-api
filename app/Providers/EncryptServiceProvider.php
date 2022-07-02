<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EncryptServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\EncryptServiceInterface', 'App\Service\EncryptService');
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
