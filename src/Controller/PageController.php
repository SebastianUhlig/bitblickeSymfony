<?php

namespace App\Controller;

use App\Entity\Page;
use App\Repository\PageRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @throws NonUniqueResultException
     */
    #[Route('/{slug}', name: 'app_home', defaults: ['slug' => 'home'], methods: 'GET')]
    public function index(PageRepository $pageRepository, string $slug): Response
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

        return $this->render('index.html.twig', [
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content,
        ]);
    }
}
