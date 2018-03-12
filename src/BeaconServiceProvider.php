<?php

namespace DynEd\Beacon;

use DynEd\Beacon\Exceptions\InvalidHandlerException;
use DynEd\Beacon\Handler\Slack;
use Illuminate\Support\ServiceProvider;

class BeaconServiceProvider extends ServiceProvider {

    /**
     * Boot service provider.
     */
    public function boot()
    {
        $this->app->configure('beacon');

        $this->mergeConfigFrom(
            realpath(__DIR__.'/../config/beacon.php'), 'beacon'
        );
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        if($this->app['config']->get('beacon.defaults.handler') == 'none') {
            return;
        }

        $this->app->singleton('DynEd\Beacon\Beacon', function ($app) {

            $handler = null;

            // Slack handler
            if($app['config']->get('beacon.defaults.handler') === 'slack') {

                if( ! $webhook = $app['config']->get('beacon.slack.webhook')) {
                    throw new InvalidHandlerException('Could not found webhook URL for Slack handler.');
                }

                $handler = new Slack($webhook);
            }

            // More handler coming...

            return new Beacon($handler);
        });
    }
}