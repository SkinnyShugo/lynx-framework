<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Skinnyshugo\LynxFramework\Api\ApiClient;

class ApiClientTest extends TestCase
{
    public function testGetRequest()
    {
        $apiClient = new ApiClient();
        $response = $apiClient->get('https://jsonplaceholder.typicode.com/todos/1');

        $this->assertArrayHasKey('title', $response);
    }
}
