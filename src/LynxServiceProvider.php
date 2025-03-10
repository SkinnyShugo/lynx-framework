<?php

namespace Skinnyshugo\LynxFramework;

use Illuminate\Support\ServiceProvider;

class LynxServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register API Client
        $this->app->singleton('lynx-api', function () {
            return new Api\ApiClient();
        });

        // Register Cache Manager
        $this->app->singleton('lynx-cache', function ($app) {
            return new Cache\CacheManager($app['cache.store']);
        });

        // Merge config file
        $this->mergeConfigFrom(__DIR__.'/../config/lynx.php', 'lynx');
    }

    public function boot()
    {
        // Publish Config File
        $this->publishes([
            __DIR__.'/../config/lynx.php' => config_path('lynx.php'),
        ], 'config');
    }
}
