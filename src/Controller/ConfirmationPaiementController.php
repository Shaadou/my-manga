<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmationPaiementController extends AbstractController
{
    /**
     * @Route("/confirmation/paiement", name="confirmation_paiement")
     */
    public function index(): Response
    {
        return $this->render('confirmation_paiement/index.html.twig', [
            'controller_name' => 'ConfirmationPaiementController',
        ]);
    }
}
