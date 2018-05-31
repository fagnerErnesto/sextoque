<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\File;

class FileServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Services\Contracts\FileInterface', function ($app) {
            return new File();
        });
    }
}
