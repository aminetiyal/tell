<?php

namespace Aminetiyal\Tell;

use Aminetiyal\Tell\Console\TellInstall;
use Illuminate\Support\ServiceProvider;

class TellServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tell');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tell');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->registerRoutes();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('tell.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/tell'),
            ], 'views');*/

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/tell'),
            ], 'tell-assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/tell'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                TellInstall::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'tell');

        // Register the main class to use with the facade
        $this->app->singleton('tell', function () {
            return new Tell;
        });
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}
