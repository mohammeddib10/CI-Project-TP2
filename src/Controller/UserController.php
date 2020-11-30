<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(): Response
    {

        $response = null;
        $userap = array();

        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'http://127.0.0.1:2345/users');
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);

        

        if($query != false){

            $response = $this->client->request('GET', 'http://127.0.0.1:2345/users');
            $statusCode = $response->getStatusCode();
    
            if($statusCode == '200'){
                $content = $response->toArray();
                $userap = array();
                foreach ($content as $res){
                    $res["Server"] = "http://127.0.0.1:2345";
                    array_push($userap,$res);
                }
            }
        }
        

        return $this->render('user/index.html.twig', [
            'userap' => $userap,
        ]);
    }
}
