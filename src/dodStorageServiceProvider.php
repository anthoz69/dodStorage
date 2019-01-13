<?php

namespace anthoz69\dodStorage;

use Illuminate\Support\ServiceProvider;

class dodStorageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'anthoz69');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'anthoz69');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dodstorage.php', 'dodstorage');

        // Register the service the package provides.
        $this->app->singleton('dodstorage', function ($app) {
            return new dodStorage;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['dodstorage'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/dodstorage.php' => config_path('dodstorage.php'),
        ], 'dodstorage.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/anthoz69'),
        ], 'dodstorage.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/anthoz69'),
        ], 'dodstorage.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/anthoz69'),
        ], 'dodstorage.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
