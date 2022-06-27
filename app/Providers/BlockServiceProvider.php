<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BlockServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\BlockServiceInterface', 'App\Service\BlockService');
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
