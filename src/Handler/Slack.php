<?php

namespace DynEd\Beacon\Handler;

use GuzzleHttp\Client;
use Exception;

class Slack extends BaseHandler {

    /**
     * GuzzleHttp Client
     *
     * @var Client|null
     */
    private $client = null;

    /**
     * Slack webhook URL
     * TODO: extract to config
     *
     * @var string
     */
    private $webhook = 'https://hooks.slack.com/services/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';

    /**
     * Slack constructor
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Sending error report to Slack webhook
     *
     * @param Exception $e
     */
    public function sendReport(Exception $e)
    {
        $this->client->request('POST', $this->webhook, [
            'headers' => [
                'Accept'     => 'application/json',
            ],
            'json'    => [
                'text' => $e->getMessage()
            ],
        ]);
    }
}