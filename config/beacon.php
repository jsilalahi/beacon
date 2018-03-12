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
        'webhook' => env('BEACON_SLACK_WEBHOOK', 'https://hooks.slack.com/services/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')
    ]

];