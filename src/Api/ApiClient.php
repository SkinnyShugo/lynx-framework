<?php

namespace Skinnyshugo\LynxFramework\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'timeout' => 10.0,
        ]);
    }

    public function get($url, $headers = [])
    {
        try {
            $response = $this->client->request('GET', $url, [
                'headers' => $headers
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
