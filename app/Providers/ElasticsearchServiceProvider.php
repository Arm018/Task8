<?php

namespace App\Providers;

use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class ElasticsearchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('elasticsearch', function ($app) {
            return ClientBuilder::create()
                ->setHosts(config('elasticsearch.hosts'))
                ->build();
        });
    }
}
