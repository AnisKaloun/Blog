<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
class ApiPostController extends AbstractController
{
    /**
     * @Route("/api/post", name="api_post")
     */
    public function index(): Response
    {
        return $this->render('api_post/index.html.twig', [
            'controller_name' => 'ApiPostController',
        ]);
    }

    /**
     * @Route("/api/posts", name="api_posts",  methods={"GET"})
     */
    public function getAll(PostRepository $postRepository): JsonResponse
    {
        $posts = $postRepository->findAll();
        $data = [];

        foreach ($posts as $post) {
            $data[] = [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'urlAlias' => $post->getUrlAlias(),
                'content' => $post->getContent(),
                'published' => $post->getPublished(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
