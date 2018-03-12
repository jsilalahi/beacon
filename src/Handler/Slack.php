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
    private $webhook = '';

    /**
     * Slack constructor
     *
     * @param string $webhook Slack Webhook URL
     */
    public function __construct($webhook)
    {
        $this->client = new Client();
        $this->webhook = $webhook;
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