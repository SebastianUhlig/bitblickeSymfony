<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {

        $page = $pageRepository->findBySlug($slug);

        if (!$page) {
            throw $this->createNotFoundException(
                'No product found for slug '.$slug
            );
        }

        $title = $page->getTitle();
        $subtitle = $page->getSubtitle();
        $content = $page->getContent();

        return $this->render('blog/index.html.twig', [
            'title' => $title,
            'author' => $author,
            'content' => $content,
        ]);
    }
}
