<?php

namespace Vansteen\Sendinblue;

use Illuminate\Support\ServiceProvider;

class SendinblueServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/sendinblue.php' => config_path('sendinblue.php'),
            ], 'sendinblue.config');
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/sendinblue.php', 'sendinblue');

        // Register the service the package provides.
        $this->app->singleton('sendinblue', function ($app) {
            return new Sendinblue;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['sendinblue'];
    }
}
