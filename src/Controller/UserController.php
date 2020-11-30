<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
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
        // you can add request options (or override global ones) using the 3rd argument
        $response = $this->client->request('GET', 'http://127.0.0.1:2345/users');

        $content = $response->toArray();
        $userap = array();
        foreach ($content as $res){
            $res["Server"] = "http://127.0.0.1:2345";
            array_push($userap,$res);
        }

        return $this->render('user/index.html.twig', [
            'userap' => $userap,
        ]);
    }
}
