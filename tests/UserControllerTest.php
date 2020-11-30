<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\HttpClient;

class UserControllerTest extends WebTestCase
{
    public function testSomething()
    {

        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'http://127.0.0.1:2345/users');

        $statusCode = $response->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }
}
