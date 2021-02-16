<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoController extends AbstractController
{
    /**
     * @Route("/info/{id}", name="info")
     */
    public function index($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produit = $repo->find($id);
        return $this->render('info/index.html.twig', [
            'controller_name' => 'InfoController',
            'produit' => $produit
        ]);
    }
}
