<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="HomePage")
     */
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'message'=>'Page d\'accueil'
          //  'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route("/post/{id}", name="post", requirements={"id"="\d+"})
     */
    public function post(int $id): Response
    {
        return $this->render('blog/post.html.twig', [
            'id'=> $id
            //  'controller_name' => 'BlogController',
        ]);
    }
}
