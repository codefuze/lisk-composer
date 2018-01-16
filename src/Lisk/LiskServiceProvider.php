<?php

namespace Codefuze\Lisk;

use Illuminate\Support\ServiceProvider;

class LiskServiceProvider extends ServiceProvider
{

    protected $packageName = 'lisk';

    protected $commands = [];

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path($this->packageName.'.php'),
        ], 'config');
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', $this->packageName
        );

    }

}
