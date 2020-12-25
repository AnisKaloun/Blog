<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;
class BlogController extends AbstractController
{

    /**
     * @Route("/", name="HomePage")
     */
    public function index(PostRepository $repo)
    {
        $posts=$repo->findAll();

        return $this->render('blog/index.html.twig', [

            'Posts'=>$posts

        ]);
    }

    /**
     * @Route("/posts/{url_alias}", name="Articlepost")
     */
    public function post(Post $post): Response
    {
        return $this->render('blog/post.html.twig', [
            'post'=> $post
        ]);
    }
}
