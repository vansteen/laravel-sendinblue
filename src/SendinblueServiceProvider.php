<?php

namespace Vansteen\Sendinblue;

use Illuminate\Support\ServiceProvider;

class SendinblueServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            // Publishing the configuration file. Use :
            // php artisan vendor:publish --provider="Vansteen\Sendinblue\SendinblueServiceProvider"
            $this->publishes([
                __DIR__.'/../config/sendinblue.php' => config_path('sendinblue.php'),
            ], 'sendinblue.config');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge the package configuration file with the application's published copy.
        $this->mergeConfigFrom(__DIR__.'/../config/sendinblue.php', 'sendinblue');

        // The singleton method binds a class or interface into the container
        // that should only be resolved one time. Once a singleton binding is resolved,
        // the same object instance will be returned on subsequent calls into the container
        $this->app->singleton('sendinblue', function () {
            return new Sendinblue;
        });
    }
}
