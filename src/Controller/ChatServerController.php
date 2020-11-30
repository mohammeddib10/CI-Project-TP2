<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatServerController extends AbstractController
{
    /**
     * @Route("/chat/server", name="chat_server")
     */
    public function index(): Response
    {
        return $this->render('chat_server/index.html.twig', [
            'controller_name' => 'ChatServerController',
        ]);
    }
}
