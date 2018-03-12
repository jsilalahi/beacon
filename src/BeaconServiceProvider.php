<?php

namespace DynEd\Beacon;

use DynEd\Beacon\Handler\Slack;
use Illuminate\Support\ServiceProvider;

class BeaconServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('DynEd\Beacon\Beacon', function ($app) {

            // TODO: extracting config

            return new Beacon(
                new Slack()
            );
        });
    }
}