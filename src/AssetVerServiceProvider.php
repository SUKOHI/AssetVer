<?php

namespace Sukohi\AssetVer;

use Illuminate\Support\ServiceProvider;
use Sukohi\AssetVer\Commands\AssetVerClearCommand;
use Sukohi\AssetVer\Commands\AssetVerCommand;

class AssetVerServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var  bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Command
        if ($this->app->runningInConsole()) {
            $this->commands([
                AssetVerCommand::class,
                AssetVerClearCommand::class
            ]);
        }

        $this->publishes([
            __DIR__.'/config/asset_ver.php' => config_path('asset_ver.php')
        ], 'config');

    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('asset-ver', function()
        {
            return new AssetVer;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['asset-ver'];
    }

}