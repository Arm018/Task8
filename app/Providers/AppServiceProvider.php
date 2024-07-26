<?php

namespace App\Providers;

use App\Services\ProfileService;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\Elastic\Elasticsearch\Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts(['localhost:9200'])
                ->setBasicAuthentication('elastic', 'aQ6q5PJwbwZtcWuAcCNs')
                ->build();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
