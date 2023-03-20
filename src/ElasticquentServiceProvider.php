<?php

namespace Larahmat\Elasticquent;

use Illuminate\Support\ServiceProvider;
use Larahmat\Elasticquent\Services\ElasticquentService;

class ElasticquentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/elasticquent.php',
            'elasticquent'
        );
    }

    public function boot()
    {
        $this->offerPublishing();

        $this->registerModelBindings();
    }

    protected function offerPublishing()
    {
        if (! function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            return;
        }

        $this->publishes([
            __DIR__.'/../config/elasticquent.php' => config_path('elasticquent.php'),
        ], 'elasticquent-config');

        // $this->publishes([
        //     __DIR__.'/../database/migrations/create_permission_tables.php.stub' => $this->getMigrationFileName('create_permission_tables.php'),
        // ], 'permission-migrations');
    }

    protected function registerModelBindings()
    {
        $this->app->bind('ES', ElasticquentService::class);
    }
}
