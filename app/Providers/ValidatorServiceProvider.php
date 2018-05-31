<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->extend(
            'is_double',
            function ($attibute, $value, $parameters) {
                if (is_double($value) || is_int($value)) {
                    return true;
                }
                return false;
            }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
