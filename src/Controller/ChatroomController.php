<?php

namespace App\Controller;

use App\Entity\Chatroom;
use App\Form\ChatroomType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chatroom")
 */
class ChatroomController extends AbstractController
{
    /**
     * @Route("/", name="chatroom_index", methods={"GET"})
     */
    public function index(): Response
    {
        $chatrooms = $this->getDoctrine()
            ->getRepository(Chatroom::class)
            ->findAll();


        return $this->render('chatroom/index.html.twig', [
            'chatrooms' => $chatrooms,
        ]);
    }
}
