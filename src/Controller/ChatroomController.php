<?php

namespace App\Controller;

use App\Entity\Chatroom;
use App\Form\ChatroomType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @Route("/chatroom")
 */
class ChatroomController extends AbstractController
{

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    

    /**
     * @Route("/", name="chatroom_index", methods={"GET"})
     */
    public function index(): Response
    {
        // you can add request options (or override global ones) using the 3rd argument
        $response = $this->client->request('GET', 'http://127.0.0.1:2345/chatrooms');

        $content = $response->toArray();
        $chatroomsap = array();
        foreach ($content as $key => $value){
            array_push($chatroomsap,['Server' => "http://127.0.0.1:2345", "Chatroom" => $value]);
        }

        dump($chatroomsap);


        return $this->render('chatroom/index.html.twig', [
            'chatrooms' => $chatroomsap,
        ]);
    }
}
