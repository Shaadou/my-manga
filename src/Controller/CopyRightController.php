<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CopyRightController extends AbstractController
{
    /**
     * @Route("/copyright", name="copyright")
     */
    public function index(): Response
    {
        return $this->render('copy_right/index.html.twig', [
            'controller_name' => 'CopyRightController',
        ]);
    }
}
