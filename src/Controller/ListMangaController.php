<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListMangaController extends AbstractController
{
    /**
     * @Route("/list_manga", name="list_manga")
     */
    public function index(): Response
    {
        return $this->render('list_manga/index.html.twig', [
            'controller_name' => 'ListMangaController',
        ]);
    }
}
