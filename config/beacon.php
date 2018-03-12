<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Beacon Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default Beacon "handler". You can edit
    | the configuration in .env file to change Beacon handler.
    |
    | The available handler are "none" and "slack"
    */

    'defaults' => [
        'handler' => env('BEACON_HANDLER', 'none')
    ],

    /*
    |--------------------------------------------------------------------------
    | Beacon Provider
    |--------------------------------------------------------------------------
    |
    | This option controls the provider configuration for handlers
    |
    */

    'slack' => [
        'webhook' => env('BEACON_SLACK_WEBHOOK', '')
    ]

];