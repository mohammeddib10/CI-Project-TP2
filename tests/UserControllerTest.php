<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\HttpClient;

class UserControllerTest extends WebTestCase
{
    public function testSomethingelse()
    {

        /*
        * Premier test : pour tester si l'url appele renvoie deja une réponse ou pas.
        */
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'http://127.0.0.1:2345/users');
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);

        $this->assertNotEquals("false", $query);
    }


    public function testSomething()
    {
        /*
        * deuxieme test : pour tester si Api rest renvoie de la data ou renvoie une erreur different de 200.
        */
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'http://127.0.0.1:2345/users');

        $statusCode = $response->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }

}
