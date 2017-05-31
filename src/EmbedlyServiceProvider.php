<?php

namespace Badawy\Embedly;

use Illuminate\Support\ServiceProvider;

class EmbedlyServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/Embedly.php' => config_path('embedly.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/Embedly.php', 'embedly');

        $this->app->singleton('Embedly', function(){
            return new Embedly();
        });
    }
}
